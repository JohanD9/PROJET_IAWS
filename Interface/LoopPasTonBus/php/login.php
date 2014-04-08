<?php

/*
 * Check the client login and password 
 * create a session in case of successful log
 * 
 */
include_once 'couchDbFunctions.php';
include_once 'BDDobjet.php';




if ($_POST['login'] != "" && $_POST['password'] != "") {
		
		$BD = new BDDobjet();
		// Ajout de l'utilisateur à la BDD
		$nb = $BD->selectCount("SELECT * FROM User WHERE login='" . $_POST['login'] . "' AND password='" . $_POST['password'] ."'");
		
		if ($nb > 0) {
			// Create session and stock user data
   			session_start();
   			$_SESSION['login'] = $_POST['login'];
   			$_SESSION['ip'] = $_SERVER['REMOTE_ADDR'];
   			
   			header('Location: /LoopPasTonBus/index.php');
		} else {
		header('Location: /LoopPasTonBus/index.php?badLog');
	}
} else {
	header('Location: /LoopPasTonBus/index.php?log');
}

?>
