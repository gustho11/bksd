<?php
include_once("includes/config.php");
$database = new Config();
$db = $database->getConnection();

include_once('includes/luar-negeri.inc.php');
$pro = new luar_negeri($db);
$id = isset($_GET['id']) ? $_GET['id'] : die('ERROR: missing ID.');
$pro->id_luar_negeri = $id;

if($pro->delete()){
	echo "<script>location.href='luar-negeri.php';</script>";
} else{
	echo "<script>alert('Gagal Hapus Data');location.href='luar-negeri.php';</script>";
}
