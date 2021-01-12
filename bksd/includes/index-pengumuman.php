<?php
    include_once('pengumuman.inc.php');
    $pro = new pengumuman($db);
    $stmt = $pro->readTen();
    $count = $pro->countAll();
?>

    <div id="pengumuman" class="tab-pane ">	
        <?php while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) : ?>			
        <div class="info" data-sr="wait 300ms enter bottom move 500px opacity 0">
            <div class="row">
                <div class="col col-md-12">
                    <div class="info-body">
                        <h4>
                            <a href="#" style="color: #0088cc;">
                                <?=$row['judul_pengumuman']?>
                            </a>
                        </h4>
                        <div class="meta">
                            <span> <i class="fa fa-calendar"></i> <?=$row['tgl_pengumuman'] ?></span>
                            <span><i class="fa fa-user"> </i> Admin</span>
                        </div>
                        <p>
                            <?php
                                $pecah = explode("</p>", $row['isi_pengumuman']);
                                $excerpt = $pecah[0];
                                echo $excerpt
                            ?>
                            <a href="pengumuman-page.php?id=<?=$row['id_pengumuman'] ?>" class="btn btn-xs btn-primary"> Baca Selengkapnya </a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <?php endwhile; ?>
        
        <nav class="mb-5" align="right">
            <ul class="pagination justify-content-end">
                <li class="page-item" ><a class="page-link"  style="color:#0088cc" href="pengumuman.php">Pengumuman Lainnya...</a></li>
            </ul>
        </nav>
    </div>