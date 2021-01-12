<?php
include_once('includes/header.inc.php');

include_once('includes/berita.inc.php');
$altObj = new berita($db);

if(isset($_POST['submit'])){
	$altObj->id_berita = $_POST["id_berita"];
	$altObj->judul_berita = $_POST["judul_berita"];
	$altObj->tgl_berita = $_POST["tgl_berita"];
	$altObj->tampilan = $_FILES["tampilan"]["name"];
	$altObj->isi_berita = $_POST["isi_berita"];
	$altObj->lampiran = $_FILES["lampiran"]["name"];

	move_uploaded_file($_FILES["tampilan"]["tmp_name"],"file/berita/tampilan/".$_FILES["tampilan"]["name"]);
	move_uploaded_file($_FILES["lampiran"]["tmp_name"],"file/berita/lampiran/".$_FILES["lampiran"]["name"]);

	if($altObj->insert()){ ?>
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
		  <li><a href="berita.php">Berita</a></li>
		  <li class="active">Tambah Berita</li>
		</ol>
  	<p style="margin-bottom:10px;">
  		<strong style="font-size:18pt;"><span class="fa fa-clone"></span> Tambah Berita</strong>
  	</p>
  	<div class="panel panel-default">
			<div class="panel-body">
				    <form method="post" id="form" enctype="multipart/form-data">
						  <div class="form-group">
						    <label for="id_berita">Id Berita</label>
						    <input type="text" class="form-control" id="id_berita" name="id_berita" required readonly="on" value="<?=$altObj->getNewID()?>">
						  </div>
							<div class="form-group">
									<label for="judul_berita">Judul Berita</label>
									<input type="text" name="judul_berita" id="judul_berita" class="form-control" autofocus="on" minlength="3" required="on">
							</div>
							<div class="form-group">
									<label for="tgl_berita">Tanggal Berita</label>
									<input type="text" name="tgl_berita" id="tgl_berita" class="form-control datepicker" required="on" value="<?php echo date("Y-m-d"); ?>">
							</div>
							<div class="form-group">
									<label for="tampilan">Tampilan</label>
									<input type="file" name="tampilan" id="tampilan" required="on">
							</div>
							<div class="form-group">
									<textarea id="isi_berita ckedtor" name="isi_berita" rows="4" class="form-control ckeditor" minlength="10" required="on"></textarea>
							</div>
							
							<div class="form-group">
									<label for="lampiran">Lampiran</label>
									<input type="file" name="lampiran" id="lampiran" class="form-control">
									<span class="help-block text-red">*) Optional</span>
							</div>
							<div class="btn-group">
							  <button type="submit" class="btn btn-dark" name="submit">Simpan</button>
							  <button type="button" onclick="location.href='berita.php'" class="btn btn-default">Kembali</button>
							</div>
					</form>
			  </div>
		</div>
	</div>
</div>

<?php include_once('includes/footer.inc.php'); ?>
