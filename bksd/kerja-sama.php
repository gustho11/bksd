<?php
    include_once('includes/header.php');
    include_once('includes/kerja-sama.inc.php');
    $pro = new kerja_sama($db);
    $conn = $db;
    $count = $pro->countAll();

    $batas = 10;
    $halaman = isset($_GET['halaman'])? $_GET['halaman'] : 1;
    $halaman_awal = ($halaman>1) ? ($halaman * $batas) - $batas : 0;	
    
    $previous = $halaman - 1;
    $next = $halaman + 1;

    $jumlah_halaman = ceil($count / $batas);

    //$query = "SELECT * FROM kerja_sama ORDER BY tahun DESC LIMIT $halaman_awal, $batas";
    //$stmt = $conn->prepare($query);
    //$stmt->execute();
    
    $nomor = $halaman_awal+1;

    if (isset($_POST['submit'])) {
        $thn = ($_POST['tahun']);
        $ktg = ($_POST['kategori']);
       
        if (!empty($thn) && !empty($ktg)) {
         // perintah tampil data berdasarkan periode Tahun dan kategori
         $query = "SELECT * FROM kerja_sama WHERE tahun = '$thn' AND kategori = '$ktg' LIMIT $halaman_awal, $batas";
         $stmt = $conn->prepare($query);
         $stmt->execute();
        } elseif (!empty($thn) && empty($ktg)) {
            // perintah tampil data berdasarkan periode Tahun
            $query = "SELECT * FROM kerja_sama WHERE tahun = '$thn' LIMIT $halaman_awal, $batas";
            $stmt = $conn->prepare($query);
            $stmt->execute();
        } elseif (empty($thn) && !empty($ktg)) {
            // perintah tampil data berdasarkan periode kategori
            $query = "SELECT * FROM kerja_sama WHERE kategori = '$ktg' LIMIT $halaman_awal, $batas";
            $stmt = $conn->prepare($query);
            $stmt->execute();
        } else {
         // perintah tampil semua data
         $query = "SELECT * FROM kerja_sama ORDER BY tahun Desc LIMIT $halaman_awal, $batas";
         $stmt = $conn->prepare($query);
         $stmt->execute();
        }
       } else {
        // perintah tampil semua data
        $query = "SELECT * FROM kerja_sama ORDER BY tahun Desc LIMIT $halaman_awal, $batas";
        $stmt = $conn->prepare($query);
        $stmt->execute();
       }
       
?>
<div class="home-intro" style="background: url('assets/img/kantor-bupati.jpeg');background-size:100%;background-repeat: no-repeat;background-position: bottom;margin-bottom: 5%;">
    <div class="container">
        <div class="row" >
            <div class="col-md-8">
                <div class="row">
                    <ol class="breadcrumb">
                    <li><b><a href="index.php" style="color: black;">Beranda</a></b></li>
                    <li class="active">Kerja Sama</li>
                    </ol>
                    <hr>
                    <div class="tabs" style="margin-bottom: 10%;">
                        <div class="tab-content">
                            <div class="row">
                                <div class="col-md-4">
                                    <span>Jumlah data: <b><?= $count ?></b></span>
                                </div>
                                <div class="col-md-8">
                                    <form method="POST" action="" class="form-inline">
                                        <label for="kategori">Kategori</label>
                                        <select class="form-control mr-2" name="kategori">
                                            <option value="">-</option>
                                            <option value="Antar Daerah">Antar Daerah</option>
                                            <option value="Pihak Ketiga">Pihak Ketiga</option>
                                            <option value="Sinergi">Sinergi</option>
                                            <option value="Luar Negeri">Luar Negeri</option>
                                        </select>
                                        <label for="tahun">Tahun </label>
                                        <select class="form-control mr-2" name="tahun">
                                            <option value="">-</option>
                                            <option value="2017">2017</option>
                                            <option value="2018">2018</option>
                                            <option value="2019">2019</option>
                                            <option value="2020">2020</option>
                                            <option value="2021">2021</option>
                                        </select>
                                        <button type="submit" name="submit" class="btn btn-primary">Tampilkan</button>
                                    </form>
                                <br>
                                </div>
            
                                <div class="col-md-12">
                                    <table  width="100%" class="table table-bordered">
                                    <tr>
                                    <th>No</th>
                                    <th>Nama Mitra</th>
                                    <th>Bidang</th>
                                    <th>Kategori</th>
                                    <th>Tahun Kerja Sama</th>
                                    <th>Lampiran</th>
                                    </tr>

                                    <?php
                                    
                                    $nomor = 1;
                                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                    ?>

                                    <tr>
                                    <td><?= $nomor++ ?></td>
                                    <td><?= ucwords($row['nama_mitra']) ?></td>
                                    <td><?= $row['bidang'] ?></td>
                                    <td><?= $row['kategori'] ?></td>
                                    <td><?= $row['tahun'] ?></td>
                                    <?php if(!empty($row['lampiran'])) { ?>
                                    <td><a href="admin/file/kerja-sama/lampiran/<?=$row['lampiran'] ?>">Download</a></td>
                                    <?php } else { ?>
                                    <td>Tidak ada</td>
                                    <?php } ?>
                                    </tr>
                                
                                    <?php   
                                    }
                                    ?>

                                    </table>
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
                </div>
            </div>
            <?php include "includes/side-page.php"; ?>
        </div>
    </div>
</div>
<?php
    include_once('includes/footer.php');
?>