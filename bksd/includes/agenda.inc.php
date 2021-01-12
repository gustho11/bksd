<?php
class agenda {
	private $conn;
	private $table_name = "agenda";

	public $id_agenda;
	public $nama_agenda;
	public $tgl_agenda;
	public $isi_agenda;
	public $lampiran;

	public function __construct($db) {
		$this->conn = $db;
	}

	function readAll() {
		$query = "SELECT * FROM {$this->table_name} ORDER BY id_agenda DESC";
		$stmt = $this->conn->prepare( $query );
		$stmt->execute();

		return $stmt;
	}
	function readTen() {
		$query = "SELECT * FROM {$this->table_name} ORDER BY id_agenda DESC	LIMIT 0,5";
		$stmt = $this->conn->prepare( $query );
		$stmt->execute();

		return $stmt;
	}

	function countAll(){
		$query = "SELECT * FROM {$this->table_name} ORDER BY id_agenda DESC";
		$stmt = $this->conn->prepare( $query );
		$stmt->execute();

		return $stmt->rowCount();
	}

	function readOne(){
		$query = "SELECT * FROM {$this->table_name} WHERE id_agenda=? LIMIT 0,1";
		$stmt = $this->conn->prepare($query);
		$stmt->bindParam(1, $this->id_agenda);
		$stmt->execute();
		$row = $stmt->fetch(PDO::FETCH_ASSOC);

		$this->id = $row["id_agenda"];
		$this->nama_agenda = $row["nama_agenda"];
		$this->tgl_agenda = $row["tgl_agenda"];
		$this->isi_agenda = $row["isi_agenda"];
		$this->lampiran = $row["lampiran"];
	}

	function readSatu($a) {
		$query = "SELECT * FROM {$this->table_name} WHERE id_agenda='$a' LIMIT 0,1";
		$stmt = $this->conn->prepare( $query );
		$stmt->execute();

		return $stmt;
	}
}
