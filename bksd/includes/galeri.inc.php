<?php
class galeri {
	private $conn;
	private $table_name = "galeri";

	public $id_galeri;
	public $gambar;
	public $keterangan;

	public function __construct($db) {
		$this->conn = $db;
	}

	function readAll() {
		$query = "SELECT * FROM {$this->table_name} ORDER BY id_galeri DESC";
		$stmt = $this->conn->prepare( $query );
		$stmt->execute();

		return $stmt;
    }
    
	function countAll(){
		$query = "SELECT * FROM {$this->table_name} ORDER BY id_galeri DESC";
		$stmt = $this->conn->prepare( $query );
		$stmt->execute();

		return $stmt->rowCount();
	}

	function readOne(){
		$query = "SELECT * FROM {$this->table_name} WHERE id_galeri=? LIMIT 0,1";
		$stmt = $this->conn->prepare($query);
		$stmt->bindParam(1, $this->id_galeri);
		$stmt->execute();
		$row = $stmt->fetch(PDO::FETCH_ASSOC);

		$this->id = $row["id_galeri"];
		$this->gambar = $row["gambar"];
		$this->keterangan = $row["keterangan"];
	}

	function readSatu($a) {
		$query = "SELECT * FROM {$this->table_name} WHERE id_galeri='$a' LIMIT 0,1";
		$stmt = $this->conn->prepare( $query );
		$stmt->execute();

		return $stmt;
	}
}
