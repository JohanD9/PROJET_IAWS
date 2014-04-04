<?php
	include_once 'couchDbFunctions.php';

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
		echo addLineLike($_GET['shortname']);
	}
	
	if ($_GET['action'] === 'addUnlike') {
		echo addLineUnlike($_GET['shortname']);
	}

