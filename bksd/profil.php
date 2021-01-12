<?php
    include_once('includes/header.php');
?>
<div class="home-intro" style="background: url('assets/img/kantor-bupati.jpeg');background-size:100%;background-repeat: no-repeat;background-position: bottom;margin-bottom: 5%;">
    <div class="container">
        <div class="row" >
            <div class="col-md-8">
                <div class="row">
                    <ol class="breadcrumb">
                    <li><b><a href="index.php" style="color: black;">Beranda</a></b></li>
                    <li class="active">Profil</li>
                    </ol>
                    <hr>
                    <div class="tabs" style="margin-bottom: 10%;">
                        <div class="tab-content">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a href="visimisi.php" style="color: black;">
                                        <i class="fas fa-info"></i>
                                        <strong>Visi Misi</strong>
                                    </a>
                                </h4>
                            </div>
                            <div class="panel-heading" >
                                <h4 class="panel-title">
                                    <a href="struktur.php" style="color: black;">
                                        <i class="fas fa-info"></i>
                                        <strong>Struktur Organisasi</strong>
                                    </a>
                                </h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php include "includes/side-page.php"; ?>
        </div>
    </div>
</div>
<?php
    include_once('includes/footer.php');
?>