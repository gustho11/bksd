<?php
include_once("includes/config.php");
$database = new Config();
$db = $database->getConnection();

include_once('includes/antar-daerah.inc.php');
$pro = new antar_daerah($db);
$id = isset($_GET['id']) ? $_GET['id'] : die('ERROR: missing ID.');
$pro->id_ksdd = $id;

if($pro->delete()){
	echo "<script>location.href='antar-daerah.php';</script>";
} else{
	echo "<script>alert('Gagal Hapus Data');location.href='antar-daerah.php';</script>";
}
