<?php
include_once('includes/header.inc.php');

include_once('includes/galeri.inc.php');
$altObj = new galeri($db);

if(isset($_POST['submit'])){
    $altObj->id_galeri = $_POST["id_galeri"];
	$altObj->gambar = $_FILES["gambar"]["name"];
    $altObj->keterangan = $_POST["keterangan"];

	move_uploaded_file($_FILES["gambar"]["tmp_name"],"file/galeri/gambar/".$_FILES["gambar"]["name"]);

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
		  <li><a href="galeri.php">Galeri</a></li>
		  <li class="active">Tambah Galeri</li>
		</ol>
  	<p style="margin-bottom:10px;">
  		<strong style="font-size:18pt;"><span class="fa fa-clone"></span> Tambah Galeri</strong>
  	</p>
  	<div class="panel panel-default">
			<div class="panel-body">
				    <form method="post" id="form" enctype="multipart/form-data">
						  <div class="form-group">
						    <label for="id_galeri">Id Galeri</label>
						    <input type="text" class="form-control" id="id_galeri" name="id_galeri" required readonly="on" value="<?=$altObj->getNewID()?>">
						  </div>
							<div class="form-group">
									<label for="gambar">Gambar</label>
									<input type="file" name="gambar" id="gambar" required="on">
                            </div>
                            <div class="form-group">
									<label for="keterangan">Keterangan</label>
									<input type="text" name="keterangan" id="keterangan" class="form-control" value="<?=$altObj->keterangan?>" minlength="1" required="on">
							</div>
							<div class="btn-group">
							  <button type="submit" class="btn btn-dark" name="submit">Simpan</button>
							  <button type="button" onclick="location.href='galeri.php'" class="btn btn-default">Kembali</button>
							</div>
					</form>
			  </div>
		</div>
	</div>
</div>

<?php include_once('includes/footer.inc.php'); ?>
