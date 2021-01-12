<?php
class luar_negeri {
	private $conn;
	private $table_name = "luar_negeri";

	public $id_luar_negeri;
	public $nama_mitra;
	public $deskripsi;
    public $bidang;
    
	public function __construct($db) {
		$this->conn = $db;
	}

	function insert() {
		$query = "INSERT INTO {$this->table_name} VALUES(?, ?, ?, ? )";
		$stmt = $this->conn->prepare($query);
		$stmt->bindParam(1, $this->id_luar_negeri);
		$stmt->bindParam(2, $this->nama_mitra);
		$stmt->bindParam(3, $this->deskripsi);
        $stmt->bindParam(4, $this->bidang);
        
		if ($stmt->execute()) {
			return true;
		} else {
			return false;
		}
	}

	function readAll() {
		$query = "SELECT * FROM {$this->table_name} ORDER BY id_luar_negeri ASC";
		$stmt = $this->conn->prepare( $query );
		$stmt->execute();

		return $stmt;
	}

	function countAll(){
		$query = "SELECT * FROM {$this->table_name} ORDER BY id_luar_negeri ASC";
		$stmt = $this->conn->prepare( $query );
		$stmt->execute();

		return $stmt->rowCount();
	}

	function readOne(){
		$query = "SELECT * FROM {$this->table_name} WHERE id_luar_negeri=? LIMIT 0,1";
		$stmt = $this->conn->prepare($query);
		$stmt->bindParam(1, $this->id_luar_negeri);
		$stmt->execute();
		$row = $stmt->fetch(PDO::FETCH_ASSOC);

		$this->id = $row["id_luar_negeri"];
		$this->nama_mitra = $row["nama_mitra"];
		$this->deskripsi = $row["deskripsi"];
		$this->bidang = $row["bidang"];
	}

	function readSatu($a) {
		$query = "SELECT * FROM {$this->table_name} WHERE id_luar_negeri='$a' LIMIT 0,1";
		$stmt = $this->conn->prepare( $query );
		$stmt->execute();

		return $stmt;
	}

	function getNewID() {
		$query = "SELECT MAX(id_luar_negeri) AS code FROM {$this->table_name}";
		$stmt = $this->conn->prepare($query);
		$stmt->execute();
		$row = $stmt->fetch(PDO::FETCH_ASSOC);

		if ($row) {
			return $this->genCode($row["code"], 'luar', 3);
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
					bidang = :bidang
				WHERE
					id_luar_negeri = :id_luar_negeri";
		$stmt = $this->conn->prepare($query);

		$stmt->bindParam(':nama_mitra', $this->nama_mitra);
		$stmt->bindParam(':deskripsi', $this->deskripsi);
		$stmt->bindParam(':bidang', $this->bidang);
		$stmt->bindParam(':id_luar_negeri', $this->id_luar_negeri);

		if ($stmt->execute()) {
			return true;
		} else {
			return false;
		}
	}

	function delete() {
		$query = "DELETE FROM {$this->table_name} WHERE id_luar_negeri = ?";
		$stmt = $this->conn->prepare($query);
		$stmt->bindParam(1, $this->id_luar_negeri);
		if ($result = $stmt->execute()) {
			return true;
		} else {
			return false;
		}
	}

	function hapusell($ax) {
		$query = "DELETE FROM {$this->table_name} WHERE id_luar_negeri in $ax";
		$stmt = $this->conn->prepare($query);
		if ($result = $stmt->execute()) {
			return true;
		} else {
			return false;
		}
	}
}
