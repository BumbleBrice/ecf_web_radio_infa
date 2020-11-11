<?php include '../inc/connect.php';

		$post = [];
		$errors = array();

		if (!empty($_POST) ) {
			$post = array_map('htmlspecialchars', $_POST);
			if (!filter_var($post['email'], FILTER_VALIDATE_EMAIL)) {
				$errors[] = '@le couple identifiant et mot de passe ne correspond pas';
			}
			if (empty($post['password'])) {
				$errors[] = 'le couple identifiant et mot de passe ne correspond pas';
			}
			if(count($errors) == 0 ) {
				$reqEmail = $bdd->prepare('SELECT * from users WHERE email = :checkemail');
				$reqEmail->bindValue(':checkemail', $post['email']);
				if ($reqEmail->execute()) {
					$user = $reqEmail->fetch(PDO::FETCH_ASSOC);
					if (!empty($user)) {
						if (password_verify($post['password'], $user['password'])) {
							echo 'ça fonctionne !';
							session_start();
							$_SESSION['user'] = [
								'firstName' => $user['firstName'],
								'lastName'  => $user['lastName'],
								'city' 		=> $user['city'],
								'role' 		=> $user['role'],

							];
							header('Location: ../index.php');
						} else {
							$errors[] = 'mot de passe different';
						}
					} else {
						$errors[] = 'Utilisateur introuvale';
					}
				} else {
					$errors[] = 'fail execute';
				}
			}
		}
		if (count($errors) != 0) {
			foreach ($errors as $key => $value) {
				echo $value . '<br>';
			}
		}


 ?>