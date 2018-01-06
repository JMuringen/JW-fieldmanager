<?php
class Dbh {
	private $servername;
	private $username;
	private $password;
	private $dbname;
	
	protected function connect() {
		$this->servername = "localhost";
		$this->username = "root";
		$this->password = "1234";
		$this->dbname = "jwnew";
		
		$conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
		return $conn;
	}
}
?>		
