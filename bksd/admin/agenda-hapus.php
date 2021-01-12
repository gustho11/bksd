<?php
include_once("includes/config.php");
$database = new Config();
$db = $database->getConnection();

include_once('includes/agenda.inc.php');
$pro = new agenda($db);
$id = isset($_GET['id']) ? $_GET['id'] : die('ERROR: missing ID.');
$pro->id_agenda = $id;

if($pro->delete()){
	echo "<script>location.href='agenda.php';</script>";
} else{
	echo "<script>alert('Gagal Hapus Data');location.href='agenda.php';</script>";
}
