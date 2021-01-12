<?php
include_once('includes/header.inc.php');

$id_kerja_sama = isset($_GET['id']) ? $_GET['id'] : die('ERROR: missing ID.');

include_once('includes/kerja-sama.inc.php');

$altObj = new kerja_sama($db);
$altObj->id_kerja_sama = $id_kerja_sama;
$altObj->readOne();

if(isset($_POST['submit'])){
    $altObj->id_kerja_sama = $_POST["id_kerja_sama"];
	$altObj->nama_mitra = $_POST["nama_mitra"];
    $altObj->bidang = $_POST["bidang"];
	$altObj->kategori = $_POST["kategori"];
    $altObj->tahun = $_POST["tahun"];
    $altObj->lampiran = $_FILES["lampiran"]["name"];

	move_uploaded_file($_FILES["lampiran"]["tmp_name"],"file/agenda/lampiran/".$_FILES["lampiran"]["name"]);
    
    if ($altObj->update()) {
        echo "<script>location.href='kerja-sama.php'</script>";
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
      <li><a href="kerja-sama.php">Kerja Sama</a></li>
      <li><a href="kerja-sama-ubah.php?id=<?php echo $altObj->id_kerja_sama; ?>">Ubah Kerja Sama</a></li>
      <li class="active">Edit Kerja Sama</li>
    </ol>
    <p style="margin-bottom:10px;">
      <strong style="font-size:18pt;"><span class="fa fa-pencil"></span> Ubah Kerja Sama</strong>
    </p>
      <div class="panel panel-default">
        <div class="panel-body">
          <form method="POST" id="form" enctype="multipart/form-data">
            <div class="form-group">
                <label for="id_kerja_sama">Id Kerja Sama</label>
                <input type="text" name="id_kerja_sama" id="id_kerja_sama" class="form-control" readonly="on" value="<?php echo $altObj->id_kerja_sama; ?>">
            </div>
            <div class="form-group">
                <label for="nama_mitra">Nama Mitra</label>
                <input type="text" name="nama_mitra" id="nama_mitra" class="form-control" required="on" readonly="on" value="<?php echo $altObj->nama_mitra; ?>" minlength="2">
            </div>
            <div class="form-group">
                <label for="bidang">Bidang</label>
                <input type="text" name="bidang" id="bidang" class="form-control" readonly="on" value="<?php echo $altObj->bidang; ?>" minlength="3" required="on">
            </div>
            <div class="form-group">
                <label for="kategori">Kategori</label>
                <select class="form-control" name="kategori" required="on" readonly="on">
                    <option value="<?php echo $altObj->kategori; ?>"><?php echo $altObj->kategori; ?></option>
                </select>
            </div>
            <div class="form-group">
                <label for="tahun">Tahun</label>
                <select class="form-control" name="tahun"  required="on" readonly="on">
                    <option value="<?php echo $altObj->tahun; ?>"><?php echo $altObj->tahun; ?></option>
                </select>
			</div>
            <div class="form-group">
                <label for="lampiran">Lampiran</label><br/>
                  <a href="file/kerja-sama/lampiran/<?php echo $altObj->lampiran; ?>"><?php echo $altObj->lampiran; ?></a><br/><br/>
                  <input type="file" name="lampiran" id="lampiran" class="form-control">
                <span class="help-block text-red">*) Biarkan Kosong untuk hapus lampiran</span>
            </div>
                <button type="submit" class="btn btn-dark" name="submit">Ubah</button>
              <button type="button" onclick="location.href = 'kerja-sama.php'" class="btn btn-default">Kembali</button>

          </form>
        </div>
      </div>
  </div>
</div>

<?php include_once('includes/footer.inc.php'); ?>
