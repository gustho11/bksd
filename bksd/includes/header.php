<?php
include("includes/config.php");
$config = new Config();
$db = $config->getConnection();
?>
<!DOCTYPE html>
<html> 
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="assets/themes/css/pager.css" />
		<link rel="icon" type="image/png" href="assets/img/logo.png">
<title>Badan Kerja Sama Daerah Pemerintah Kabupaten Musi Banyuasin</title>
		<script src="https://kit.fontawesome.com/27c4cc00da.js" crossorigin="anonymous"></script>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<meta name="author" content="bksd.mubakab.go.id">

		<!-- Mobile Metas -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<!-- Libs CSS -->
		<link rel="stylesheet" href="assets/themes/vendor/bootstrap.css">
		<link rel="stylesheet" href="assets/themes/vendor/font-awesome.css">
		<link rel="stylesheet" href="assets/themes/vendor/owl.carousel.css" media="screen">
		<link rel="stylesheet" href="assets/themes/vendor/owl.theme.css" media="screen">
		<link rel="stylesheet" href="assets/themes/vendor/magnific-popup.css" media="screen">
		<link rel="stylesheet" href="assets/themes/vendor/jquery.isotope.css" media="screen">
		<link rel="stylesheet" href="assets/themes/vendor/mediaelementplayer.css" media="screen">

		<!-- Theme CSS -->
		<link rel="stylesheet" href="assets/themes/css/theme.css">
		<link rel="stylesheet" href="assets/themes/css/theme-elements.css">
		<link rel="stylesheet" href="assets/themes/css/theme-blog.css">
		<link rel="stylesheet" href="assets/themes/css/theme-shop.css">
		<link rel="stylesheet" href="assets/themes/css/theme-animate.css">
		<link rel="stylesheet" href="assets/themes/css/pager.css">

		<!-- Current Page CSS -->
		<link rel="stylesheet" href="assets/themes/vendor/component.css" media="screen">
		<link rel="stylesheet" href="assets/themes/vendor/nivo-slider.css" media="screen">
		<link rel="stylesheet" href="assets/themes/vendor/default.css" media="screen">

		<!-- Responsive CSS -->
		<link rel="stylesheet" href="assets/themes/css/theme-responsive.css" />

		<!-- Skin CSS -->
		<link rel="stylesheet" href="assets/themes/css/default.css">

		<!-- Custom CSS -->
		<link rel="stylesheet" href="assets/themes/css/custom.css">
		<link rel="stylesheet" href="assets/themes/css/global.css">

		<!-- Head Libs -->
		<script src="assets/themes/js/custom.js"></script>
		<script src="assets/themes/js/jquery.dataTables.min.js"></script>
		<script src="assets/themes/js/jquery.js"></script>
		<script src="assets/themes/js/modernizr.js"></script>

		<!-- Head Libs -->
		<script src="assets/themes/js/modernizr.js"></script>
		<script src="assets/themes/js/jquery.nivo.slider.js"></script>
	</head>


<body>


<div class="body">
<header id="header" class="flat-menu clean-top">
	
	<style type="text/css">
	.wrap{
		width: 1000px!important;
	}
	</style>
<div style="background-color: #c9c9c9;">
	<marquee style=" color: brown;"> <strong>Selamat Datang di Website Bagian Kerja Sama Sekretaris Daerah Kabupaten Musi Banyuasin</strong></marquee>
</div>
<div class="header-top" id="header_top"  style="height: 90px;">
	
	<div class="container">
		<div class="col col-md-12"  style="height: 10px">
			<div class="col col-md-3"  style="height: 10px">
				<h1 >
					<a href="#">
						<img src="assets/img/logo.png" width="70" height="80" style="padding-top: 10px">
					</a>
				</h1>
			</div>
			<br>
			<!--<div class="col col-md-3 pull-right">
				<div class="search">
					<form id="searchForm" action="/web/pencarian" method="post" novalidate="novalidate" style="margin-top: 7px;">
						<div class="input-group">
							<input type="text" class="form-control search" name="q" id="q" placeholder="Cari...">
							<span class="input-group-btn">
								<button class="btn btn-default" type="submit"><i class="icon icon-search"></i></button>
							</span>
						</div>
					</form>
				</div>
			</div>
			-->
		</div>
	</div>
</div>

<div class="navbar-collapse nav-main-collapse collapse"  align="center" style="background-color: #c9c9c9">
	<div class="container">
		<nav class="nav-main mega-menu">
		<center>
			<ul class="nav nav-pills nav-main" >
				<li class="dropdown">
					<a href="index.php">
						Beranda
					</a>
				</li>
				<li class="dropdown">
					<a class="dropdown-toggle" href="profil.php">
						Profil
						<i class="icon icon-angle-down"></i>
					</a>
					<ul class="dropdown-menu " style="margin-top: -5px;">
						<li>
							<a href="visimisi.php">
								Visi Misi							
							</a>
						</li>
						<li>
							<a href="struktur.php">
								Struktur Organisasi					 
							</a>
						</li>
					</ul>
				</li>   
				<li class="dropdown">
					<a href="berita.php">
							Berita												
					</a>
				</li>
				<li class="dropdown">
					<a class="dropdown-toggle" href="informasi.php">
					<i class="icon  icon-lg" style="font-size: 24px;"></i>
						Informasi
						<i class="icon icon-angle-down"></i>
					</a>
					<ul class="dropdown-menu" style="margin-top: -5px;">
						<li>
							<a href="agenda.php">
								Agenda							
							</a>
						</li>
						<li>
							<a href="pengumuman.php">
								Pengumuman						
							</a>
						</li>
					</ul>
				</li><li class="dropdown">
					<a href="kerja-sama.php">
						Kerja Sama											
					</a>
				</li> 
				<li class="dropdown">
					<a href="galeri.php">
						Galeri											
					</a>
				</li> 
				<li class="dropdown">
					<a href="tentang-kami.php">
						Tentang Kami												
					</a>
				</li> 
          	</ul>
		</center>
		</nav>
	</div>
</div>

<style type="text/css">
	a.accordion-toggle {
    background: -webkit-linear-gradient(rgb(175, 174, 174),#242424);
}
</style>
<!-- AND HEADER -->
</header>
<div class="container">
			<button class="btn btn-responsive-nav btn-inverse" data-toggle="collapse" data-target=".nav-main-collapse">
				<i class="icon icon-bars"></i>
			</button>
</div>