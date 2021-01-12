<?php
include_once('includes/header.inc.php');

include_once('includes/agenda.inc.php');
$altObj = new agenda($db);

if(isset($_POST['submit'])){
	$altObj->id_agenda = $_POST["id_agenda"];
	$altObj->nama_agenda = $_POST["nama_agenda"];
	$altObj->tgl_agenda = $_POST["tgl_agenda"];
	$altObj->isi_agenda = $_POST["isi_agenda"];
	$altObj->lampiran = $_FILES["lampiran"]["name"];

	move_uploaded_file($_FILES["lampiran"]["tmp_name"],"file/agenda/lampiran/".$_FILES["lampiran"]["name"]);

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
		  <li><a href="agenda.php">Agenda</a></li>
		  <li class="active">Tambah Agenda</li>
		</ol>
  	<p style="margin-bottom:10px;">
  		<strong style="font-size:18pt;"><span class="fa fa-clone"></span> Tambah Agenda</strong>
  	</p>
  	<div class="panel panel-default">
			<div class="panel-body">
				    <form method="post" id="form" enctype="multipart/form-data">
						  <div class="form-group">
						    <label for="id_agenda">Id Agenda</label>
						    <input type="text" class="form-control" id="id_agenda" name="id_agenda" required readonly="on" value="<?=$altObj->getNewID()?>">
						  </div>
							<div class="form-group">
									<label for="nama_agenda">Judul Agenda</label>
									<input type="text" name="nama_agenda" id="nama_agenda" class="form-control" autofocus="on" minlength="3" required="on">
							</div>
							<div class="form-group">
									<label for="tgl_agenda">Tanggal Agenda</label>
									<input type="text" name="tgl_agenda" id="tgl_agenda" class="form-control datepicker" required="on" value="<?php echo date("Y-m-d"); ?>">
							</div>
							<div class="form-group">
									<label for="isi_agenda">Isi Agenda</label>
									<textarea id="isi_agenda" name="isi_agenda" rows="4" class="form-control" minlength="10" required="on"></textarea>
							</div>
							
							<div class="form-group">
									<label for="lampiran">Lampiran</label>
									<input type="file" name="lampiran" id="lampiran" class="form-control">
									<span class="help-block text-red">*) Optional</span>
							</div>
							<div class="btn-group">
							  <button type="submit" class="btn btn-dark" name="submit">Simpan</button>
							  <button type="button" onclick="location.href='agenda.php'" class="btn btn-default">Kembali</button>
							</div>
					</form>
			  </div>
		</div>
	</div>
</div>

<?php include_once('includes/footer.inc.php'); ?>
