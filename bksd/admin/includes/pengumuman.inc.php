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

	function insert() {
		$query = "INSERT INTO {$this->table_name} VALUES(?, ?, ?, ?, ?)";
		$stmt = $this->conn->prepare($query);
		$stmt->bindParam(1, $this->id_pengumuman);
		$stmt->bindParam(2, $this->judul_pengumuman);
		$stmt->bindParam(3, $this->tgl_pengumuman);
		$stmt->bindParam(4, $this->isi_pengumuman);
		$stmt->bindParam(5, $this->lampiran);

		if ($stmt->execute()) {
			return true;
		} else {
			return false;
		}
	}

	function readAll() {
		$query = "SELECT * FROM {$this->table_name} ORDER BY id_pengumuman ASC";
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
		$query = "SELECT * FROM {$this->table_name} ORDER BY id_pengumuman ASC";
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

	function getNewID() {
		$query = "SELECT MAX(id_pengumuman) AS code FROM {$this->table_name}";
		$stmt = $this->conn->prepare($query);
		$stmt->execute();
		$row = $stmt->fetch(PDO::FETCH_ASSOC);

		if ($row) {
			return $this->genCode($row["code"], 'pgm', 3);
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
					judul_pengumuman = :judul_pengumuman,
					tgl_pengumuman = :tgl_pengumuman,
					isi_pengumuman = :isi_pengumuman,
					lampiran = :lampiran
				WHERE
					id_pengumuman = :id_pengumuman";
		$stmt = $this->conn->prepare($query);

		$stmt->bindParam(':judul_pengumuman', $this->judul_pengumuman);
		$stmt->bindParam(':tgl_pengumuman', $this->tgl_pengumuman);
		$stmt->bindParam(':isi_pengumuman', $this->isi_pengumuman);
		$stmt->bindParam(':lampiran', $this->lampiran);
		$stmt->bindParam(':id_pengumuman', $this->id_pengumuman);

		if ($stmt->execute()) {
			return true;
		} else {
			return false;
		}
	}

	function delete() {
		$query = "DELETE FROM {$this->table_name} WHERE id_pengumuman = ?";
		$stmt = $this->conn->prepare($query);
		$stmt->bindParam(1, $this->id_pengumuman);
		if ($result = $stmt->execute()) {
			return true;
		} else {
			return false;
		}
	}
	
	function hapusell($ax) {
		$query = "DELETE FROM {$this->table_name} WHERE id_pengumuman in $ax";
		$stmt = $this->conn->prepare($query);
		if ($result = $stmt->execute()) {
			return true;
		} else {
			return false;
		}
	}
}
