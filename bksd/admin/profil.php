<?php
include_once('includes/header.inc.php');

include_once('includes/user.inc.php');
$eks = new User($db);
$eks->id_admin = $_SESSION['id_admin'];
$eks->readOne();

if($_POST){
  $eks->nama_lengkap = $_POST['nama_lengkap'];
  $eks->username = $_POST['username'];
  $eks->password = md5($_POST['password']);
  if($eks->update()){ ?>
    <script type="text/javascript">
      window.onload=function(){
        showStickySuccessToast();
      };
    </script> <?php
  } else { ?>
    <script type="text/javascript">
      window.onload=function(){
        showStickyErrorToast();
      };
    </script> <?php
  }
}
?>

<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12">
  	<ol class="breadcrumb">
  	  <li><a href="index.php"><span class="fa fa-home"></span> Beranda</a></li>
  	  <li class="active"><span class="fa fa-user"></span> Profil</li>
  	</ol>
  	<p style="margin-bottom:10px;">
  		<strong style="font-size:18pt;"><span class="fa fa-pencil"></span> Ubah Profil</strong>
  	</p>
    <form method="post">
      <div class="form-group">
        <label for="nama_lengkap">Nama Lengkap</label>
        <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" value="<?php echo $eks->nama_lengkap; ?>" required>
      </div>
      <div class="form-group">
        <label for="username">Username</label>
        <input type="text" class="form-control" id="username" name="username" value="<?php echo $eks->username; ?>" required>
      </div>
      <div class="form-group">
        <label for="password">Password</label>
        <input type="password" class="form-control" id="password" name="password" value="<?php echo $eks->password; ?>" required>
        <span class="help-block text-red">*) Ubah jika ingin di ganti</span>
      </div>
      <button type="submit" class="btn btn-primary"><span class="fa fa-edit"></span> Ubah</button>
    </form>

  </div>
</div>

<?php include_once('includes/footer.inc.php'); ?>
