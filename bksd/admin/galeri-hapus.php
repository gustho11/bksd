<?php
include_once("includes/config.php");
$database = new Config();
$db = $database->getConnection();

include_once('includes/galeri.inc.php');
$pro = new galeri($db);
$id = isset($_GET['id']) ? $_GET['id'] : die('ERROR: missing ID.');
$pro->id_galeri = $id;

if($pro->delete()){
	echo "<script>location.href='galeri.php';</script>";
} else{
	echo "<script>alert('Gagal Hapus Data');location.href='galeri.php';</script>";
}
