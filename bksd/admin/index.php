<?php
include_once 'includes/header.inc.php';

include_once 'includes/berita.inc.php';
$pro = new berita($db);
$stmt = $pro->readAll();

include_once 'includes/agenda.inc.php';
$pro2 = new agenda($db);
$stmt2 = $pro2->readAll();

include_once 'includes/pengumuman.inc.php';
$pro3 = new pengumuman($db);
$stmt3 = $pro3->readAll();

include_once 'includes/galeri.inc.php';
$pro4 = new galeri($db);
$stmt4 = $pro4->readAll();

include_once 'includes/antar-daerah.inc.php';
$pro5 = new antar_daerah($db);
$stmt5 = $pro5->readAll();

include_once 'includes/luar-negeri.inc.php';
$pro6 = new luar_negeri($db);
$stmt6 = $pro6->readAll();

?>
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<div class="panel-title">
						<h3>Selamat datang!</h3>
						<h7> Admin BKSD PemKab MUBA</h7>
					</div>
					<br/>
					<!--<div id="container2" style="min-width: 100%; height: 400px; margin: 0 auto"></div>-->
					<br/>
					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-12">
							<div class="panel panel-default">
								<div class="panel-heading">
									<h1 class="panel-title text-center">Berita</h1>
								</div>
								<div class="panel-body">
									<ol>
										<?php while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) : ?>
											<img src="file/berita/tampilan/<?php echo $row['tampilan'] ?>" width="100" height="100">
											<b><?php echo $row['judul_berita'] ?></b> (<?php echo $row['tgl_berita'] ?>) 
											<br>
										<?php endwhile; ?>
									</ol>
								</div>
							</div>
						</div>
						<div class="col-xs-12 col-sm-12 col-md-6">
							<div class="panel panel-default">
								<div class="panel-heading">
									<h3 class="panel-title text-center">Agenda</h3>
								</div>
								<?php while ($row = $stmt2->fetch(PDO::FETCH_ASSOC)) : ?>
								<div class="panel-body">
												<b style="font-size: 20px"><?php echo $row['nama_agenda'] ?></b> (<?php echo $row['tgl_agenda'] ?>)
												<br/><?php echo $row['isi_agenda'] ?><br/>
												<?php if($row['lampiran'] == NULL): ?>
													<p class="help-block">Tidak Ada Lampiran</p>
												<?php else: ?>
													<a href="file/pengumuman/lampiran/<?php echo $row['lampiran'] ?>"><?php echo$row['lampiran']?></a></td>
												<?php endif; ?>
												<br>
								</div>
								<?php endwhile; ?>
							</div>
						</div>
						<div class="col-xs-12 col-sm-12 col-md-6">
							<div class="panel panel-default">
								<div class="panel-heading">
									<h3 class="panel-title text-center">Pengumuman</h3>
								</div>
								<?php while ($row = $stmt3->fetch(PDO::FETCH_ASSOC)) : ?>
								<div class="panel-body">
												<b style="font-size: 20px"><?php echo $row['judul_pengumuman'] ?></b> (<?php echo $row['tgl_pengumuman'] ?>)
												<br/><?php echo $row['isi_pengumuman'] ?><br/>
												<?php if($row['lampiran'] == NULL): ?>
													<p class="help-block">Tidak Ada Lampiran</p>
												<?php else: ?>
													<a href="file/pengumuman/lampiran/<?php echo $row['lampiran'] ?>"><?php echo$row['lampiran']?></a></td>
												<?php endif; ?>
												<br>
								</div>
								<?php endwhile; ?>
							</div>
						</div>
						<div class="col-xs-12 col-sm-12 col-md-12">
							<div class="panel panel-default">
								<div class="panel-heading">
									<h1 class="panel-title text-center">Galeri</h1>
								</div>
								<div class="panel-body">
										<?php while ($row = $stmt4->fetch(PDO::FETCH_ASSOC)) : ?>
											<div class="col-xs-4 col-sm-4 col-md-4">
												<p class="text-center">
													<img src="file/galeri/gambar/<?php echo $row['gambar'] ?>" width="100" height="100"><br/>
													<?php echo $row['keterangan'] ?>
												</p>
												<br>
											</div>
										<?php endwhile; ?>
								</div>
							</div>
						</div>
						<div class="col-xs-12 col-sm-12 col-md-6">
							<div class="panel panel-default">
								<div class="panel-heading">
									<h3 class="panel-title text-center">Kerja Sama Daerah Daerah</h3>
								</div>
								<div class="panel-body">
										<ol>
										<?php while ($row = $stmt5->fetch(PDO::FETCH_ASSOC)) : ?>
											<li>
											<b style="font-size: 18px"><?php echo $row['nama_mitra'] ?></b> (<?php echo $row['tahun'] ?>)
											<br>Bidang : <?php echo $row['bidang'] ?>
											<br/>Deskripsi : <?php echo $row['deskripsi'] ?>
											<br>
											</li>
										<?php endwhile; ?>
										</ol>
								</div>
							</div>
						</div>
						<div class="col-xs-12 col-sm-12 col-md-6">
							<div class="panel panel-default">
								<div class="panel-heading">
									<h3 class="panel-title text-center">Mitra Luar Negeri</h3>
								</div>
								<div class="panel-body">
										<ol>
										<?php while ($row = $stmt6->fetch(PDO::FETCH_ASSOC)) : ?>
											<li>
											<b style="font-size: 18px"><?php echo $row['nama_mitra'] ?></b> (<?php echo $row['bidang'] ?>)
											<br/><?php echo $row['deskripsi'] ?>
											<br>
											</li>
										<?php endwhile; ?>
										</ol>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php include_once 'includes/footer.inc.php'; ?>
</body>
</html>
