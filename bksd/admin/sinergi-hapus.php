<?php
include_once("includes/config.php");
$database = new Config();
$db = $database->getConnection();

include_once('includes/sinergi.inc.php');
$pro = new sinergi($db);
$id = isset($_GET['id']) ? $_GET['id'] : die('ERROR: missing ID.');
$pro->id_sinergi = $id;

if($pro->delete()){
	echo "<script>location.href='sinergi.php';</script>";
} else{
	echo "<script>alert('Gagal Hapus Data');location.href='sinergi.php';</script>";
}
