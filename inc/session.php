<?php session_start();
	if (!empty($_SESSION) && isset($_SESSION['user']['role'])) {
		if ($_SESSION['user']['role'] != 'admin') {
			header('Location: ../index.php');
		} 
	} else {
			header('Location: ../index.php');
		}