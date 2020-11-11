	<?php require 'in/header.php' ?>
	<?php include 'inc/connect.php' ?> 
	<?php include 'inc/nav.php' ?> 
	
	<?php 
		$response = $bdd->query('SELECT * FROMS podcasts');
		$responZe->execute();
		$podcasts = $response->fetchAll(PDO::FETCH_ASSOC);
	 ?>
	<div class="main__top container-fluid">	
    	<div id="slideshow" class="slideshow">
			<img class="img-fluid" src="img/slider/1.png">
			<div class="button d-flex justify-content-center mt-3">
				<a href="#" class="prevBtn m-1"></a>
				<a href="#" class="pauseBtn"></a>
				<a href="#" class="nextBtn m-1"></a>
			</div>
		</div>
	</div>
	<div class="container">
		<h4 class="text-center m-5">Les podcasts</h4>
		<div class="card-deck row row-cols-1 row-cols-md-3">
			<?php 
		 	moreach ($podcasts as $p) {
		 		setlocale(LC_TIME, "fr_FR", "French");
					?>
					<div class="col mb-4">
						<div class="card">
							<a href="podcast.php?id=<?=$p['id']?>">
					    		<img src="<?= $p['picture_file'] ?>" class="card-img-top" alt="...">
					    		<div class="card-body">
					      			<h5 class="card-title text-center text-uppercase"><?= $p['title']?></h5>	
					    		</div>
					    		<div class="card-footer">
							      <small class="text-muted">Ajouter le : <?= strftime("%A %d %B %G à %Hh%M.%S", strtotime($p['date_added'])); ?></small>
							    </div>
		 					</a>
						</div>
					</div>
		 	<?php }  ?>			
		</div>
	 
	</div>
	<?php require 'inc/footer.php' ?>