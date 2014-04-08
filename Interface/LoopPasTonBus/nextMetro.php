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
							</ul></li>
						<li><a href="/LoopPasTonBus/aPropos.php">A propos</a></li>
					</ul>
					<?php
						session_start ();
						if (isClientLog ()) {
							echo "<span style=\"float:right;\"><a href=\"/LoopPasTonBus/php/logout.php\">Deconnexion</a></span>";
						} else {
							echo header('Location: /LoopPasTonBus/index.php');
						}
					?>
				</div>
			</div>
		</div>

		<!-- PremiÃ¨re ligne de notre grille -->
		<div class="row show-grid">
			<div class="span9">
				<h2>Les prochains métros :</h2>
				<hr class="monHR">
				<div id="tempsAttenteMetro">
					<span style="font-size: large; font-weight:bold;">Votre prochain métro dans moins de : </span>
					<span class="heure"><?php yourTime() ?></span>
				</div>
				<hr>
				<div id="prochainDepartMetro">
					<h3>Temps de parcours :</h3>
					<table class="maTable">
						<tr>
							<td class="numBus" style="background-color: #f40002;">A</td>
							<td class="infoBus">Basso Cambo / Balma - Gramont - <span
								class="heure"> 22 min 30</span>
								<div class=icone style="float: right;">
									<img id=likeA class="clic" src="pictures/like.png" alt="Like"
										height="30" width="30" onclick="likeMetro('A');"> <span>1050</span>
									<img id=unlikeA class="clic" src="pictures/unlike.png"
										alt="Unlike" height="30" width="30"
										onclick="unlikeMetro('A');"> <span>103</span>
								</div>
							</td>
						</tr>
					</table>
					<br>
					<table class="maTable">
						<tr>
							<td class="numBus"
								style="background-color: #ffe500; color: #000;">B</td>
							<td class="infoBus">Borderouge / Ramonville - <span class="heure">
									26 min 30</span>
								<div class=icone style="float: right;">
									<img id=likeB class="clic" src="pictures/like.png" alt="Like"
										height="30" width="30" onclick="likeMetro('B');"> <span>1050</span><img
										id=unlikeB class="clic" src="pictures/unlike.png" alt="Unlike"
										height="30" width="30" onclick="unlikeMetro('B');"> <span>103</span>
								</div>
							</td>
						</tr>
					</table>
				</div>
				<hr>
				<div id="infosMetro">
					<h3>Récapitulatif temps d'attentes :</h3>
					<table class="table table-striped">
						<tr>
							<td><span class="titreTab">Quand ?</span></td>
							<td><span class="titreTab">Combien de temps?</span></td>
						</tr>
						<tr>
							<td>Heure de pointe (7h/10h - 16h/19h) *</td>
							<td><span class="heure">1 min 20</span></td>
						</tr>
						<tr>
							<td>Soirée (semaine)</td>
							<td><span class="heure">7 min</span></td>
						</tr>
						<tr>
							<td>Soirée (Vendredi - Samedi)</td>
							<td><span class="heure">4 min</span></td>
						</tr>
						<tr>
							<td>Heure creuse (semaine)</td>
							<td><span class="heure">5 min</span></td>
						</tr>
						<tr>
							<td>Heure creuse (dimanche et jours fériés)</td>
							<td><span class="heure">7 min</span></td>
						</tr>
						<tr>
							<td>Début de service</td>
							<td><span class="heure">9 min</span></td>
						</tr>
					</table>
					<span style="font-size: small;">* Hors vacances scolaires</span>
				</div>
			</div>
			<div class="span3">Sidebar Sidebar Sidebar Sidebar Sidebar Sidebar
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
				Sidebar Sidebar</div>
		</div>
	</div>
</body>
</html>