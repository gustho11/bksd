<?php
    include_once('agenda.inc.php');
    $pro = new agenda($db);
    $stmt = $pro->readTen();
    $count = $pro->countAll();
?>

    <div id="agenda" class="tab-pane ">	
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
                            <span> <i class="fa fa-calendar"></i> <?=$row['tgl_agenda'] ?></span>
                            <span><i class="fa fa-user"> </i> Admin</span>
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
                <li class="page-item" ><a class="page-link"  style="color:#0088cc" href="agenda.php">Agenda Lainnya...</a></li>
            </ul>
        </nav>
    </div>