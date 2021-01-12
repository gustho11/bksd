<?php
    include_once('includes/header.php');
    include_once('includes/agenda.inc.php');
    $pro = new agenda($db);
    $conn = $db;
    $count = $pro->countAll();

    $batas = 10;
    $halaman = isset($_GET['halaman'])? $_GET['halaman'] : 1;
    $halaman_awal = ($halaman>1) ? ($halaman * $batas) - $batas : 0;	
    
    $previous = $halaman - 1;
    $next = $halaman + 1;

    $jumlah_halaman = ceil($count / $batas);

    $query = "SELECT * FROM agenda ORDER BY id_agenda DESC LIMIT $halaman_awal, $batas";
    $stmt = $conn->prepare($query);
    $stmt->execute();
    
    $nomor = $halaman_awal+1;
?>
<div class="home-intro" style="background: url('assets/img/kantor-bupati.jpeg');background-size:100%;background-repeat: no-repeat;background-position: bottom;margin-bottom: 5%;">
    <div class="container">
        <div class="row" >
            <div class="col-md-8">
                <div class="row">
                    <ol class="breadcrumb">
                    <li><b><a href="index.php" style="color: black;">Beranda</a></b></li>
                    <li><b><a href="informasi.php" style="color: black;">Informasi</a></b></li>
                    <li class="active">Agenda</li>
                    </ol>
                    <hr>
                    <div class="tabs" style="margin-bottom: 10%;">
                        <div class="tab-content">
                            <?php while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) : ?>			
                            <div class="info" data-sr="wait 300ms enter bottom move 500px opacity 0">
                                <div class="row">
                                    <div class="col col-md-12">
                                        <div class="info-body">
                                            <h4>
                                                <a href="#" style="color: #0088cc;">
                                                    <?=$row['nama_agenda']?>
                                                </a>
                                            </h4>
                                            <div class="meta">
                                                <span> <i class="fa fa-calendar">-</i> <?=$row['tgl_agenda'] ?></span>
                                                <span><i class="fa fa-user">-</i>Admin</span>
                                            </div>
                                            <p>
                                                <?php
                                                    $pecah = explode("</p>", $row['isi_agenda']);
                                                    $excerpt = $pecah[0];
                                                    echo $excerpt
                                                ?>
                                                <a href="agenda-page.php?id=<?=$row['id_agenda'] ?>" class="btn btn-xs btn-primary"> Baca Selengkapnya </a>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php endwhile; ?>
                            
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
                </div>
            </div>
            <?php include "includes/side-page.php"; ?>
        </div>
    </div>
</div>
<?php
include_once('includes/footer.php');
?>