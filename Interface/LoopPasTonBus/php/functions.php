<?php

/*
 * Function to kown if an client is log on the website
* @return true if the clien is log, else return false
*/

function isClientLog() {
	if ((isset($_SESSION['login'])) && $_SESSION['ip'] == $_SERVER['REMOTE_ADDR']) {
		return true;
	} else {
		return false;
	}
}

function yourTime() {
	$dateCourante = getdate();
	if ($dateCourante['weekday'] === "Friday" || $dateCourante['weekday'] === "Saturday") {
		$we = true;
	} else {
		$we = false;
	}
	
	if (($we && $dateCourante['hours'] > 1 && $dateCourante['minutes'] > 0) && ($dateCourante['hours'] < 5 && $dateCourante['minutes'] < 15)) {
		echo "Métro fermé (réouverture à 5h15)";
	} elseif (!$we && ($dateCourante['hours'] > 0 && $dateCourante['minutes'] > 0) && ($dateCourante['hours'] < 5 && $dateCourante['minutes'] < 15)) {
		echo "Métro fermé (réouverture à 5h15)";
	} elseif ($dateCourante['hours'] >= 22) {
		yourTimeSoiree();	
	} elseif (($dateCourante['hours'] >= 6 && $dateCourante['hours'] < 9) || ($dateCourante['hours'] >= 16 && $dateCourante['hours'] < 19) &&
			 $dateCourante['weekday'] != "Sunday") {
		echo "1 min 20";
	} elseif ($dateCourante['weekday'] != "Sunday") {
		echo "5 min" ;
	} else {
		echo "7 min";
	}
}

function yourTimeSoiree() {
	$dateCourante = getdate();
	if ($dateCourante['weekday'] === "Friday" || $dateCourante['weekday'] === "Saturday") {
		echo "4 min";
	} else {
		echo "7 min";
	}
}