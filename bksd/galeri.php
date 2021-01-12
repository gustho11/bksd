<?php
    include_once('includes/header.php');
    include_once('includes/galeri.inc.php');
    $pro = new galeri($db);
    $conn = $db;
    $count = $pro->countAll();

    $batas = 12;
    $halaman = isset($_GET['halaman'])? $_GET['halaman'] : 1;
    $halaman_awal = ($halaman>1) ? ($halaman * $batas) - $batas : 0;	
    
    $previous = $halaman - 1;
    $next = $halaman + 1;

    $jumlah_halaman = ceil($count / $batas);

    $query = "SELECT * FROM galeri ORDER BY id_galeri DESC LIMIT $halaman_awal, $batas";
    $stmt = $conn->prepare($query);
    $stmt->execute();
    
    $nomor = $halaman_awal+1;
?>
    <div class="home-intro" style="background: url('assets/img/kantor-bupati.jpeg');background-size:100%;background-repeat: no-repeat;background-position: bottom;margin-bottom: 5%;">
        <div class="container">
            <div class="row" >
                <div class="col-md-8">
                    <ol class="breadcrumb">
                    <li><b><a href="index.php" style="color: black;">Beranda</a></b></li>
                    <li class="active">Galeri</li>
                    </ol>
                    <hr>
                    <div class="tabs" style="margin-bottom: 10%;">
                        <div class="tab-content">
							<div class="row" style="margin-bottom: 3%;">
                            <center>
                                <?php while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) : ?>
                                <div class="col col-md-4">
                                    <a class="img-thumbnail lightbox pull-left" href="admin/file/galeri/gambar/<?=$row['gambar'];?>" data-plugin-options="{&quot;type&quot;:&quot;image&quot;}">
                                        <img class="img-responsive" width="215" src="admin/file/galeri/gambar/<?=$row['gambar'];?> "style="150px; height: 150px;">
                                        <center>
                                            <b style="color: black;"><?=$row['keterangan']?> </b><br>
                                        </center>
                                    </a>	
                                </div>
                                <?php endwhile; ?>
                            </center>
							</div>
		                </div>
                            <nav class="mb-5" align="right">
                                <ul class="pagination justify-content-end">
                                    <?php
                                    $jumlah_number = 1; //jumlah halaman ke kanan dan kiri dari halaman yang aktif
                                    $start_number = ($halaman > $jumlah_number)? $halaman - $jumlah_number : 1;
                                    $end_number = ($halaman < ($jumlah_halaman - $jumlah_number))? $halaman + $jumlah_number : $jumlah_halaman;
                                    
                                    if($halaman == 1){
                                        echo '<li class="page-item disabled"><a class="page-link" href="#">First</a></li>';
                                        echo '<li class="page-item disabled"><a class="page-link" href="#"><span aria-hidden="true">&laquo;</span></a></li>';
                                    } else {
                                        $link_prev = ($halaman > 1)? $halaman - 1 : 1;
                                        echo '<li class="page-item"><a class="page-link" href="?halaman=1">First</a></li>';
                                        echo '<li class="page-item"><a class="page-link" href="?halaman='.$link_prev.'" aria-label="Previous"><span aria-hidden="true">&laquo;</span></a></li>';
                                    }
                                
                                    for($i = $start_number; $i <= $end_number; $i++){
                                        $link_active = ($halaman == $i)? ' active' : '';
                                        echo '<li class="page-item '.$link_active.'"><a class="page-link" href="?halaman='.$i.'">'.$i.'</a></li>';
                                    }
                                
                                    if($halaman == $jumlah_halaman){
                                        echo '<li class="page-item disabled"><a class="page-link" href="#"><span aria-hidden="true">&raquo;</span></a></li>';
                                        echo '<li class="page-item disabled"><a class="page-link" href="#">Last</a></li>';
                                    } else {
                                        $link_next = ($halaman < $jumlah_halaman)? $halaman + 1 : $jumlah_halaman;
                                        echo '<li class="page-item"><a class="page-link" href="?halaman='.$link_next.'" aria-label="Next"><span aria-hidden="true">&raquo;</span></a></li>';
                                        echo '<li class="page-item"><a class="page-link" href="?halaman='.$jumlah_halaman.'">Last</a></li>';
                                    }
                                    ?>
                                </ul>
                            </nav>
                    </div>
                </div>
                <?php include "includes/side-page.php"; ?>
            </div>
        </div>
    </div>
</div>
<?php
include_once('includes/footer.php');
?>