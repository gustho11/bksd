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

if(isset($_POST['submit2'])){
  $altObj->id_agenda = $_POST["id_agenda"];
  $altObj->nama_agenda = $_POST["nama_agenda"];
  $altObj->tgl_agenda = $_POST["tgl_agenda"];
  $altObj->isi_agenda = $_POST["isi_agenda"];
  
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
      <li class="active">Ubah Agenda</li>
    </ol>
    <p style="margin-bottom:10px;">
      <strong style="font-size:18pt;"><span class="fa fa-pencil"></span> Ubah Agenda</strong>
    </p>
      <div class="panel panel-default">
        <div class="panel-body">
          <form method="POST" id="form" enctype="multipart/form-data">
            <div class="form-group">
                <label for="id_agenda">Id Agenda</label>
                <input type="text" name="id_agenda" id="id_agenda" class="form-control" readonly="on" value="<?php echo $altObj->id_agenda; ?>">
            </div>
            <div class="form-group">
                <label for="nama_agenda">Judul Agenda</label>
                <input type="text" name="nama_agenda" id="nama_agenda" class="form-control" autofocus="on" required="on" value="<?php echo $altObj->nama_agenda; ?>" minlength="3">
            </div>
            <div class="form-group">
                <label for="tgl_agenda">Tanggal Agenda</label>
                <input type="text" name="tgl_agenda" id="tgl_agenda" class="form-control datepicker" value="<?php echo $altObj->tgl_agenda; ?>" minlength="3" required="on">
            </div>
            <div class="form-group">
                <label for="isi_agenda">Isi Agenda</label>
                <textarea id="isi_agenda" name="isi_agenda" rows="4" class="form-control" minlength="10" required="on"><?php echo $altObj->isi_agenda; ?></textarea>
            </div>
            <div class="form-group">
                <label for="lampiran">Lampiran</label><br/>
                <?php if($altObj->lampiran  != NULL): ?>
                  <a href="file/agenda/lampiran/<?php echo $altObj->lampiran; ?>"><?php echo $altObj->lampiran; ?></a><br/><br/>
                  <a href="agenda-lampiran-ubah.php?id=<?php echo $altObj->id_agenda; ?>" class="btn btn-warning btn-xs">Ubah Lampiran</a>
                <?php else: ?>
                  <input type="file" name="lampiran" id="lampiran" class="form-control">
                <?php endif; ?>
                <span class="help-block text-red">*) Optional</span>
            </div>
            <div class="btn-group">
              <?php if($altObj->lampiran  != NULL): ?>
                <button type="submit" class="btn btn-dark" name="submit2">Ubah</button>
              <?php else: ?>
                <button type="submit" class="btn btn-dark" name="submit">Ubah</button>
              <?php endif; ?>
              <button type="button" onclick="location.href = 'agenda.php'" class="btn btn-default">Kembali</button>
            </div>
          </form>
        </div>
      </div>
  </div>
</div>

<?php include_once('includes/footer.inc.php'); ?>
