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
    $altObj->tampilan = $_FILES["tampilan"]["name"];
    $altObj->isi_berita = $_POST["isi_berita"];
    $altObj->lampiran = $_FILES["lampiran"]["name"];

    move_uploaded_file($_FILES["tampilan"]["tmp_name"],"file/berita/tampilan/".$_FILES["tampilan"]["name"]);
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
if(isset($_POST['submit2'])){
  $altObj->id_berita = $_POST["id_berita"];
  $altObj->judul_berita = $_POST["judul_berita"];
  $altObj->tgl_berita = $_POST["tgl_berita"];
  $altObj->isi_berita = $_POST["isi_berita"];
  
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
if(isset($_POST['submit3'])){
  $altObj->id_berita = $_POST["id_berita"];
  $altObj->judul_berita = $_POST["judul_berita"];
  $altObj->tgl_berita = $_POST["tgl_berita"];
  $altObj->tampilan = $_FILES["tampilan"]["name"];
  $altObj->isi_berita = $_POST["isi_berita"];

  move_uploaded_file($_FILES["tampilan"]["tmp_name"],"file/berita/tampilan/".$_FILES["tampilan"]["name"]);
  
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
if(isset($_POST['submit4'])){
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
      <li class="active">Ubah Berita</li>
    </ol>
    <p style="margin-bottom:10px;">
      <strong style="font-size:18pt;"><span class="fa fa-pencil"></span> Ubah Berita</strong>
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
                <input type="text" name="judul_berita" id="judul_berita" class="form-control" autofocus="on" required="on" value="<?php echo $altObj->judul_berita; ?>" minlength="3">
            </div>
            <div class="form-group">
                <label for="tgl_berita">Tanggal Berita</label>
                <input type="text" name="tgl_berita" id="tgl_berita" class="form-control datepicker" value="<?php echo $altObj->tgl_berita; ?>" minlength="3" required="on">
            </div>
            <div class="form-group">
                <label for="tampilan">Tampilan</label><br/>
                <?php if($altObj->tampilan  != NULL): ?>
                  <img src="file/berita/tampilan/<?php echo $altObj->tampilan; ?>" width="100" height="100"><br/><br/>
                  <a href="berita-tampilan-ubah.php?id=<?php echo $altObj->id_berita; ?>" class="btn btn-warning btn-xs">Ubah Tampilan</a>
                <?php else: ?>
                  <input type="file" name="tampilan" id="tampilan" class="form-control" required="on">
                <?php endif; ?>
            </div>
            <div class="form-group">
                <label for="isi_berita">Isi Berita</label>
                <textarea id="isi_berita ckedtor" name="isi_berita" rows="4" class="form-control ckeditor" minlength="10" required="on"><?php echo $altObj->isi_berita; ?></textarea>
            </div>
            <div class="form-group">
                <label for="lampiran">Lampiran</label><br/>
                <?php if($altObj->lampiran  != NULL): ?>
                  <a href="file/berita/lampiran/<?php echo $altObj->lampiran; ?>"><?php echo $altObj->lampiran; ?></a><br/><br/>
                  <a href="berita-lampiran-ubah.php?id=<?php echo $altObj->id_berita; ?>" class="btn btn-warning btn-xs">Ubah Lampiran</a>
                <?php else: ?>
                  <input type="file" name="lampiran" id="lampiran" class="form-control">
                <?php endif; ?>
                <span class="help-block text-red">*) Optional</span>
            </div>
            <div class="btn-group">
            <?php if($altObj->tampilan  == NULL && $altObj->lampiran  == NULL): ?>
              <button type="submit" class="btn btn-dark" name="submit">Ubah</button>
            <?php elseif($altObj->tampilan  != NULL && $altObj->lampiran  != NULL): ?>
              <button type="submit" class="btn btn-dark" name="submit2">Ubah</button>
            <?php elseif($altObj->tampilan  == NULL && $altObj->lampiran  != NULL): ?>
              <button type="submit" class="btn btn-dark" name="submit3">Ubah</button>
            <?php elseif($altObj->tampilan  != NULL && $altObj->lampiran  == NULL): ?>
              <button type="submit" class="btn btn-dark" name="submit4">Ubah</button>
            <?php endif; ?>
              <button type="button" onclick="location.href = 'berita.php'" class="btn btn-default">Kembali</button>
            </div>
          </form>
        </div>
      </div>
  </div>
</div>

<?php include_once('includes/footer.inc.php'); ?>
