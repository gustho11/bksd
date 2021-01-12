<?php
    include_once('includes/header.php');

    $id_pengumuman = isset($_GET['id']) ? $_GET['id'] : die('ERROR: missing ID.');
    
    include_once('includes/pengumuman.inc.php');
    
    $altObj = new pengumuman($db);
    $altObj->id_pengumuman = $id_pengumuman;
    $altObj->readOne();

?>
<div class="home-intro" style="background: url('assets/img/kantor-bupati.jpeg');background-size:100%;background-repeat: no-repeat;background-position: bottom;margin-bottom: 5%;">
    <div class="container">
        <div class="row" >
            <div class="col-md-8">
                <div class="row">
                    <ol class="breadcrumb">
                    <li><b><a href="index.php" style="color: black;">Beranda</a></b></li>
                    <li><b><a href="pengumuman.php" style="color: black;">Pengumuman</a></b></li>
                    <li class="active">Detail Pengumuman</li>
                    </ol>
                    <hr>
                    <div class="tabs" style="margin-bottom: 10%;">
                        <div class="tab-content">
                            <div class="media" data-sr="wait 300ms enter bottom move 500px opacity 0">
                                <div class="row">
                                    <div class="col col-md-12">
                                        <h4><b href="#" style="color: #0088cc;"><?php echo $altObj->judul_pengumuman ?></b></h4>
                                        <div class="meta">
                                            <span><i class="fa fa-user"></i> Admin</span><br>
                                            <span><i class="fa fa-calendar"></i> <?php echo $altObj->tgl_pengumuman ?></span>
                                        </div>
                                        <?php if($altObj->lampiran != NULL) { ?>
                                        <p>Lampiran : <a href="admin/file/pengumuman/lampiran/<?php echo $altObj->lampiran ?>"><?php echo $altObj->lampiran ?></a> </p>
                                        <?php } ?>
                                    </div>
                                    <div class="col col-md-12">
                                        <div class="media-body">
                                            <p>
                                            <?php echo $altObj->isi_pengumuman ?>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <nav class="mb-5" align="right">
                                <ul class="pagination justify-content-end">
                                    <li class="page-item" ><a class="page-link"  style="color:#0088cc" href="pengumuman.php">Pengumuman Lainnya...</a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <?php include "includes/side-page.php";?>
        </div>
    </div>
</div>
<?php
    include_once('includes/footer.php');
?>