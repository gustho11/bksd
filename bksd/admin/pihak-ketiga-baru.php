<?php
include_once('includes/header.inc.php');

include_once('includes/pihak-ketiga.inc.php');
$altObj = new pihak_ketiga($db);

if(isset($_POST['submit'])){
	$altObj->id_pihak_ketiga = $_POST["id_pihak_ketiga"];
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
          <li><a href="#">Kerja Sama</a></li>
		  <li><a href="pihak-ketiga.php">Pihak Ketiga</a></li>
		  <li class="active">Tambah Pihak Ketiga</li>
		</ol>
  	<p style="margin-bottom:10px;">
  		<strong style="font-size:18pt;"><span class="fa fa-clone"></span> Tambah Pihak Ketiga</strong>
  	</p>
  	<div class="panel panel-default">
			<div class="panel-body">
				    <form method="post" id="form" enctype="multipart/form-data">
						  <div class="form-group">
						    <label for="id_pihak_ketiga">Id Pihak Ketiga</label>
						    <input type="text" class="form-control" id="id_pihak_ketiga" name="id_pihak_ketiga" required readonly="on" value="<?=$altObj->getNewID()?>">
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
									<label for="tahun">Tahun</label>
									<input type="text" name="tahun" id="tahun" class="form-control" required="on" value="<?php echo date("Y"); ?>">
							</div>
							
							<div class="btn-group">
							  <button type="submit" class="btn btn-dark" name="submit">Simpan</button>
							  <button type="button" onclick="location.href='pihak-ketiga.php'" class="btn btn-default">Kembali</button>
							</div>
					</form>
			  </div>
		</div>
	</div>
</div>

<?php include_once('includes/footer.inc.php'); ?>
