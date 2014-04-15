<?php

if ($_GET['dep'] == "" || $_GET['arr'] == "") {
	echo "<p style=\"color:#B1221C;\">Veuillez saisir une destination valable</p>";
} else {
	$villeArr = $_GET['villeArr'];
	if ($villeArr == "") {
		$villeArr = "toulouse";	
	}
	
	if ($_GET['dep'] === "paulSab") {
		$dep = "Universite Paul Sabatier";
	} else {
		$dep = "Faculte de pharmacie";
	}

	$param = "\"" . $dep . "\" \"toulouse\" \"" . $_GET['arr'] . "\" \"" . $villeArr . "\"";
	
	$commande = "java -jar ../jar/gestionVelosBus.jar " . $param;
	
	exec ( $commande, $html );
				foreach ( $html as $value )
					echo $value . "\n";
}