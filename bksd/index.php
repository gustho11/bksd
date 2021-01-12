<?php
include_once('includes/header.php');
include_once('includes/galeri.inc.php')
?>

<div role="main" class="main"  style="margin-top: 0%;margin-bottom: 0%;">
	<div class="row" style="border-top: 5px solid black ; border-bottom:5px solid black">
		<div class="col-md-12" style="height: 550px !important;">
			<center><img src="assets/img/logo2.jpg" width="80%" height="550"></center>
		</div>
	</div>
</div>
	<br>
		
<div class="home-intro" style="background-position: bottom;margin-bottom: 1%;margin: 0px;border-top: 2px dashed #f88c00"></div>
<div class="home-intro" style="background: url('assets/img/kantor-bupati.jpeg');width:100%; height: 200%;background-repeat: no-repeat;background-position: bottom;margin-bottom: 5%;">
	<div class="container">
		<div class="row" >
			<div class="col-md-8">
				<div id="content">
					<div class="tabs" style="margin-bottom: 2%;">
						<ul class="nav nav-tabs">
							<li class="active">
								<a href="#berita" data-toggle="tab"> Berita Terbaru</a>
							</li>
							<li class="">
								<a href="#pengumuman" data-toggle="tab"> Pengumuman</a>
							</li>
							<li class="">
								<a href="#agenda" data-toggle="tab"> Agenda</a>
							</li>
							<li class="">
								<a href="#kerja-sama" data-toggle="tab"> Kerja Sama</a>
							</li>
							<li class="">
								<a href="#visimisi" data-toggle="tab"> Visi Misi</a>
							</li>
							<li class="">
								<a href="#struktur" data-toggle="tab"> Struktur Organisasi</a>
							</li>
						</ul>
						<div class="tab-content">
							<?php include "includes/index-berita.php" ?>
							<?php include "includes/index-pengumuman.php" ?>
							<?php include "includes/index-agenda.php" ?>
							<?php include "includes/index-kerjasama.php" ?>
							<?php include "includes/index-visimisi.php" ?>
							<?php include "includes/index-struktur.php" ?>
						</div>
					</div>
				</div>
			</div>
			<?php include "includes/side-page.php"; ?>
		</div>
			<?php include "includes/index-profil.php"; ?>
			<?php include "includes/index-galeri.php"; ?>
						<!--
						<div class="row">
						<div class="col-md-12">
							<div class="map">
								<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15938.991309874862!2d103.8401941!3d-2.8888977!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xcd73dffc6679c4e!2sRegent%20Office%20Musi%20Banyuasin!5e0!3m2!1sen!2sid!4v1583268096062!5m2!1sen!2sid" width="100%" height="600" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
							</div>
						</div>
						</div>-->
	</div>
</div>


<?php
include_once('includes/footer.php');
?>
