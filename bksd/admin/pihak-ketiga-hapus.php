<?php
include_once("includes/config.php");
$database = new Config();
$db = $database->getConnection();

include_once('includes/pihak-ketiga.inc.php');
$pro = new pihak_ketiga($db);
$id = isset($_GET['id']) ? $_GET['id'] : die('ERROR: missing ID.');
$pro->id_pihak_ketiga = $id;

if($pro->delete()){
	echo "<script>location.href='pihak-ketiga.php';</script>";
} else{
	echo "<script>alert('Gagal Hapus Data');location.href='pihak-ketiga.php';</script>";
}
