<?php
include_once('includes/header.inc.php');

$id_berita = isset($_GET['id']) ? $_GET['id'] : die('ERROR: missing ID.');

include_once('includes/berita.inc.php');

$altObj = new berita($db);
$altObj->id_berita = $id_berita;
$altObj->readOne();

if(isset($_POST['submit'])){
  $altObj->id_berita = $_POST["id_berita"];
  $altObj->judul_berita = $_POST["judul_berita"];
  $altObj->tgl_berita = $_POST["tgl_berita"];
  $altObj->isi_berita = $_POST["isi_berita"];
  $altObj->lampiran = $_FILES["lampiran"]["name"];

  move_uploaded_file($_FILES["lampiran"]["tmp_name"],"file/berita/lampiran/".$_FILES["lampiran"]["name"]);
  
  if ($altObj->update()) {
      echo "<script>location.href='berita.php'</script>";
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
      <li><a href="berita.php">Berita</a></li>
      <li><a href="berita-ubah.php?id=<?php echo $altObj->id_berita; ?>">Ubah Berita</a></li>
      <li class="active">Ubah Lampiran</li>
    </ol>
    <p style="margin-bottom:10px;">
      <strong style="font-size:18pt;"><span class="fa fa-pencil"></span> Ubah Lampiran</strong>
    </p>
      <div class="panel panel-default">
        <div class="panel-body">
          <form method="POST" id="form" enctype="multipart/form-data">
            <div class="form-group">
                <label for="id_berita">Id Berita</label>
                <input type="text" name="id_berita" id="id_berita" class="form-control" readonly="on" value="<?php echo $altObj->id_berita; ?>">
            </div>
            <div class="form-group">
                <label for="judul_berita">Judul Berita</label>
                <input type="text" name="judul_berita" id="judul_berita" class="form-control" readonly="on" required="on" value="<?php echo $altObj->judul_berita; ?>" minlength="3">
            </div>
            <div class="form-group">
                <label for="tgl_berita">Tanggal Berita</label>
                <input type="text" name="tgl_berita" id="tgl_berita" readonly="on" class="form-control" value="<?php echo $altObj->tgl_berita; ?>" minlength="3" required="on">
            </div>
            <div class="form-group">
                <label for="tampilan">Tampilan</label><br/>
                <?php if($altObj->tampilan  != NULL): ?>
                <img src="file/berita/tampilan/<?php echo $altObj->tampilan; ?>" width="100" height="100"><br/><br/>
                <?php else: ?>
                <p>Tidak Ada</p>
                <?php endif; ?>
            </div>
            <div class="form-group">
                <label for="isi_berita">Isi Berita</label>
                <textarea id="isi_berita" name="isi_berita" rows="4" class="form-control" minlength="10" readonly="on" required="on"><?php echo $altObj->isi_berita; ?></textarea>
            </div>
            <div class="form-group">
                <label for="lampiran">Lampiran</label><br/>
                  <a href="file/berita/lampiran/<?php echo $altObj->lampiran; ?>"><?php echo $altObj->lampiran; ?></a><br/><br/>
                  <input type="file" name="lampiran" id="lampiran" class="form-control" minlength="5">
                <span class="help-block text-red">*) Optional</span>
            </div>
            <div class="btn-group">
              <button type="submit" class="btn btn-dark" name="submit">Ubah</button>
              <button type="button" onclick="location.href = 'berita-ubah.php?id=<?php echo $altObj->id_berita; ?>'" class="btn btn-default">Kembali</button>
            </div>
          </form>
        </div>
      </div>
  </div>
</div>

<?php include_once('includes/footer.inc.php'); ?>
