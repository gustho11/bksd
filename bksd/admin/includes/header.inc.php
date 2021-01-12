<?php
include("includes/config.php");
session_start();
if (!isset($_SESSION['username'])) {
  echo "<script>location.href='login.php'</script>";
}
$config = new Config();
$db = $config->getConnection();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/jpg" href="assets/img/logo1.jpg">
    <title>BKSD Pemda MUBA</title>
    <link type="text/css" rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link type="text/css" rel="stylesheet" href="assets/css/bootstrap-datepicker.min.css">
    <link type="text/css" rel="stylesheet" href="assets/css/dataTables.bootstrap.min.css">
    <link type="text/css" rel="stylesheet" href="assets/css/jquery.toastmessage.css"/>
    <link type="text/css" rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link type="text/css" rel="stylesheet" href="assets/css/sweetalert.css">
    <link type="text/css" rel="stylesheet" href="assets/css/parsley.css">
    <link type="text/css" rel="stylesheet" href="assets/css/style.css">
    <script type="text/javascript" src="assets/js/ckeditor/ckeditor.js"></script>
    <script type="text/javascript" src="assets/js/sweetalert.min.js"></script>
    <script type="text/javascript" src="assets/js/jquery-1.11.3.min.js"></script>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
    <!--<header class="head" style="height:100px;">
      <div class="container"><br/>
        <img src="assets/img/logo1.jpg" width="50" height="50">
      </div> -->
    </header>
    <div id="nav" >
      <nav class="navbar navbar-default navbar-static" style="background-color: #BA5C12; border-color: #BA5C12 !important;">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li><a href="index.php">Home <span class="sr-only">(current)</span></a></li>
                <!-- if ($_SESSION["level"] == "1"): -->
                    <li role="presentation"><a href="berita.php">Berita</a></li>
                    <li role="presentation"><a href="agenda.php">Agenda</a></li>
                    <li role="presentation"><a href="pengumuman.php">Pengumuman</a></li>
                    <li role="presentation"><a href="galeri.php">Galeri</a></li>
                    <li role="presentation"><a href="kerja-sama.php">Kerja Sama</a></li>
                    <!--<li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Kerja Sama <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li role="presentation"><a href="antar-daerah.php">Antar Daerah</a></li>
                            <li role="presentation"><a href="pihak-ketiga.php">Pihak Ketiga</a></li>
                            <li role="presentation"><a href="sinergi.php">Sinergi</a></li>
                            <li role="presentation"><a href="luar-negeri.php">Luar Negeri</a></li>
                        </ul>
                    </li> -->
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><img src="assets/img/logo1.jpg" width="50" height="50"></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle text-red text-bold" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?=$_SESSION["nama_lengkap"]?> <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="profil.php">Profil</a></li>
                        <li><a href="user.php">Manejer Pengguna</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="logout.php">Logout</a></li>
                    </ul>
                </li>
            </ul>
                <!-- endif; -->
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container -->
    </nav>
  </div>

  <div class="container">
