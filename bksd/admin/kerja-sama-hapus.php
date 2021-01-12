<?php
include_once("includes/config.php");
$database = new Config();
$db = $database->getConnection();

include_once('includes/kerja-sama.inc.php');
$pro = new kerja_sama($db);
$id = isset($_GET['id']) ? $_GET['id'] : die('ERROR: missing ID.');
$pro->id_kerja_sama = $id;

if($pro->delete()){
	echo "<script>location.href='kerja-sama.php';</script>";
} else{
	echo "<script>alert('Gagal Hapus Data');location.href='kerja-sama.php';</script>";
}
