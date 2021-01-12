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

if(isset($_POST['submit2'])){
    $altObj->id_kerja_sama = $_POST["id_kerja_sama"];
	$altObj->nama_mitra = $_POST["nama_mitra"];
    $altObj->bidang = $_POST["bidang"];
	$altObj->kategori = $_POST["kategori"];
    $altObj->tahun = $_POST["tahun"];
    
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
      <li class="active">Ubah Kerja Sama</li>
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
                <input type="text" name="nama_mitra" id="nama_mitra" class="form-control"required="on" value="<?php echo $altObj->nama_mitra; ?>" minlength="2">
            </div>
            <div class="form-group">
                <label for="bidang">Bidang</label>
                <input type="text" name="bidang" id="bidang" class="form-control" value="<?php echo $altObj->bidang; ?>" minlength="3" required="on">
            </div>
            <div class="form-group">
                <label for="kategori">Kategori</label>
                <select class="form-control" name="kategori" required="on">
                    <option value="<?php echo $altObj->kategori; ?>"><?php echo $altObj->kategori; ?></option>
                    <option value="Antar Daerah">Antar Daerah</option>
                    <option value="Pihak Ketiga">Pihak Ketiga</option>
                    <option value="Sinergi">Sinergi</option>
                    <option value="Luar Negeri">Luar Negeri</option>
                </select>
            </div>
            <div class="form-group">
                <label for="tahun">Tahun</label>
                <select class="form-control" name="tahun"  required="on">
                    <option value="<?php echo $altObj->tahun; ?>"><?php echo $altObj->tahun; ?></option>
                    <option value="2017">2017</option>
                    <option value="2018">2018</option>
                    <option value="2019">2019</option>
                    <option value="2020">2020</option>
                    <option value="2021">2021</option>
                </select>
			</div>
            <div class="form-group">
                <label for="lampiran">Lampiran</label><br/>
                <?php if($altObj->lampiran  != NULL): ?>
                  <a href="file/kerja-sama/lampiran/<?php echo $altObj->lampiran; ?>"><?php echo $altObj->lampiran; ?></a><br/><br/>
                  <a href="kerja-sama-lampiran-ubah.php?id=<?php echo $altObj->id_kerja_sama; ?>" class="btn btn-warning btn-xs">Ubah Lampiran</a>
                <?php else: ?>
                  <input type="file" name="lampiran" id="lampiran" class="form-control">
                <?php endif; ?>
                <span class="help-block text-red">*) Optional</span>
            </div>
              <?php if($altObj->lampiran  != NULL): ?>
                <button type="submit" class="btn btn-dark" name="submit2">Ubah</button>
              <?php else: ?>
                <button type="submit" class="btn btn-dark" name="submit">Ubah</button>
              <?php endif; ?>
              <button type="button" onclick="location.href = 'kerja-sama.php'" class="btn btn-default">Kembali</button>

          </form>
        </div>
      </div>
  </div>
</div>

<?php include_once('includes/footer.inc.php'); ?>
