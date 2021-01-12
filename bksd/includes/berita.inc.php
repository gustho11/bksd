<?php
class berita {
	private $conn;
	private $table_name = "berita";

	public $id_berita;
	public $judul_berita;
	public $tgl_berita;
	public $tampilan;
	public $isi_berita;
	public $lampiran;

	public function __construct($db) {
		$this->conn = $db;
	}

	function readAll() {
		$query = "SELECT * FROM {$this->table_name} ORDER BY id_berita DESC";
		$stmt = $this->conn->prepare( $query );
		$stmt->execute();

		return $stmt;
    }
    
	function countAll(){
		$query = "SELECT * FROM {$this->table_name} ORDER BY id_berita DESC";
		$stmt = $this->conn->prepare( $query );
		$stmt->execute();

		return $stmt->rowCount();
	}

	function readTen(){
		$query = "SELECT * FROM {$this->table_name} ORDER BY id_berita DESC LIMIT 0,5";
		$stmt = $this->conn->prepare($query);
		$stmt->execute();

		return $stmt;
	}
	function readOne(){
		$query = "SELECT * FROM {$this->table_name} WHERE id_berita=? LIMIT 0,1";
		$stmt = $this->conn->prepare($query);
		$stmt->bindParam(1, $this->id_berita);
		$stmt->execute();
		$row = $stmt->fetch(PDO::FETCH_ASSOC);

		$this->id = $row["id_berita"];
		$this->judul_berita = $row["judul_berita"];
		$this->tgl_berita = $row["tgl_berita"];
		$this->tampilan = $row["tampilan"];
		$this->isi_berita = $row["isi_berita"];
		$this->lampiran = $row["lampiran"];
	}

	function readSatu($a) {
		$query = "SELECT * FROM {$this->table_name} WHERE id_berita='$a' LIMIT 0,1";
		$stmt = $this->conn->prepare( $query );
		$stmt->execute();

		return $stmt;
	}
}
