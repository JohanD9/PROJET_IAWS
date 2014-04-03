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
</head>
<body>
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
							</ul></li>
						<li><a href="/LoopPasTonBus/aPropos.php">A propos</a></li>
					</ul>
				</div>
			</div>
		</div>

		<!-- PremiÃ¨re ligne de notre grille -->
		<div class="row show-grid">
			<div class="span9">
				<h2>Les prochains bus :</h2>
				<hr class="monHR">

				<form id="formArret" onchange="updateLignes()"
					style="float: left; padding-right: 15px;">
					<select id="arret" name="arret" size="1">
						<option value="paulSab">Université Paul Sabatier
						
						<option value="facPharma">Faculté de Pharmacie
					
					</select>
				</form>
				<img id=refresh class="clic" src="pictures/refresh.png"
					alt="Mettre à jour les prochains bus" height="25" width="25"
					onclick="refreshBus();">

				<div id="contenuBus">
				<?php
				exec ( "java -jar jar/gestionBus.jar", $html );
				foreach ( $html as $value )
					echo $value . "\n";
				?>
				</div>
			</div>
			<div class="span3">
				<h2>Infos :</h2>
				<hr class="monHR">
				Sidebar Sidebar Sidebar Sidebar Sidebar Sidebar Sidebar Sidebar
				Sidebar Sidebar Sidebar Sidebar Sidebar Sidebar Sidebar Sidebar
				Sidebar Sidebar Sidebar Sidebar Sidebar Sidebar Sidebar Sidebar
				Sidebar Sidebar Sidebar Sidebar Sidebar Sidebar Sidebar Sidebar
				Sidebar Sidebar Sidebar Sidebar Sidebar Sidebar Sidebar Sidebar
				Sidebar Sidebar Sidebar Sidebar Sidebar Sidebar Sidebar Sidebar
				Sidebar Sidebar Sidebar Sidebar Sidebar Sidebar Sidebar Sidebar
				Sidebar Sidebar Sidebar Sidebar Sidebar Sidebar Sidebar Sidebar
				Sidebar Sidebar Sidebar Sidebar Sidebar Sidebar Sidebar Sidebar
				Sidebar Sidebar Sidebar Sidebar Sidebar Sidebar Sidebar Sidebar
				Sidebar Sidebar Sidebar Sidebar Sidebar Sidebar Sidebar Sidebar
				Sidebar Sidebar Sidebar Sidebar Sidebar Sidebar Sidebar Sidebar
				Sidebar Sidebar Sidebar Sidebar Sidebar Sidebar Sidebar Sidebar
				Sidebar Sidebar Sidebar Sidebar Sidebar Sidebar Sidebar Sidebar
				Sidebar Sidebar Sidebar Sidebar Sidebar Sidebar Sidebar Sidebar
				Sidebar Sidebar Sidebar Sidebar Sidebar Sidebar Sidebar Sidebar
				Sidebar Sidebar Sidebar Sidebar Sidebar Sidebar Sidebar Sidebar
				Sidebar Sidebar Sidebar Sidebar Sidebar Sidebar Sidebar Sidebar
				Sidebar Sidebar Sidebar Sidebar Sidebar Sidebar Sidebar Sidebar
				Sidebar Sidebar Sidebar Sidebar Sidebar Sidebar Sidebar Sidebar
				Sidebar Sidebar Sidebar Sidebar Sidebar Sidebar Sidebar Sidebar
				Sidebar Sidebar Sidebar Sidebar Sidebar Sidebar Sidebar Sidebar
				Sidebar Sidebar Sidebar Sidebar Sidebar Sidebar Sidebar Sidebar
				Sidebar Sidebar Sidebar Sidebar Sidebar Sidebar Sidebar Sidebar
				Sidebar Sidebar Sidebar Sidebar Sidebar Sidebar Sidebar Sidebar
				Sidebar Sidebar Sidebar Sidebar Sidebar Sidebar Sidebar Sidebar
				Sidebar Sidebar Sidebar Sidebar Sidebar Sidebar Sidebar Sidebar
			</div>
		</div>
	</div>
</body>
</html>