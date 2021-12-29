<?php
class DBController {
	private $host = "aahantechnologies.com";
	private $user = "raadh5xq";
	private $password = "Random1234!@#$$";
	private $database = "raadh5xq_ramukimandi";
	private $con;
	
	function __construct() {
		$this->con = $this->connectDB();
	}
	
	function connectDB() {
		$con = mysqli_connect($this->host,$this->user,$this->password,$this->database);
		return $con;
	}
	
	function runQuery($query) {
		$result = mysqli_query($this->con,$query);
		while($row=mysqli_fetch_assoc($result)) {
			$resultset[] = $row;
		}		
		if(!empty($resultset))
			return $resultset;
	}
	
	function numRows($query) {
		$result  = mysqli_query($this->con,$query);
		$rowcount = mysqli_num_rows($result);
		return $rowcount;	
	}
}
?>