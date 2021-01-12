<?php
include_once('includes/header.inc.php');

$id_galeri = isset($_GET['id']) ? $_GET['id'] : die('ERROR: missing ID.');

include_once('includes/galeri.inc.php');

$altObj = new galeri($db);
$altObj->id_galeri = $id_galeri;
$altObj->readOne();

if(isset($_POST['submit'])){
    $altObj->id_galeri = $_POST["id_galeri"];
    $altObj->gambar = $_FILES["gambar"]["name"];
    $altObj->keterangan = $_POST["keterangan"];

    move_uploaded_file($_FILES["gambar"]["tmp_name"],"file/galeri/gambar/".$_FILES["gambar"]["name"]);
    
    if ($altObj->update()) {
        echo "<script>location.href='galeri.php'</script>";
    } else { ?>
      <script type="text/javascript">
        window.onload = function () {
          showStickyErrorToast();
        };
      </script> <?php
    }
}

if(isset($_POST['submit2'])){
    $altObj->id_galeri = $_POST["id_galeri"];
    $altObj->keterangan = $_POST["keterangan"];
    
    if ($altObj->update()) {
        echo "<script>location.href='galeri.php'</script>";
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
      <li><a href="galeri.php">Galeri</a></li>
      <li class="active">Ubah Galeri</li>
    </ol>
    <p style="margin-bottom:10px;">
      <strong style="font-size:18pt;"><span class="fa fa-pencil"></span> Ubah Galeri</strong>
    </p>
      <div class="panel panel-default">
        <div class="panel-body">
          <form method="POST" id="form" enctype="multipart/form-data">
            <div class="form-group">
                <label for="id_galeri">Id Galeri</label>
                <input type="text" name="id_galeri" id="id_galeri" class="form-control" readonly="on" value="<?php echo $altObj->id_galeri; ?>">
            </div>
            <div class="form-group">
                <label for="gambar">Gambar</label><br/>
                <?php if($altObj->gambar  != NULL): ?>
                  <img src="file/galeri/gambar/<?php echo $altObj->gambar; ?>" width="100" height="100"><br/><br/>
                  <a href="galeri-gambar-ubah.php?id=<?php echo $altObj->id_galeri; ?>" class="btn btn-warning btn-xs">Ubah gambar</a>
                <?php else: ?>
                  <input type="file" name="gambar" id="gambar" class="form-control" required="on">
                <?php endif; ?>
            </div>
            <div class="form-group">
                <label for="keterangan">Keterangan</label>
                <input type="text" name="keterangan" id="keterangan" class="form-control" required="on" value="<?php echo $altObj->keterangan; ?>">
            </div>
            <div class="btn-group">
              <?php if($altObj->gambar  != NULL): ?>
                <button type="submit" class="btn btn-dark" name="submit2">Ubah</button>
              <?php else: ?>
                <button type="submit" class="btn btn-dark" name="submit">Ubah</button>
              <?php endif; ?>
              <button type="button" onclick="location.href = 'galeri.php'" class="btn btn-default">Kembali</button>
            </div>
          </form>
        </div>
      </div>
  </div>
</div>

<?php include_once('includes/footer.inc.php'); ?>
