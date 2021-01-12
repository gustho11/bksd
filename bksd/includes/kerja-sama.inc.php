<?php
class kerja_sama {
	private $conn;
	private $table_name = "kerja_sama";

	public $id_kerja_sama;
	public $nama_mitra;
	public $bidang;
	public $deskripsi;
	public $kategori;
	public $tahun;
    
	public function __construct($db) {
		$this->conn = $db;
	}

	function readAll() {
		$query = "SELECT * FROM {$this->table_name} ORDER BY tahun DESC";
		$stmt = $this->conn->prepare( $query );
		$stmt->execute();

		return $stmt;
	}

	function readTen() {
		$query = "SELECT * FROM {$this->table_name} ORDER BY tahun DESC LIMIT 0,5";
		$stmt = $this->conn->prepare( $query );
		$stmt->execute();

		return $stmt;
	}

	function countAll(){
		$query = "SELECT * FROM {$this->table_name} ORDER BY id_kerja_sama DESC";
		$stmt = $this->conn->prepare( $query );
		$stmt->execute();

		return $stmt->rowCount();
	}

	function readOne(){
		$query = "SELECT * FROM {$this->table_name} WHERE id_kerja_sama=? LIMIT 0,1";
		$stmt = $this->conn->prepare($query);
		$stmt->bindParam(1, $this->id_kerja_sama);
		$stmt->execute();
		$row = $stmt->fetch(PDO::FETCH_ASSOC);

		$this->id = $row["id_kerja_sama"];
		$this->nama_mitra = $row["nama_mitra"];
		$this->bidang = $row["bidang"];
		$this->deskripsi = $row["deskripsi"];
		$this->bidang = $row["kategori"];
		$this->bidang = $row["tahun"];
		
	}

	function readSatu($a) {
		$query = "SELECT * FROM {$this->table_name} WHERE id_kerja_sama='$a' LIMIT 0,1";
		$stmt = $this->conn->prepare( $query );
		$stmt->execute();

		return $stmt;
	}
}
