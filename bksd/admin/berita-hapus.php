<?php
include_once("includes/config.php");
$database = new Config();
$db = $database->getConnection();

include_once('includes/berita.inc.php');
$pro = new berita($db);
$id = isset($_GET['id']) ? $_GET['id'] : die('ERROR: missing ID.');
$pro->id_berita = $id;

if($pro->delete()){
	echo "<script>location.href='berita.php';</script>";
} else{
	echo "<script>alert('Gagal Hapus Data');location.href='berita.php';</script>";
}
