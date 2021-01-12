<?php
class kerja_sama {
	private $conn;
	private $table_name = "kerja_sama";

	public $id_kerja_sama;
	public $nama_mitra;
    public $bidang;
    public $kategori;
    public $tahun;
    public $lampiran;
    
	public function __construct($db) {
		$this->conn = $db;
	}

	function insert() {
		$query = "INSERT INTO {$this->table_name} VALUES(?, ?, ?, ?, ?, ?)";
		$stmt = $this->conn->prepare($query);
		$stmt->bindParam(1, $this->id_kerja_sama);
		$stmt->bindParam(2, $this->nama_mitra);
        $stmt->bindParam(3, $this->bidang);
		$stmt->bindParam(4, $this->kategori);
		$stmt->bindParam(5, $this->tahun);
		$stmt->bindParam(6, $this->lampiran);
        
		if ($stmt->execute()) {
			return true;
		} else {
			return false;
		}
	}

	function readAll() {
		$query = "SELECT * FROM {$this->table_name} ORDER BY id_kerja_sama ASC";
		$stmt = $this->conn->prepare( $query );
		$stmt->execute();

		return $stmt;
	}

	function countAll(){
		$query = "SELECT * FROM {$this->table_name} ORDER BY id_kerja_sama ASC";
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
		$this->kategori = $row["kategori"];
		$this->tahun = $row["tahun"];
		$this->lampiran = $row["lampiran"];
	}

	function readSatu($a) {
		$query = "SELECT * FROM {$this->table_name} WHERE id_kerja_sama='$a' LIMIT 0,1";
		$stmt = $this->conn->prepare( $query );
		$stmt->execute();

		return $stmt;
	}

	function getNewID() {
		$query = "SELECT MAX(id_kerja_sama) AS code FROM {$this->table_name}";
		$stmt = $this->conn->prepare($query);
		$stmt->execute();
		$row = $stmt->fetch(PDO::FETCH_ASSOC);

		if ($row) {
			return $this->genCode($row["code"], 'kj', 3);
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
					nama_mitra = :nama_mitra,
					bidang = :bidang,
					kategori = :kategori,
					tahun = :tahun,
					lampiran = :lampiran
				WHERE
					id_kerja_sama = :id_kerja_sama";
		$stmt = $this->conn->prepare($query);

		$stmt->bindParam(':nama_mitra', $this->nama_mitra);
		$stmt->bindParam(':bidang', $this->bidang);
		$stmt->bindParam(':kategori', $this->kategori);
		$stmt->bindParam(':tahun', $this->tahun);
		$stmt->bindParam(':lampiran', $this->lampiran);
		$stmt->bindParam(':id_kerja_sama', $this->id_kerja_sama);

		if ($stmt->execute()) {
			return true;
		} else {
			return false;
		}
	}

	function delete() {
		$query = "DELETE FROM {$this->table_name} WHERE id_kerja_sama = ?";
		$stmt = $this->conn->prepare($query);
		$stmt->bindParam(1, $this->id_kerja_sama);
		if ($result = $stmt->execute()) {
			return true;
		} else {
			return false;
		}
	}

	function hapusell($ax) {
		$query = "DELETE FROM {$this->table_name} WHERE id_kerja_sama in $ax";
		$stmt = $this->conn->prepare($query);
		if ($result = $stmt->execute()) {
			return true;
		} else {
			return false;
		}
	}
}
