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

	function readAll() {
		$query = "SELECT * FROM {$this->table_name} ORDER BY id_luar_negeri ASC";
		$stmt = $this->conn->prepare( $query );
		$stmt->execute();

		return $stmt;
	}

	function readTen() {
		$query = "SELECT * FROM {$this->table_name} ORDER BY id_luar_negeri ASC LIMIT 0,5";
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
}
