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

	function insert() {
		$query = "INSERT INTO {$this->table_name} VALUES(?, ?, ?)";
		$stmt = $this->conn->prepare($query);
		$stmt->bindParam(1, $this->id_galeri);
		$stmt->bindParam(2, $this->gambar);
		$stmt->bindParam(3, $this->keterangan);

		if ($stmt->execute()) {
			return true;
		} else {
			return false;
		}
	}

	function readAll() {
		$query = "SELECT * FROM {$this->table_name} ORDER BY id_galeri ASC";
		$stmt = $this->conn->prepare( $query );
		$stmt->execute();

		return $stmt;
    }
    
	function countAll(){
		$query = "SELECT * FROM {$this->table_name} ORDER BY id_galeri ASC";
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

	function getNewID() {
		$query = "SELECT MAX(id_galeri) AS code FROM {$this->table_name}";
		$stmt = $this->conn->prepare($query);
		$stmt->execute();
		$row = $stmt->fetch(PDO::FETCH_ASSOC);

		if ($row) {
			return $this->genCode($row["code"], 'glr', 3);
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
					gambar = :gambar,
					keterangan = :keterangan
				WHERE
					id_galeri = :id_galeri";
		$stmt = $this->conn->prepare($query);

		$stmt->bindParam(':gambar', $this->gambar);
		$stmt->bindParam(':keterangan', $this->keterangan);
		$stmt->bindParam(':id_galeri', $this->id_galeri);

		if ($stmt->execute()) {
			return true;
		} else {
			return false;
		}
	}

	function delete() {
		$query = "DELETE FROM {$this->table_name} WHERE id_galeri = ?";
		$stmt = $this->conn->prepare($query);
		$stmt->bindParam(1, $this->id_galeri);
		if ($result = $stmt->execute()) {
			return true;
		} else {
			return false;
		}
	}

	function hapusell($ax) {
		$query = "DELETE FROM {$this->table_name} WHERE id_galeri in $ax";
		$stmt = $this->conn->prepare($query);
		if ($result = $stmt->execute()) {
			return true;
		} else {
			return false;
		}
	}
}
