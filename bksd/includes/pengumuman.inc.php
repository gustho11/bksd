<?php
class pengumuman {
	private $conn;
	private $table_name = "pengumuman";

	public $id_pengumuman;
	public $judul_pengumuman;
	public $tgl_pengumuman;
	public $isi_pengumuman;
	public $lampiran;

	public function __construct($db) {
		$this->conn = $db;
	}

	function readAll() {
		$query = "SELECT * FROM {$this->table_name} ORDER BY id_pengumuman DESC";
		$stmt = $this->conn->prepare( $query );
		$stmt->execute();

		return $stmt;
	}

	
	function readTen() {
		$query = "SELECT * FROM {$this->table_name} ORDER BY id_pengumuman DESC LIMIT 0,5";
		$stmt = $this->conn->prepare( $query );
		$stmt->execute();

		return $stmt;
	}

	function countAll(){
		$query = "SELECT * FROM {$this->table_name} ORDER BY id_pengumuman DESC";
		$stmt = $this->conn->prepare( $query );
		$stmt->execute();

		return $stmt->rowCount();
	}

	function readOne(){
		$query = "SELECT * FROM {$this->table_name} WHERE id_pengumuman=? LIMIT 0,1";
		$stmt = $this->conn->prepare($query);
		$stmt->bindParam(1, $this->id_pengumuman);
		$stmt->execute();
		$row = $stmt->fetch(PDO::FETCH_ASSOC);

		$this->id = $row["id_pengumuman"];
		$this->judul_pengumuman = $row["judul_pengumuman"];
		$this->tgl_pengumuman = $row["tgl_pengumuman"];
		$this->isi_pengumuman = $row["isi_pengumuman"];
		$this->lampiran = $row["lampiran"];
	}

	function readSatu($a) {
		$query = "SELECT * FROM {$this->table_name} WHERE id_pengumuman='$a' LIMIT 0,1";
		$stmt = $this->conn->prepare( $query );
		$stmt->execute();

		return $stmt;
	}
}
