<?php
include_once('includes/header.inc.php');
include_once('includes/pengumuman.inc.php');
$pro = new pengumuman($db);
$stmt = $pro->readAll();
$count = $pro->countAll();

if (isset($_POST['hapus-contengan'])) {
    $imp = "('".implode("','", array_values($_POST['checkbox']))."')";
    $result = $pro->hapusell($imp);
    if ($result) { ?>
        <script type="text/javascript">
          window.onload=function(){
              showSuccessToast();
              setTimeout(function(){
                  window.location.reload(1);
                  history.go(0)
                  location.href = location.href
              }, 5000);
          };
        </script> <?php
    } else { ?>
        <script type="text/javascript">
          window.onload=function(){
              showErrorToast();
              setTimeout(function(){
                  window.location.reload(1);
                  history.go(0)
                  location.href = location.href
              }, 5000);
          };
        </script> <?php
    }
}
?>

<div class="row">
	<div class="col-xs-13 col-sm-13 col-md-12">
  	<ol class="breadcrumb">
  	  <li><a href="index.php">Beranda</a></li>
  	  <li class="active">Pengumuman</li>
  	</ol>
    <form method="post">
    	<div class="row">
    		<div class="col-md-6 text-left">
    			<strong style="font-size:18pt;"><span class="fa fa-book"></span>Pengumuman</strong>
    		</div>
    		<div class="col-md-6 text-right">
          <div class="btn-group">
            <button type="submit" name="hapus-contengan" class="btn btn-danger"><span class="fa fa-close"></span> Hapus Contengan</button>
      			<button type="button" onclick="location.href='pengumuman-baru.php'" class="btn btn-primary"><span class="fa fa-clone"></span> Tambah Pengumuman</button>
          </div>
    		</div>
    	</div>
    	<br/>

  	<table width="100%" class="table table-striped table-bordered" id="tabeldata">
      <thead>
        <tr>
          <th width="10px"><input type="checkbox" name="select-all" id="select-all" /></th>
          <th>Id Pengumuman</th>
          <th>Judul Pengumuman</th>
          <th>Tanggal Pengumuman</th>
          <th>Isi Pengumuman</th>
          <th>Lampiran</th>
          <th width="100px">Aksi</th>
        </tr>
      </thead>
        <tfoot>
          <tr>
            <th><input type="checkbox" name="select-all2" id="select-all2" /></th>
            <th>Id Pengumuman</th>
            <th>Judul Pengumuman</th>
            <th>Tanggal Pengumuman</th>
            <th>Isi Pengumuman</th>
            <th>Lampiran</th>
            <th>Aksi</th>
          </tr>
        </tfoot>
        <tbody>
          <?php $no=1; while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) : ?>
            <tr>
              <td><input type="checkbox" value="<?=$row['id_pengumuman']?>" name="checkbox[]" /></td>
              <td><?=$row['id_pengumuman'] ?></td>
              <td><?=$row['judul_pengumuman'] ?></td>
              <td><?=$row['tgl_pengumuman'] ?></td>
              <td><?=$row['isi_pengumuman'] ?></td>
              <?php if ($row['lampiran'] != NULL): ?>
              <td><a href="file/pengumuman/lampiran/<?=$row['lampiran'] ?>"><?=$row['lampiran']?></a></td>
              <?php else: ?>
              <td>Tidak Ada</td>
              <?php endif; ?>
              <td class="text-center">
            		<a href="pengumuman-ubah.php?id=<?=$row['id_pengumuman']?>" class="btn btn-warning btn-xs"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
            		<a href="pengumuman-hapus.php?id=<?=$row['id_pengumuman']?>" onclick="return confirm('Yakin ingin menghapus data')" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
              </td>
            </tr>
          <?php endwhile; ?>
        </tbody>
      </table>
    </form>
  </div>
</div>

<?php include_once('includes/footer.inc.php'); ?>
