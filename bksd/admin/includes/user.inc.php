<?php
class User {
	private $conn;
	private $table_name = "admin";

	public $id_admin;
	public $nama_lengkap;
	public $username;
	public $password;

	public function __construct($db) {
		$this->conn = $db;
	}

	function insert() {
		$query = "INSERT INTO {$this->table_name} VALUES(NULL, ?, ?, ?)";
		$stmt = $this->conn->prepare($query);
		$stmt->bindParam(1, $this->nama_lengkap);
		$stmt->bindParam(2, $this->username);
		$stmt->bindParam(3, $this->password);

		if ($stmt->execute()) {
			return true;
		} else {
			return false;
		}
	}

	function readAll(){
		$query = "SELECT * FROM {$this->table_name} ORDER BY id_admin ASC";
		$stmt = $this->conn->prepare( $query );
		$stmt->execute();
		return $stmt;
	}

	// used when filling up the update product form
	function readOne(){
		$query = "SELECT * FROM {$this->table_name} WHERE id_admin=? LIMIT 0,1";
		$stmt = $this->conn->prepare( $query );
		$stmt->bindParam(1, $this->id_admin);
		$stmt->execute();
		$row = $stmt->fetch(PDO::FETCH_ASSOC);
		$this->id_admin = $row['id_admin'];
		$this->nama_lengkap = $row['nama_lengkap'];
		$this->username = $row['username'];
		$this->password = $row['password'];
	}

	// update the product
	function update() {
		$query = "UPDATE {$this->table_name}
				SET
					nama_lengkap = :nama_lengkap,
					username = :username,
					password = :password
				WHERE
					id_admin = :id_admin";

		$stmt = $this->conn->prepare($query);

		$stmt->bindParam(':nama_lengkap', $this->nama_lengkap);
		$stmt->bindParam(':username', $this->username);
		$stmt->bindParam(':password', $this->password);
		$stmt->bindParam(':id_admin', $this->id_admin);

		// execute the query
		if ($stmt->execute()) {
			return true;
		} else {
			return false;
		}
	}

	// delete the product
	function delete() {
		$query = "DELETE FROM {$this->table_name} WHERE id_admin = ?";
		$stmt = $this->conn->prepare($query);
		$stmt->bindParam(1, $this->id_admin);
		if ($result = $stmt->execute()) {
			return true;
		} else {
			return false;
		}
	}

	function countAll(){
		$query = "SELECT * FROM {$this->table_name} ORDER BY id_admin ASC";
		$stmt = $this->conn->prepare( $query );
		$stmt->execute();
		return $stmt->rowCount();
	}

	function hapusell($ax) {
		$query = "DELETE FROM {$this->table_name} WHERE id_admin in $ax";
		$stmt = $this->conn->prepare($query);

		if ($result = $stmt->execute()) {
			return true;
		} else {
			return false;
		}
	}

	function getFirstOperator(){
		$query = "SELECT id_admin FROM {$this->table_name} ORDER BY id_admin ASC LIMIT 1";
		$stmt = $this->conn->prepare($query);
		$stmt->execute();
		$row = $stmt->fetch(PDO::FETCH_ASSOC);
		$this->id_admin = $row['id_admin'];
	}
}
