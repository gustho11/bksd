<?php
include_once('includes/header.inc.php');

include_once('includes/pengumuman.inc.php');
$altObj = new pengumuman($db);

if(isset($_POST['submit'])){
	$altObj->id_pengumuman = $_POST["id_pengumuman"];
	$altObj->judul_pengumuman = $_POST["judul_pengumuman"];
	$altObj->tgl_pengumuman = $_POST["tgl_pengumuman"];
	$altObj->isi_pengumuman = $_POST["isi_pengumuman"];
	$altObj->lampiran = $_FILES["lampiran"]["name"];

	move_uploaded_file($_FILES["lampiran"]["tmp_name"],"file/pengumuman/lampiran/".$_FILES["lampiran"]["name"]);

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
		  <li><a href="pengumuman.php">Pengumuman</a></li>
		  <li class="active">Tambah Pengumuman</li>
		</ol>
  	<p style="margin-bottom:10px;">
  		<strong style="font-size:18pt;"><span class="fa fa-clone"></span> Tambah Pengumuman</strong>
  	</p>
  	<div class="panel panel-default">
			<div class="panel-body">
				    <form method="post" id="form" enctype="multipart/form-data">
						  <div class="form-group">
						    <label for="id_pengumuman">Id Pengumuman</label>
						    <input type="text" class="form-control" id="id_pengumuman" name="id_pengumuman" required readonly="on" value="<?=$altObj->getNewID()?>">
						  </div>
							<div class="form-group">
									<label for="judul_pengumuman">Judul Pengumuman</label>
									<input type="text" name="judul_pengumuman" id="judul_pengumuman" class="form-control" autofocus="on" minlength="3" required="on">
							</div>
							<div class="form-group">
									<label for="tgl_pengumuman">Tanggal Pengumuman</label>
									<input type="text" name="tgl_pengumuman" id="tgl_pengumuman" class="form-control datepicker" required="on" value="<?php echo date("Y-m-d"); ?>">
							</div>
							<div class="form-group">
									<label for="isi_pengumuman">Isi Pengumuman</label>
									<textarea id="isi_pengumuman" name="isi_pengumuman" rows="4" class="form-control" minlength="10" required="on"></textarea>
							</div>
							
							<div class="form-group">
									<label for="lampiran">Lampiran</label>
									<input type="file" name="lampiran" id="lampiran" class="form-control">
									<span class="help-block text-red">*) Optional</span>
							</div>
							<div class="btn-group">
							  <button type="submit" class="btn btn-dark" name="submit">Simpan</button>
							  <button type="button" onclick="location.href='pengumuman.php'" class="btn btn-default">Kembali</button>
							</div>
					</form>
			  </div>
		</div>
	</div>
</div>

<?php include_once('includes/footer.inc.php'); ?>
