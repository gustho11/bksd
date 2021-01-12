<?php
    include_once('includes/kerja-sama.inc.php');
    $pro = new kerja_sama($db);
    $conn = $db;
    $count = $pro->countAll();

    $batas = 5;
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
         // perintah tampil data berdasarkan periode Tahun
         $query = "SELECT * FROM kerja_sama WHERE tahun = '$thn' AND kategori = '$ktg' LIMIT $halaman_awal, $batas";
         $stmt = $conn->prepare($query);
         $stmt->execute();
        } elseif (!empty($thn) && empty($ktg)) {
            // perintah tampil data berdasarkan periode Tahun
            $query = "SELECT * FROM kerja_sama WHERE tahun = '$thn' LIMIT $halaman_awal, $batas";
            $stmt = $conn->prepare($query);
            $stmt->execute();
        } elseif (empty($thn) && !empty($ktg)) {
            // perintah tampil data berdasarkan periode Tahun
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
                        <div id="kerja-sama" class="tab-pane">
                            <div class="row">
                                <div class="col-md-12 pt-2">
                                    <span>Jumlah data: <b><?= $count ?></b></span>
                                </div>
                                <div class="col-md-12">
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
                                    <li class="page-item" ><a class="page-link"  style="color:#0088cc" href="kerja-sama.php">Lihat Selengkapnya...</a></li>
                                </ul>
                            </nav>
                        </div>