<?php

class Client {
	
	private $connection;
	
	private $table = "clients";
	
	public $id;
	public $name;
	public $address;
	public $code;
	public $contract_date;
	
	//Adatbázis kapcsolódás objektum példányításakor
    public function __construct($db){
		$this->connection = $db;
    } 
	
	//Lekérjük az összes adatot a táblából
	public function getAllClients(){
		$sql = "SELECT * FROM " . $this->table . "";
		$stmt = $this->connection->prepare($sql);
		$stmt->execute();
		return $stmt;
	}
	
	public function createClients(){
		$sql = "INSERT INTO
				". $this->table ."
				SET
					name = :name, 
					address = :address, 
					code = :code, 
					contract_date = :contract_date";
	
		$stmt = $this->connection->prepare($sql);
	
		$this->name=htmlspecialchars(strip_tags($this->name));
		$this->address=htmlspecialchars(strip_tags($this->address));
		$this->code=htmlspecialchars(strip_tags($this->code));
		$this->contract_date=htmlspecialchars(strip_tags($this->contract_date));
	
		$stmt->bindParam(":name", $this->name);
		$stmt->bindParam(":address", $this->address);
		$stmt->bindParam(":code", $this->code);
		$stmt->bindParam(":contract_date", $this->contract_date);
	
		if($stmt->execute()){
			return true;
		} else {
			return false;
		}
	}
	
	public function updateClients(){
		$sql = "UPDATE
				". $this->table ."
				SET
					name = :name, 
					address = :address, 
					code = :code, 
					contract_date = :contract_date
				WHERE 
					id = :id";
	
		$stmt = $this->connection->prepare($sql);
	
		$this->name=htmlspecialchars(strip_tags($this->name));
		$this->address=htmlspecialchars(strip_tags($this->address));
		$this->code=htmlspecialchars(strip_tags($this->code));
		$this->contract_date=htmlspecialchars(strip_tags($this->contract_date));
	
		$stmt->bindParam(":name", $this->name);
		$stmt->bindParam(":address", $this->address);
		$stmt->bindParam(":code", $this->code);
		$stmt->bindParam(":contract_date", $this->contract_date);
		$stmt->bindParam(":id", $this->id);
	
		if($stmt->execute()){
			return true;
		} else {
			return false;
		}
	}
}

?>