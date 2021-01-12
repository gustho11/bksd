<?php
include_once("includes/config.php");
$database = new Config();
$db = $database->getConnection();

include_once('includes/pengumuman.inc.php');
$pro = new pengumuman($db);
$id = isset($_GET['id']) ? $_GET['id'] : die('ERROR: missing ID.');
$pro->id_pengumuman = $id;

if($pro->delete()){
	echo "<script>location.href='pengumuman.php';</script>";
} else{
	echo "<script>alert('Gagal Hapus Data');location.href='pengumuman.php';</script>";
}
