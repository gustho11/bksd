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

	function insert() {
		$query = "INSERT INTO {$this->table_name} VALUES(?, ?, ?, ?, ?, ?)";
		$stmt = $this->conn->prepare($query);
		$stmt->bindParam(1, $this->id_berita);
		$stmt->bindParam(2, $this->judul_berita);
		$stmt->bindParam(3, $this->tgl_berita);
		$stmt->bindParam(4, $this->tampilan);
		$stmt->bindParam(5, $this->isi_berita);
		$stmt->bindParam(6, $this->lampiran);

		if ($stmt->execute()) {
			return true;
		} else {
			return false;
		}
	}

	function readAll() {
		$query = "SELECT * FROM {$this->table_name} ORDER BY id_berita ASC";
		$stmt = $this->conn->prepare( $query );
		$stmt->execute();

		return $stmt;
	}

	//function readByRank() {
	//	$query = "SELECT * FROM {$this->table_name} ORDER BY hasil_akhir DESC LIMIT 0,5";
	//	$stmt = $this->conn->prepare($query);
	//	$stmt->execute();

	//	return $stmt;
	//} 

	function countAll(){
		$query = "SELECT * FROM {$this->table_name} ORDER BY id_berita ASC";
		$stmt = $this->conn->prepare( $query );
		$stmt->execute();

		return $stmt->rowCount();
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

	function getNewID() {
		$query = "SELECT MAX(id_berita) AS code FROM {$this->table_name}";
		$stmt = $this->conn->prepare($query);
		$stmt->execute();
		$row = $stmt->fetch(PDO::FETCH_ASSOC);

		if ($row) {
			return $this->genCode($row["code"], 'brt', 3);
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
					judul_berita = :judul_berita,
					tgl_berita = :tgl_berita,
					tampilan = :tampilan,
					isi_berita = :isi_berita,
					lampiran = :lampiran
				WHERE
					id_berita = :id_berita";
		$stmt = $this->conn->prepare($query);

		$stmt->bindParam(':judul_berita', $this->judul_berita);
		$stmt->bindParam(':tgl_berita', $this->tgl_berita);
		$stmt->bindParam(':tampilan', $this->tampilan);
		$stmt->bindParam(':isi_berita', $this->isi_berita);
		$stmt->bindParam(':lampiran', $this->lampiran);
		$stmt->bindParam(':id_berita', $this->id_berita);

		if ($stmt->execute()) {
			return true;
		} else {
			return false;
		}
	}

	function delete() {
		$query = "DELETE FROM {$this->table_name} WHERE id_berita = ?";
		$stmt = $this->conn->prepare($query);
		$stmt->bindParam(1, $this->id_berita);
		if ($result = $stmt->execute()) {
			return true;
		} else {
			return false;
		}
	}

	function hapusell($ax) {
		$query = "DELETE FROM {$this->table_name} WHERE id_berita in $ax";
		$stmt = $this->conn->prepare($query);
		if ($result = $stmt->execute()) {
			return true;
		} else {
			return false;
		}
	}
}
