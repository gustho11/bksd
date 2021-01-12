<?php
include_once('galeri.inc.php');
$pro = new galeri($db);
$stmt = $pro->readAll();
$count = $pro->countAll();

?>

<div class="panel-group">
	<div class="panel panel-default" style="border: 0px #000;">
		<div class="panel-heading" style="background-color:  #c9c9c9;">
			<h4 class="panel-title">
				<a class="" data-toggle="collapse" data-parent="#accordionpengumuman" style="color: black;">
					<i class="icon icon-list"></i>
					<strong> Gallery Foto </strong>
				</a>
			</h4>
		</div>
		<div class="accordion-body collapse in">
			<div class="panel-body" style="padding: 0%;">
				<div class="owl-carousel" data-plugin-options='{"items": 3, "singleItem": false, "autoPlay": true}'>
                    <?php while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) : ?>
					    <div class="col-xs-12 margin-bottom-15" style="padding: 3%;">
							<div class="content-box box-img no-margin text-center featured-news box-clickable" style="background-color: #c9c9c9;">
								<img class="img-responsive" src="admin/file/galeri/gambar/<?=$row['gambar'] ?>" width="90%" style="height:180px;">
								<div class="box-body">
                                    <p>
											<b><?=$row['keterangan'] ?></b>
                                    </p>
								</div>
							</div>
						</div>
                    <?php endwhile; ?>
				</div>
			</div>
		</div>
	</div>
</div>