<?php
	include_once 'couchDbFunctions.php';

	session_start();
	
	if(!isset($_GET['shortname']) || !isset($_GET['action'])) {
		echo 'erreur';
	}
	
	if ($_GET['action'] === 'getLike') {
		echo getLineLike($_GET['shortname']);
	}
	
	if ($_GET['action'] === 'getUnlike') {
		echo getLineUnlike($_GET['shortname']);
	}
	
	if ($_GET['action'] === 'addLike') {
		echo addLineLike($_SESSION['login'], $_GET['shortname']);
	}
	
	if ($_GET['action'] === 'addUnlike') {
		echo addLineUnlike($_SESSION['login'], $_GET['shortname']);
	}
	
	if ($_GET['action'] === 'getUserLike') {
		echo getUserLike($_SESSION['login'], $_GET['shortname']);
	}
	
	if ($_GET['action'] === 'getUserUnlike') {
		echo getUserUnlike($_SESSION['login'], $_GET['shortname']);
	}

