<?php
class antar_daerah {
	private $conn;
	private $table_name = "ksdd";

	public $id_ksdd;
	public $nama_mitra;
	public $deskripsi;
	public $bidang;
	public $tahun;
    
	public function __construct($db) {
		$this->conn = $db;
	}

	function insert() {
		$query = "INSERT INTO {$this->table_name} VALUES(?, ?, ?, ?, ? )";
		$stmt = $this->conn->prepare($query);
		$stmt->bindParam(1, $this->id_ksdd);
		$stmt->bindParam(2, $this->nama_mitra);
		$stmt->bindParam(3, $this->deskripsi);
		$stmt->bindParam(4, $this->bidang);
		$stmt->bindParam(5, $this->tahun);
        
		if ($stmt->execute()) {
			return true;
		} else {
			return false;
		}
	}

	function readAll() {
		$query = "SELECT * FROM {$this->table_name} ORDER BY id_ksdd ASC";
		$stmt = $this->conn->prepare( $query );
		$stmt->execute();

		return $stmt;
	}

	function countAll(){
		$query = "SELECT * FROM {$this->table_name} ORDER BY id_ksdd ASC";
		$stmt = $this->conn->prepare( $query );
		$stmt->execute();

		return $stmt->rowCount();
	}

	function readOne(){
		$query = "SELECT * FROM {$this->table_name} WHERE id_ksdd=? LIMIT 0,1";
		$stmt = $this->conn->prepare($query);
		$stmt->bindParam(1, $this->id_ksdd);
		$stmt->execute();
		$row = $stmt->fetch(PDO::FETCH_ASSOC);

		$this->id = $row["id_ksdd"];
		$this->nama_mitra = $row["nama_mitra"];
		$this->deskripsi = $row["deskripsi"];
		$this->bidang = $row["bidang"];
		$this->tahun = $row["tahun"];
	}

	function readSatu($a) {
		$query = "SELECT * FROM {$this->table_name} WHERE id_ksdd='$a' LIMIT 0,1";
		$stmt = $this->conn->prepare( $query );
		$stmt->execute();

		return $stmt;
	}

	function getNewID() {
		$query = "SELECT MAX(id_ksdd) AS code FROM {$this->table_name}";
		$stmt = $this->conn->prepare($query);
		$stmt->execute();
		$row = $stmt->fetch(PDO::FETCH_ASSOC);

		if ($row) {
			return $this->genCode($row["code"], 'ksd', 3);
		}
		
	}

	function genCode($latest, $key, $chars = 0) {
    $new = intval(substr($latest, strlen($key))) + 1;
    $numb = str_pad($new, $chars, "0", STR_PAD_LEFT);
    return $key . $numb;
	}

	function genNextCode($start, $key, $chars = 0) {
    $new = str_pad($start, $chars, "0", STR_PAD_LEFT);
    return $key . $new;
	}

	function update() {
		$query = "UPDATE {$this->table_name}
				SET
					nama_mitra = :nama_mitra,
					deskripsi = :deskripsi,
					bidang = :bidang,
					tahun = :tahun
				WHERE
					id_ksdd = :id_ksdd";
		$stmt = $this->conn->prepare($query);

		$stmt->bindParam(':nama_mitra', $this->nama_mitra);
		$stmt->bindParam(':deskripsi', $this->deskripsi);
		$stmt->bindParam(':bidang', $this->bidang);
		$stmt->bindParam(':tahun', $this->tahun);
		$stmt->bindParam(':id_ksdd', $this->id_ksdd);

		if ($stmt->execute()) {
			return true;
		} else {
			return false;
		}
	}

	function delete() {
		$query = "DELETE FROM {$this->table_name} WHERE id_ksdd = ?";
		$stmt = $this->conn->prepare($query);
		$stmt->bindParam(1, $this->id_ksdd);
		if ($result = $stmt->execute()) {
			return true;
		} else {
			return false;
		}
	}

	function hapusell($ax) {
		$query = "DELETE FROM {$this->table_name} WHERE id_ksdd in $ax";
		$stmt = $this->conn->prepare($query);
		if ($result = $stmt->execute()) {
			return true;
		} else {
			return false;
		}
	}
}
