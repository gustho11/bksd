<?php
    include_once('berita.inc.php');
    $pro = new berita($db);
    $stmt = $pro->readTen();
    $count = $pro->countAll();
?>

	<div id="berita" class="tab-pane active">
        <?php while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) : ?>
        <div class="media" data-sr="wait 300ms enter bottom move 500px opacity 0">
            <div class="row">
                <div class="col col-md-3">
                    <center>
                        <div class="media-left">
                            <div>
                                <img src="admin/file/berita/tampilan/<?=$row['tampilan'] ?>" height="170" width="170">
                            </div>
                        </div>
                    </center>
                </div>
                <div class="col col-md-9">
                    <div class="media-body">
                        <h4><strong><a href="#" style="color: #0088cc;"><?=$row['judul_berita'] ?></a></strong></h4>
                            <div class="meta">
                                <span><i class="fa fa-calendar"> </i> <?= $row['tgl_berita'] ?></span>
                                <span><i class="fa fa-user"> </i> BKSD</span>
                            </div>
                            <p>
                                <?php
                                $pecah = explode("</p>", $row['isi_berita']);
                                $excerpt = $pecah[0];
                                echo $excerpt
                                ?>...
                            <a href="berita-page.php?id=<?=$row['id_berita'] ?> " class="btn btn-xs btn-primary"> Baca Selengkapnya </a>
                            </p>
                    </div>
                </div>
            </div>
        </div>
        <?php endwhile; ?>
        <nav class="mb-5" align="right">
            <ul class="pagination justify-content-end">
            <li class="page-item" ><a class="page-link"  style="color:#0088cc" href="berita.php">Berita Lainnya...</a></li>
            </ul>
        </nav>
    </div>