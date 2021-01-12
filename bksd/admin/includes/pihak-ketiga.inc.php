<?php
class pihak_ketiga {
	private $conn;
	private $table_name = "pihak_ketiga";

	public $id_pihak_ketiga;
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
		$stmt->bindParam(1, $this->id_pihak_ketiga);
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
		$query = "SELECT * FROM {$this->table_name} ORDER BY id_pihak_ketiga ASC";
		$stmt = $this->conn->prepare( $query );
		$stmt->execute();

		return $stmt;
	}

	function countAll(){
		$query = "SELECT * FROM {$this->table_name} ORDER BY id_pihak_ketiga ASC";
		$stmt = $this->conn->prepare( $query );
		$stmt->execute();

		return $stmt->rowCount();
	}

	function readOne(){
		$query = "SELECT * FROM {$this->table_name} WHERE id_pihak_ketiga=? LIMIT 0,1";
		$stmt = $this->conn->prepare($query);
		$stmt->bindParam(1, $this->id_pihak_ketiga);
		$stmt->execute();
		$row = $stmt->fetch(PDO::FETCH_ASSOC);

		$this->id = $row["id_pihak_ketiga"];
		$this->nama_mitra = $row["nama_mitra"];
		$this->deskripsi = $row["deskripsi"];
		$this->bidang = $row["bidang"];
		$this->tahun = $row["tahun"];
	}

	function readSatu($a) {
		$query = "SELECT * FROM {$this->table_name} WHERE id_pihak_ketiga='$a' LIMIT 0,1";
		$stmt = $this->conn->prepare( $query );
		$stmt->execute();

		return $stmt;
	}

	function getNewID() {
		$query = "SELECT MAX(id_pihak_ketiga) AS code FROM {$this->table_name}";
		$stmt = $this->conn->prepare($query);
		$stmt->execute();
		$row = $stmt->fetch(PDO::FETCH_ASSOC);

		if ($row) {
			return $this->genCode($row["code"], 'phk', 3);
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
					id_pihak_ketiga = :id_pihak_ketiga";
		$stmt = $this->conn->prepare($query);

		$stmt->bindParam(':nama_mitra', $this->nama_mitra);
		$stmt->bindParam(':deskripsi', $this->deskripsi);
		$stmt->bindParam(':bidang', $this->bidang);
		$stmt->bindParam(':tahun', $this->tahun);
		$stmt->bindParam(':id_pihak_ketiga', $this->id_pihak_ketiga);

		if ($stmt->execute()) {
			return true;
		} else {
			return false;
		}
	}

	function delete() {
		$query = "DELETE FROM {$this->table_name} WHERE id_pihak_ketiga = ?";
		$stmt = $this->conn->prepare($query);
		$stmt->bindParam(1, $this->id_pihak_ketiga);
		if ($result = $stmt->execute()) {
			return true;
		} else {
			return false;
		}
	}

	function hapusell($ax) {
		$query = "DELETE FROM {$this->table_name} WHERE id_pihak_ketiga in $ax";
		$stmt = $this->conn->prepare($query);
		if ($result = $stmt->execute()) {
			return true;
		} else {
			return false;
		}
	}
}
