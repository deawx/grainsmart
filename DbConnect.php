<?php

class DbConnect {
// Define required connection parameters
private $hostname = 'localhost';
private $username = 'root';
private $password = '';
private $db_name = 'grainsmart';

public function connect() {
	try {
		$conn = new PDO('mysql:host' . $this->hostname . '; dbname=' . $this->db_name, $this->username, $this->password);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		return $conn;
	} catch( PDOException $e) {
		echo 'Database Error: ' . $e->getMessage();
	}
}

}