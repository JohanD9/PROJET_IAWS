<?php
include_once 'couchDbFunctions.php';
include_once 'BDDobjet.php';

if ($_POST['loginInscription'] != "" && $_POST['passwordInscription'] != "" && $_POST['passwordInscriptionVerif'] != "") {
	if ($_POST['passwordInscription'] === $_POST['passwordInscriptionVerif']) {
		
		$BD = new BDDobjet();
		// Ajout de l'utilisateur à la BDD
		$nb = $BD->selectCount("SELECT * FROM User WHERE login='" . $_POST['loginInscription'] . "'");
		echo "SELECT * FROM User WHERE login='" . $_POST['loginInscription'] . "'";
		if ($nb > 0) {
			header('Location: /LoopPasTonBus/index.php?usedLogin');
		} else {
			$BD->select("INSERT INTO User (login, password) VALUES ('" . $_POST['loginInscription'] . "', '" .$_POST['passwordInscription'] . "')");
			
			// Create session and stock user data
			session_start();
			$_SESSION['login'] = $_POST['loginInscription'];
			$_SESSION['ip'] = $_SERVER['REMOTE_ADDR'];
			
			header('Location: /LoopPasTonBus/index.php');
		}
	}
} else {
}