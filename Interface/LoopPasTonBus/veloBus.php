<!DOCTYPE html>
<html lang="fr">
<head>
<title>LoopPasTonBus</title>
<!-- On ouvre la fenêtre à la largeur de l'écran -->
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta charset="utf-8" />
<!-- Intégration du CSS Bootstrap -->
<link href="bootstrap/css/bootstrap.css" rel="stylesheet" media="screen">
<link href="css/style.css" rel="stylesheet" media="screen">
<link rel="stylesheet"
	href="http://cimm.tisseo.fr/direct-mb-cimm-1.0/cimm.css"
	type="text/css" />
</head>
<body>
	<?php include("php/functions.php"); ?>
	
	<!-- Intégration de la libraire jQuery -->
	<script src="bootstrap/js/jquery-1.11.0.js"></script>
	<!-- Intégration de la libraire de composants du Bootstrap -->
	<script src="bootstrap/js/bootstrap.min.js"></script>
	<script src="js/mesScripts.js"></script>

	<!-- Conteneur principal -->
	<div class="container">
		<!-- Notre barre de navigation -->
		<div class="navbar navbar-inverse">
			<div class="navbar-inner">
				<!-- Bouton apparaissant sur les rÃ©solutions mobiles afin de faire apparaÃ®tre le menu de navigation -->
				<a class="btn btn-navbar" data-toggle="collapse"
					data-target=".nav-collapse"> <span class="icon-bar"></span> <span
					class="icon-bar"></span> <span class="icon-bar"></span>
				</a> <a class="brand" href="/LoopPasTonBus/index.php">LoopPasTonBus</a>
				<!-- Structure du menu -->
				<div class="nav-collapse collapse">
					<ul class="nav">
						<!-- Menu déroulant -->
						<li class="dropdown"><a href="#" class="dropdown-toggle"
							data-toggle="dropdown">Les applis<b class="caret"></b></a>
							<ul class="dropdown-menu">
								<li class="nav-header">Tisséo</li>
								<li><a href="/LoopPasTonBus/nextBus.php">Mon prochain bus</a></li>
								<li><a href="/LoopPasTonBus/nextMetro.php">Mon prochain métro</a></li>
								<li class="divider"></li>
								<li class="nav-header">VélôToulouse</li>
								<li><a href="/LoopPasTonBus/velos.php">Les vélos dispos/libres</a></li>
								<li><a href="/LoopPasTonBus/veloBus.php">Bus/Métro ou Vélô?</a></li>
							</ul></li>
					</ul>
					<?php
					session_start ();
					if (isClientLog ()) {
						echo "<span style=\"float:right;\"><a href=\"/LoopPasTonBus/php/logout.php\">Deconnexion (" . $_SESSION ['login'] . ")</a></span>";
					} else {
						echo header ( 'Location: /LoopPasTonBus/index.php' );
					}
					?>
				</div>
			</div>
		</div>

		<!-- PremiÃ¨re ligne de notre grille -->
		<div class="row show-grid">
			<div class="span9">
				<h2>Le Vélô ou le Bus?</h2>
				<hr class="monHR">
				<div id="veloOuBus?">
					<div id="getInfos">
						<div class="form-group">
							<label class="sr-only">Départ :</label> <select
								id="arretVelosBus" name="arret" size="1">
								<option value="paulSab">Université Paul Sabatier
								
								<option value="facPharma">Faculté de Pharmacie
							
							</select>
						</div>
						<div class="form-group">
							<label class="sr-only">Arrivée :</label> <input type="text"
								class="form-control" id="arriveeZone"
								placeholder="Donnez un destination"> <input type="text"
								class="form-control" id="villeArriveeZone"
								placeholder="Précisez la ville">
						</div>
						<button class="btn btn-default" onClick="getTrajet();">Rechercher</button>
						<?php
						
						if (isset ( $_GET ['nullDest'] )) {
							echo "<p style=\"color:#B1221C;\">Veuillez saisir une destination valable</p>";
						}
						?>
					</div>
					<hr>
					<div id="infosTrajetBusVelo">
		
					</div>
					<a href="nextBus.php"><h4>Voir les likes/unlikes des bus aux départs !</h4></a>
				</div>
			</div>
			<div class="span3"><h2>Infos :</h2>
				<hr class="monHR">
				<?php
				exec ( "java -jar jar/getInfos.jar", $html );
				foreach ( $html as $value )
					echo $value . "\n";
				?></div>
		</div>
	</div>
</body>
</html>