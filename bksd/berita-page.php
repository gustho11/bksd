<?php
    include_once('includes/header.php');

    $id_berita = isset($_GET['id']) ? $_GET['id'] : die('ERROR: missing ID.');
    
    include_once('includes/berita.inc.php');
    
    $altObj = new berita($db);
    $altObj->id_berita = $id_berita;
    $altObj->readOne();

?>
<div class="home-intro" style="background: url('assets/img/kantor-bupati.jpeg');background-size:100%;background-repeat: no-repeat;background-position: bottom;margin-bottom: 5%;">
    <div class="container">
        <div class="row" >
            <div class="col-md-8">
                <div class="row">
                    <ol class="breadcrumb">
                    <li><b><a href="index.php" style="color: black;">Beranda</a></b></li>
                    <li><b><a href="berita.php" style="color: black;">Berita</a></b></li>
                    <li class="active">Detail Berita</li>
                    </ol>
                    <hr>
                    <div class="tabs" style="margin-bottom: 10%;">
                        <div class="tab-content">
                            <div class="media" data-sr="wait 300ms enter bottom move 500px opacity 0">
                                <div class="row">
                                    <div class="col col-md-12">
                                        <h4><b href="#" style="color: #0088cc;"><?php echo $altObj->judul_berita ?></b></h4>
                                        <div class="meta">
                                            <span><i class="fa fa-user"></i> Admin</span><br>
                                            <span><i class="fa fa-calendar"></i> <?php echo $altObj->tgl_berita ?></span>
                                        </div>
                                        <center>
                                            <br>
                                                <div>
                                                    <img src="admin/file/berita/tampilan/<?php echo $altObj->tampilan ?>" style="max-height: 500px;" width="70%">
                                                </div>
                                            <hr>
                                        </center>
                                        <?php if($altObj->lampiran != NULL) { ?>
                                        <p>Lampiran : <a href="admin/file/berita/lampiran/<?php echo $altObj->lampiran ?>"><?php echo $altObj->lampiran ?></a> </p>
                                        <?php } ?>
                                    </div>
                                    <div class="col col-md-12">
                                        <div class="media-body">
                                            <p>
                                            <?php echo $altObj->isi_berita ?>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <nav class="mb-5" align="right">
                                <ul class="pagination justify-content-end">
                                    <li class="page-item" ><a class="page-link"  style="color:#0088cc" href="berita.php">Berita Lainnya...</a></li>
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