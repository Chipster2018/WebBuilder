<?php
/*****************************************/
/* 
Web Builder Database
Table Class
Nathan Black
Version 0.0.0

This class is not useful to the database module itself.
However, it might be very useful to modules that depend on
the Database module, so it is included here.

This class represents a table in a database object. It is intended
to allow for selection, insertion, and updation--if that's a word--of
a particular table without the upper level worying about the database 
where the data is physically stored. It is also responsible for making
sure the database/table is capable of storing the information needed.

NOTE: CreateTable() and AddCol() are currently expirimental, and should be
used with caution.

*/
// 8-14-18

class Table {
	private $db; // the database we are using
	private $name; // the table name
	private $columns; // the list of columns we have
	
	private $isTable; // flag to see if this is a real table
	
	// constructor
	public function __construct(&$db, $name) {
		// first, make sure $db is actually a database
		if( !($db instanceof Database)) {
			throw new Exception("FATAL ERROR in Table $name! \$db not a database!");
		}
		// good, now that we've got that out of the way...
		$this->db = clone $db; // set our db to a reference of the db
		$this->name = $name; // set up our name
		
		// now, let's actually see if this is a real table
		$this->isTable = false; // set the is real table flag to false
		$this->DetectTable();
		/* NOTE: We could throw an error if we find that it is not a real 
		 * table. However, I think it is more flexible if we don't throw
		 * an exception. That way, we can allow for table creation if it
		 * is now what we need, or otherwise prove that there is no such
		 * table. For that reason, we will not throw an error here, but
		 * rather if they try to insert, select, or update a non-existant
		 * table.
		 */
		 
		 // only call detect columns if we are real
		 if($this->isTable) {
			$this->DetectColumns();
		 }
		 
	}
	// function to detect if the table exists
	// returns value of test
	public function DetectTable() {
		$names = $this->db->queryDB("SELECT * FROM information_schema.TABLES 
		WHERE TABLE_SCHEMA=:dbname AND " . 
			"TABLE_NAME=:tname", 
					array("tname"=>$this->name,"dbname"=>$this->db->getName()) );
		if(isset($names[0])) {
			$this->isTable = true;	
		} else {
			$this->isTable = false;
		}
		return $this->isTable;
	}

	// Function to auto detect what columns exist in the table
	public function DetectColumns() {
		// first, get the columns
		$cols = $this->db->queryDB(
		"SHOW COLUMNS FROM " . $this->name,
			array());
			
		// now, store them for later use
		foreach($cols as $col) {
			$this->columns[$col["Field"]] = $col;	
		}
	}
	
	// function to
	// 		a) see that a column exists, and
	//		b) see if it has the specs we need
	// returns true if matches, false if not
	function EnsureColumn($colname, $specs) {
		// first, see if the column even exists
		
		if(!isset($this->columns[$colname])) { // if it does not exist
			// reload the colums, just to make sure it hasn't been
			// updated since last check
			$this->DetectColumns();
			
			if(!isset($this->columns[$colname])) { // if it does not exist
				// if is still doesn't exist, then give up
				// it clearly does not exist in the current configuration
				return false;
			}
		}
		
		// okay, now that we know that the column actually exists,
		// let's compare specs
		$result = true;
		// for every spec we have to ensure...
		foreach($specs as $f => $v) {
			// so, first, let's make sure that we even have data on
			// that particulat attribute
			if(!isset($this->columns[$colname][$f])) {
				// if not, there's really no sense in continuing
				// we have no way of really knowing what that is.
				// we will just return false.
				return false;
				
				// NOTE: As a side effect of this, the caller cannot
				// add extra info to the specs. It will give a false
				// positive. Or rather, a false false. 
			}
			// now that we know we have data, compare it against
			// itself, and store this result
			$result = $result && ($this->columns[$colname][$f] == $v);
		}
			
		// however that funky loop ended, let's return the result
		return $result;
	}

	// function to
	// 		a) see the passed columns exist, and
	//		b) see if they have the specs we need
	// returns true if matches, false if not
	function EnsureColumns($cols) {
		$result = true;
		
		foreach($cols as $colname => $spec) {
			$result = $result && $this->EnsureColumn($colname,$spec);
		}
		
		return $result;
	}
	
	// function to see if a particular column exists
	// shortcut for EnsureColumn($colname, array())
	function ColumnExists($colname) {
		return EnsureColumn($colname, array());
	}
	
	// NOTE: These next 2 functions are currently expirimantal
	function CreateTable($spec) {
		// create beginning of query
		$query = "CREATE TABLE "  . $this->name . " (\n";
		$key = NULL;
		$firsttime = true;
		
		// add each of the columns
		foreach($spec as $n => $s) {
			// if it is our first time, then no comma and newline
			if($firsttime) {
				$firsttime = false;	
			} else {
				// otherwise, add seperator--coma and newline
				$query .= ",\n";	
			}
			
			// add the item
			$query .= "\t" . $n . " " . $s["Type"];
			
			// now, check to see if we are the key
			if(isset($s["Key"])) {
				$key = $n;	
			}
			// Possible TODO: make this more flexible and support more things
		}
		
		// now, check for key
		if($key != NULL) {
			$qurey .= ",\n\tPRIMARY KEY ($key)";	
		}
		
		// close the parenthesis out
		$query .= ")";
		
		// actually execute the query
		
		// NOTE: This code is not user input safe to use.
		// this can be SQL injected!
		// Take care to only use this in setup!
		$this->db->queryDB($query,array());
	}

	function AddCol($spec) {
		$query = "ALTER TABLE "  . $this->name . 
			" ADD COLUMN "  . $spec["Field"] . " " . $spec["Type"] . "\n";
			
		// Possible TODO: add more flexabillity

		// actually execute the query
		
		// NOTE: This code is not user input safe to use.
		// this can be SQL injected!
		// Take care to only use this in setup!
		$this->db->queryDB($query,array());
	}

	// Now, for the query functions
	function insert($table, $cols=array(), $values=array(), $params=array()) {
		return $this->db->insert($this->name,$cols,$values,$params);
	}

	function update($table, $values=array(), $where="", $params=array()) {
		return $this->db->update($this->name,$values,$where,$params);

	}
	
	function delete($where="", $params=array()) {
		return $this->db->delete($this->name,$where,$params);
	}
	
	function select($what=array("*"), $where="", $params=array()) {
		return $this->db->select($this->name,$what,$where,$params);
	}
};

?>