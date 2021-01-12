<?php
include_once('includes/header.inc.php');

$id_agenda = isset($_GET['id']) ? $_GET['id'] : die('ERROR: missing ID.');

include_once('includes/agenda.inc.php');

$altObj = new agenda($db);
$altObj->id_agenda = $id_agenda;
$altObj->readOne();

if(isset($_POST['submit'])){
    $altObj->id_agenda = $_POST["id_agenda"];
	$altObj->nama_agenda = $_POST["nama_agenda"];
	$altObj->tgl_agenda = $_POST["tgl_agenda"];
	$altObj->isi_agenda = $_POST["isi_agenda"];
	$altObj->lampiran = $_FILES["lampiran"]["name"];

    move_uploaded_file($_FILES["lampiran"]["tmp_name"],"file/agenda/lampiran/".$_FILES["lampiran"]["name"]);
    
    if ($altObj->update()) {
        echo "<script>location.href='agenda.php'</script>";
    } else { ?>
      <script type="text/javascript">
        window.onload = function () {
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
      <li><a href="agenda-ubah.php?id=<?php echo $altObj->id_agenda; ?>">Ubah Agenda</a></li>
      <li class="active">Edit Lampiran</li>
    </ol>
    <p style="margin-bottom:10px;">
      <strong style="font-size:18pt;"><span class="fa fa-pencil"></span> Edit Lampiran</strong>
    </p>
      <div class="panel panel-default">
        <div class="panel-body">
          <form method="POST" id="form" enctype="multipart/form-data">
            <div class="form-group">
                <label for="id_agenda">Id Agenda</label>
                <input type="text" name="id_agenda" id="id_agenda" class="form-control" readonly="on" value="<?php echo $altObj->id_agenda; ?>">
            </div>
            <div class="form-group">
                <label for="nama_agenda">Nama Agenda</label>
                <input type="text" name="nama_agenda" id="nama_agenda" class="form-control" readonly="on" required="on" value="<?php echo $altObj->nama_agenda; ?>" minlength="3">
            </div>
            <div class="form-group">
                <label for="tgl_agenda">Tanggal Agenda</label>
                <input type="text" name="tgl_agenda" id="tgl_agenda" readonly="on" class="form-control" value="<?php echo $altObj->tgl_agenda; ?>" minlength="3" required="on">
            </div>
            <div class="form-group">
                <label for="isi_agenda">Isi Agenda</label>
                <textarea id="isi_agenda" name="isi_agenda" rows="4" class="form-control" minlength="10" readonly="on" required="on"><?php echo $altObj->isi_agenda; ?></textarea>
            </div>
            <div class="form-group">
                <label for="lampiran">Lampiran</label><br/>
                  <a href="file/agenda/lampiran/<?php echo $altObj->lampiran; ?>"><?php echo $altObj->lampiran; ?></a><br/><br/>
                  <input type="file" name="lampiran" id="lampiran" class="form-control" minlength="5">
                  <span class="help-block text-red">*) Biarkan Kosong untuk hapus Lampiran</span>
            </div>
            <div class="btn-group">
              <button type="submit" class="btn btn-dark" name="submit">Submit</button>
              <button type="button" onclick="location.href = 'agenda-ubah.php?id=<?php echo $altObj->id_agenda; ?>'" class="btn btn-default">Kembali</button>
            </div>
          </form>
        </div>
      </div>
  </div>
</div>

<?php include_once('includes/footer.inc.php'); ?>
