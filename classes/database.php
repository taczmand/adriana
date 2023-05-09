<?php
include_once '../config.php';

class Database {
	
	private $options = [
	  PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION, 
	  PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ 

	];
	public $db = null;
	
	public function getInstance() {
		try {
			$this->db = new PDO(DB_TYPE.":host=".DB_HOST.";dbname=".DB_NAME.";charset=".DB_CHARSET, DB_USER, DB_PASS, $this->options);
		}
		catch(PDOException $e) {
			echo "Sikertelen adatbázis kapcsolódás!";
			echo $e->getMessage();
		}
		return $this->db;
	}
}
?>