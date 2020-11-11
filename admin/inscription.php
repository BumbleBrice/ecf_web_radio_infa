<?php  include '../inc/header.php';
	   include '../inc/connect.php';
	// on instancie les variables pour leur donnée une valeur de base
	$post = [];
	$errors = [];

	$showError = false;

	$firstname = '';
	$lastname = '';
	$email = '';
	$phone = '';
	$address = '';
	$city = '';
	$cityZip = '';

	if (!empty($_POST) && isset($_POST)) {
		foreach ($_POST as $key => $value) {
			$post[$key] = htmlspecialchars($value);
		}
		if (strlen($post['firstname']) <2 || strlen($post['firstname']) > 50) {
			$errors[] = 'Le nom doit faire entre 2 et 50 caractères';
		
		if (strlen($post['lastname']) <2 || strlen($post['lastname']) > 50) {
			$errors[] = 'Le prénom doit faire entre 2 et 50 caractères';
		
		if (strlen($post['phone']) != 10) {
			$errors[] = 'Le numéro de téléphone n\'est pas correcte';
		
		if (!filter_var($post['email'], FILTER_VALIDATE_EMAIL)) {
			$errors[] = 'L\'email doit faire entre 2 et 50 caractères';
		
		if (strlen($post['address']) <2 || strlen($post['address']) > 50) {
			$errors[] = 'L\'addresse doit faire entre 2 et 50 caractères';
		
		if (strlen($post['cityZip']) != 5) {
			$errors[] = 'Le code postal n\'est pas correcte';
		
		if (strlen($post['city']) <2 || strlen($post['city']) > 50) {
			$errors[] = 'La ville doit faire entre 2 et 50 caractères';
		 
		if ($post['password'] != $post['checkPassword']) {
			$errors[] = 'Les mots de passe ne sont pas les mêmes';
		 
		if (count($errors) > 0 ) {
				$showError = true;

				$firstname  = $post['firstname'];
				$lastname 	= $post['lastname'];
				$email 		= $post['email'];
				$phone 		= $post['phone'];
				$address 	= $post['address'];
				$city 		= $post['city'];
				$cityZip 	= $post['cityZip'];
				
		} else {
			$pass_hashed = password_hash($post['password'], PASSWORD_DEFAULT);

			$requete = $bdd->prepare('INSERTINTO users 
						(firstname, lastname, email, phone, address, city, cityZip, password) 
				VALUES 	(:firstname, :lastname, :email, :phone, :address, :city, :cityZip, :password)');
			$requete->bindValue(':firstname', 	$post['firstname'], PDO::PARAM_STR);
			$requete->bindValue(':lastname', 	$post['lastname'], 	PDO::PARAM_STR);
			$requete->bindValue(':email', 		$post['email'], 	PDO::PARAM_STR);
			$requete->bindValue(':phone', 		$post['phone'], 	PDO::PARAM_STR);
			$requete->bindValue(':address', 		$post['address'], 	PDO::PARAM_STR);
			$requete->bindValue(':city', 		$post['city'], 		PDO::PARAM_STR);
			$requete->bindValue(':cityZip', 	$post['cityZip'], 	PDO::PARAM_STR);
			$requete->bindValue(':password', 	$pass_hashed, 		PDO::PARAM_STR);
			if ($requete->execute()) {
				header('Location: ../index.php')
			} else {
				echo 'moche';
			}
		} // fin du else
	} // fin vérification $_POST


 ?>

 <form method="POST">
 	<?php if ($showError) : ?>
 	<ul>
 		<?php foreach ($errors as $e) : ?>
 			<li><?= $e ?></li>
 		<?php endforeach; ?>
 	</ul>
 	<?php endif; ?>
 	<label for=""> Nom
	 	<input type="text" name="firstname" value="<?=$firstname ?>">	
 	</label><br>
 	<label for=""> Prénom
	 	<input type="text" name="lastname" value="<?= $lastname ?>">
 	</label><br>
 	<label for=""> Email
	 	<input type="text" name="email" value="<?= $email ?>">	
 	</label><br>
 	<label for=""> Téléphone
	 	<input type="text" name="phone" value="<?= $phone ?>">
 	</label><br>
 	<label for=""> Addresse
	 	<input type="text" name="address" value="<?= $address ?>">
 	</label><br>
 	<label for=""> Code postal
	 	<input type="text" name="cityZip" value="<?= $cityZip ?>">
 	</label><br>
 	<label for=""> Ville
 		<input type="text" name="city" value="<?= $city ?>">
 	</label><br>
 	<label for=""> Mot de passe
 		<input type="text" name="password">
 	</label><br>
 	<label for=""> Verifier le mot de passe
 		<input type="text" name="checkPassword">
 	</label><br>
 	<input type="submit" class="btn btn-success" value="Inscription">
 </form>