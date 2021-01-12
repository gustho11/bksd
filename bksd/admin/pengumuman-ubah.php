<?php
include_once('includes/header.inc.php');

$id_pengumuman = isset($_GET['id']) ? $_GET['id'] : die('ERROR: missing ID.');

include_once('includes/pengumuman.inc.php');

$altObj = new pengumuman($db);
$altObj->id_pengumuman = $id_pengumuman;
$altObj->readOne();

if(isset($_POST['submit'])){
    $altObj->id_pengumuman = $_POST["id_pengumuman"];
	$altObj->judul_pengumuman = $_POST["judul_pengumuman"];
	$altObj->tgl_pengumuman = $_POST["tgl_pengumuman"];
	$altObj->isi_pengumuman = $_POST["isi_pengumuman"];
	$altObj->lampiran = $_FILES["lampiran"]["name"];

	move_uploaded_file($_FILES["lampiran"]["tmp_name"],"file/pengumuman/lampiran/".$_FILES["lampiran"]["name"]);
    
    if ($altObj->update()) {
        echo "<script>location.href='pengumuman.php'</script>";
    } else { ?>
      <script type="text/javascript">
        window.onload = function () {
          showStickyErrorToast();
        };
      </script> <?php
    }
}

if(isset($_POST['submit2'])){
  $altObj->id_pengumuman = $_POST["id_pengumuman"];
$altObj->judul_pengumuman = $_POST["judul_pengumuman"];
$altObj->tgl_pengumuman = $_POST["tgl_pengumuman"];
$altObj->isi_pengumuman = $_POST["isi_pengumuman"];
  
  if ($altObj->update()) {
      echo "<script>location.href='pengumuman.php'</script>";
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
      <li><a href="pengumuman.php">Pengumuman</a></li>
      <li class="active">Ubah Pengumuman</li>
    </ol>
    <p style="margin-bottom:10px;">
      <strong style="font-size:18pt;"><span class="fa fa-pencil"></span> Ubah Pengumuman</strong>
    </p>
      <div class="panel panel-default">
        <div class="panel-body">
          <form method="POST" id="form" enctype="multipart/form-data">
            <div class="form-group">
                <label for="id_pengumuman">Id Pengumuman</label>
                <input type="text" name="id_pengumuman" id="id_pengumuman" class="form-control" readonly="on" value="<?php echo $altObj->id_pengumuman; ?>">
            </div>
            <div class="form-group">
                <label for="judul_pengumuman">Judul Pengumuman</label>
                <input type="text" name="judul_pengumuman" id="judul_pengumuman" class="form-control" autofocus="on" required="on" value="<?php echo $altObj->judul_pengumuman; ?>" minlength="3">
            </div>
            <div class="form-group">
                <label for="tgl_pengumuman">Tanggal Pengumuman</label>
                <input type="text" name="tgl_pengumuman" id="tgl_pengumuman" class="form-control datepicker" value="<?php echo $altObj->tgl_pengumuman; ?>" minlength="3" required="on">
            </div>
            <div class="form-group">
                <label for="isi_pengumuman">Isi Pengumuman</label>
                <textarea id="isi_pengumuman" name="isi_pengumuman" rows="4" class="form-control" minlength="10" required="on"><?php echo $altObj->isi_pengumuman; ?></textarea>
            </div>
            <div class="form-group">
                <label for="lampiran">Lampiran</label><br/>
                <?php if($altObj->lampiran  != NULL): ?>
                  <a href="file/pengumuman/lampiran/<?php echo $altObj->lampiran; ?>"><?php echo $altObj->lampiran; ?></a><br/><br/>
                  <a href="pengumuman-lampiran-ubah.php?id=<?php echo $altObj->id_pengumuman; ?>" class="btn btn-warning btn-xs">Ubah Lampiran</a>
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
              <button type="button" onclick="location.href = 'pengumuman.php'" class="btn btn-default">Kembali</button>
            </div>
          </form>
        </div>
      </div>
  </div>
</div>

<?php include_once('includes/footer.inc.php'); ?>
