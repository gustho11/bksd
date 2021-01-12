<?php
include_once('includes/header.inc.php');

$id_luar_negeri = isset($_GET['id']) ? $_GET['id'] : die('ERROR: missing ID.');

include_once('includes/luar-negeri.inc.php');

$altObj = new luar_negeri($db);
$altObj->id_luar_negeri = $id_luar_negeri;
$altObj->readOne();

if(isset($_POST['submit'])){
    $altObj->id_luar_negeri = $_POST["id_luar_negeri"];
	$altObj->nama_mitra = $_POST["nama_mitra"];
	$altObj->deskripsi = $_POST["deskripsi"];
    $altObj->bidang = $_POST["bidang"];
    $altObj->tahun = $_POST["tahun"];
    
    if ($altObj->update()) {
        echo "<script>location.href='luar-negeri.php'</script>";
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
      <li><a href="#">Mitra</a></li>
      <li><a href="luar-negeri.php">Luar Negeri</a></li>
      <li class="active">Ubah Luar Negeri</li>
    </ol>
    <p style="margin-bottom:10px;">
      <strong style="font-size:18pt;"><span class="fa fa-pencil"></span> Ubah luar Negeri</strong>
    </p>
      <div class="panel panel-default">
        <div class="panel-body">
          <form method="POST" id="form" enctype="multipart/form-data">
            <div class="form-group">
                <label for="id_luar_negeri">Id Luar Negeri</label>
                <input type="text" name="id_luar_negeri" id="id_luar_negeri" class="form-control" readonly="on" value="<?php echo $altObj->id_luar_negeri; ?>">
            </div>
            <div class="form-group">
                <label for="nama_mitra">Nama Mitra</label>
                <input type="text" name="nama_mitra" id="nama_mitra" class="form-control"required="on" value="<?php echo $altObj->nama_mitra; ?>" minlength="2">
            </div>
            <div class="form-group">
                <label for="deskripsi">Deskripsi</label>
                <textarea id="deskripsi" name="deskripsi" rows="4" class="form-control ckeditor" minlength="10" required="on"><?php echo $altObj->deskripsi; ?></textarea>
            </div>
            <div class="form-group">
                <label for="bidang">Bidang</label>
                <input type="text" name="bidang" id="bidang" class="form-control" value="<?php echo $altObj->bidang; ?>" minlength="3" required="on">
            </div>
            <div class="form-group">
                <label for="tahun">Tahun</label>
                <input type="text" name="tahun" id="tahun" class="form-control" value="<?php echo $altObj->tahun; ?>" minlength="3" required="on">
            </div>
              <button type="submit" class="btn btn-dark" name="submit">Ubah</button>
              <button type="button" onclick="location.href = 'luar-negeri.php'" class="btn btn-default">Kembali</button>

          </form>
        </div>
      </div>
  </div>
</div>

<?php include_once('includes/footer.inc.php'); ?>
