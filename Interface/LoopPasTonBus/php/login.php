<?php

/*
 * Check the client login and password 
 * create a session in case of successful log
 * 
 */
include_once 'couchDbFunctions.php';

// If one or both log miss the user is redirect 
if ($_POST['login'] != "" && $_POST['password'] != "") {
	if (verifyUser($_POST['login'], $_POST['password'])) {
   		echo getPassword($_POST['login']);
	} else {
		header('Location: /LoopPasTonBus/index.php?badLog');
	}
} else {
	header('Location: /LoopPasTonBus/index.php?log');
}


// If user logs are valid the session is created
/*if (isValidLog($_POST['login'], $_POST['password'])) {

    // Create session and stock user data
    session_start();
    $_SESSION['login'] = $_POST['login'];
    $_SESSION['ip'] = $_SERVER['REMOTE_ADDR'];

    header('Location: /CollaborativeSearch/');
} else {
    header('Location: /CollaborativeSearch/index.php?log');
}*/
?>
