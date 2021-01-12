<?php
include_once('includes/header.inc.php');

include_once('includes/kerja-sama.inc.php');
$altObj = new kerja_sama($db);

if(isset($_POST['submit'])){
	$altObj->id_kerja_sama = $_POST["id_kerja_sama"];
	$altObj->nama_mitra = $_POST["nama_mitra"];
	$altObj->bidang = $_POST["bidang"];
	$altObj->kategori = $_POST["kategori"];
	$altObj->tahun = $_POST["tahun"];
	$altObj->lampiran = $_FILES["lampiran"]["name"];

    move_uploaded_file($_FILES["lampiran"]["tmp_name"],"file/kerja-sama/lampiran/".$_FILES["lampiran"]["name"]);
    
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
		  <li><a href="kerja-sama.php">Kerja Sama</a></li>
		  <li class="active">Tambah Kerja Sama</li>
		</ol>
  	<p style="margin-bottom:10px;">
  		<strong style="font-size:18pt;"><span class="fa fa-clone"></span> Tambah Kerja Sama</strong>
  	</p>
  	<div class="panel panel-default">
			<div class="panel-body">
				    <form method="post" id="form" enctype="multipart/form-data">
						  <div class="form-group">
						    <label for="id_kerja_sama">Id Kerja Sama</label>
						    <input type="text" class="form-control" id="id_kerja_sama" name="id_kerja_sama" required readonly="on" value="<?=$altObj->getNewID()?>">
						  </div>
							<div class="form-group">
									<label for="nama_mitra">Nama Mitra</label>
									<input type="text" name="nama_mitra" id="nama_mitra" class="form-control" autofocus="on" minlength="3" required="on">
                            </div>
							<div class="form-group">
									<label for="bidang">Bidang</label>
									<input type="text" name="bidang" id="bidang" class="form-control" required="on">
							</div>
                            <div class="form-group">
                                <label for="kategori">Kategori</label>
                                <select class="form-control" name="kategori" required="on">
                                    <option value="Antar Daerah">Antar Daerah</option>
                                    <option value="Pihak Ketiga">Pihak Ketiga</option>
                                    <option value="Sinergi">Sinergi</option>
                                    <option value="Luar Negeri">Luar Negeri</option>
                                </select>
                            </div>
							<div class="form-group">
									<label for="tahun">Tahun</label>
									<select class="form-control" name="tahun"  required="on">
                                            <option value="2017">2017</option>
                                            <option value="2018">2018</option>
                                            <option value="2019">2019</option>
                                            <option value="2020">2020</option>
                                            <option value="2021">2021</option>
                                        </select>
							</div>
							<div class="form-group">
									<label for="lampiran">Lampiran</label>
									<input type="file" name="lampiran" id="lampiran" class="form-control">
									<span class="help-block text-red">*) Optional</span>
							</div>
							<div class="btn-group">
							  <button type="submit" class="btn btn-dark" name="submit">Simpan</button>
							  <button type="button" onclick="location.href='kerja-sama.php'" class="btn btn-default">Kembali</button>
							</div>
					</form>
			  </div>
		</div>
	</div>
</div>

<?php include_once('includes/footer.inc.php'); ?>
