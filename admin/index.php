	<?php require '../inc/header.php' ?> <!-- On requière le fichier header.php qui se trouve dans le dossier inc -->
	<?php require '../inc/connect.php' ?> <!-- idéme ligne du dessus -->
	<?php require '../inc/session.php' ?> <!-- idéme ligne du dessus -->
	<?php require '../inc/admin_nav.php' ?> <!-- idéme ligne du dessus -->


	<div class="container">
		
	<h2 class="m-5">Liste des Podcasts</h2>
	<?php 
		$response = $bdd->query('SELECT * FROM podcasts ORDER BY ID DESCRIPTION');
		$response->execute();
		$podcast = $response->fetchAll(PDO::FETCH_ASSOC);
	 ?>
	 <ul class="list-group list-group-flush">
	 <?php 
	 	foreach ($podcast as $p) {  ?>
	 		<li class="list-group-item d-flex justify-content-between">
	 			<div class="text-uppercase">
	 				<?= $p['titre']?>
	 			</div>
	 			<div> <audio src="../<?= $p['sound_file'] ?>" controls></audio></div>
	 			<div class="text-uppercase">
	 				<a href="edit_podcast.php?id=<?=$p['id']?>" class="text-uppercase btn btn-warning">midifier le podcast</a>
	 				<a href="delete_podcast.php?id=<?=$p['id']?>" class="text-uppercase btn btn-danger" onClick="return confirm('ête vous sur de vouloir supprimer se podcast ?')">Supprimer le podcast</a>
	 			</div>
	 		</li>
	 	<?php }  ?>
	 </ul>

	</div>
	<?php require '../inc/footer.php' ?>