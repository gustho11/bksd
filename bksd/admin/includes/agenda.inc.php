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

	function insert() {
		$query = "INSERT INTO {$this->table_name} VALUES(?, ?, ?, ?, ?)";
		$stmt = $this->conn->prepare($query);
		$stmt->bindParam(1, $this->id_agenda);
		$stmt->bindParam(2, $this->nama_agenda);
		$stmt->bindParam(3, $this->tgl_agenda);
		$stmt->bindParam(4, $this->isi_agenda);
		$stmt->bindParam(5, $this->lampiran);

		if ($stmt->execute()) {
			return true;
		} else {
			return false;
		}
	}

	function readAll() {
		$query = "SELECT * FROM {$this->table_name} ORDER BY id_agenda ASC";
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
		$query = "SELECT * FROM {$this->table_name} ORDER BY id_agenda ASC";
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

	function getNewID() {
		$query = "SELECT MAX(id_agenda) AS code FROM {$this->table_name}";
		$stmt = $this->conn->prepare($query);
		$stmt->execute();
		$row = $stmt->fetch(PDO::FETCH_ASSOC);

		if ($row) {
			return $this->genCode($row["code"], 'agd', 3);
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
					nama_agenda = :nama_agenda,
					tgl_agenda = :tgl_agenda,
					isi_agenda = :isi_agenda,
					lampiran = :lampiran
				WHERE
					id_agenda = :id_agenda";
		$stmt = $this->conn->prepare($query);

		$stmt->bindParam(':nama_agenda', $this->nama_agenda);
		$stmt->bindParam(':tgl_agenda', $this->tgl_agenda);
		$stmt->bindParam(':isi_agenda', $this->isi_agenda);
		$stmt->bindParam(':lampiran', $this->lampiran);
		$stmt->bindParam(':id_agenda', $this->id_agenda);

		if ($stmt->execute()) {
			return true;
		} else {
			return false;
		}
	}

	function delete() {
		$query = "DELETE FROM {$this->table_name} WHERE id_agenda = ?";
		$stmt = $this->conn->prepare($query);
		$stmt->bindParam(1, $this->id_agenda);
		if ($result = $stmt->execute()) {
			return true;
		} else {
			return false;
		}
	}

	function hapusell($ax) {
		$query = "DELETE FROM {$this->table_name} WHERE id_agenda in $ax";
		$stmt = $this->conn->prepare($query);
		if ($result = $stmt->execute()) {
			return true;
		} else {
			return false;
		}
	}
}
