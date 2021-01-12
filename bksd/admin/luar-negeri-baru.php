<?php
include_once('includes/header.inc.php');

include_once('includes/luar-negeri.inc.php');
$altObj = new luar_negeri($db);

if(isset($_POST['submit'])){
	$altObj->id_luar_negeri = $_POST["id_luar-negeri"];
	$altObj->nama_mitra = $_POST["nama_mitra"];
	$altObj->deskripsi = $_POST["deskripsi"];
	$altObj->bidang = $_POST["bidang"];
	$altObj->tahun = $_POST["tahun"];
	
	if($altObj->insert()){
?>
		<script type="text/javascript">
			window.onload=function(){
				showStickySuccessToast();
			};
		</script> <?php
	} else { ?>
		<script type="text/javascript">
			window.onload=function(){
				showStickyErrorToast();
			};
		</script> <?php
	}
}
?>
<div class="row">
  <div class="col-xs-12 col-sm-12 col-md-12">
	  <ol class="breadcrumb">
          <li><a href="index.php">Beranda</a></li>
          <li><a href="#">Mitra</a></li>
		  <li><a href="luar-negeri.php">Luar Negeri</a></li>
		  <li class="active">Tambah Luar Negeri</li>
		</ol>
  	<p style="margin-bottom:10px;">
  		<strong style="font-size:18pt;"><span class="fa fa-clone"></span> Tambah Luar Negeri</strong>
  	</p>
  	<div class="panel panel-default">
			<div class="panel-body">
				    <form method="post" id="form" enctype="multipart/form-data">
						  <div class="form-group">
						    <label for="id_luar-negeri">Id Luar Negeri</label>
						    <input type="text" class="form-control" id="id_luar-negeri" name="id_luar-negeri" required readonly="on" value="<?=$altObj->getNewID()?>">
						  </div>
							<div class="form-group">
									<label for="nama_mitra">Nama Mitra</label>
									<input type="text" name="nama_mitra" id="nama_mitra" class="form-control" autofocus="on" minlength="3" required="on">
                            </div>
                            
							<div class="form-group">
									<label for="deskripsi">Deskripsi</label>
									<textarea id="deskripsi" name="deskripsi" rows="4" class="form-control ckeditor" minlength="10" required="on"></textarea>
                            </div>
                            
							<div class="form-group">
									<label for="bidang">Bidang</label>
									<input type="text" name="bidang" id="bidang" class="form-control" required="on">
							</div>

							<div class="form-group">
									<label for="tahun">Tahun</Tabel>
									<input type="text" name="tahun" Td="tahun" Tlass="form-control" required="on" value="<?php echo date('Y'); ?>">
							</div>
							
							<div class="btn-group">
							  <button type="submit" class="btn btn-dark" name="submit">Simpan</button>
							  <button type="button" onclick="location.href='luar-negeri.php'" class="btn btn-default">Kembali</button>
							</div>
					</form>
			  </div>
		</div>
	</div>
</div>

<?php include_once('includes/footer.inc.php'); ?>
