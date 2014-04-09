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
	<?php include_once 'php/functions.php'; ?>
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
						<li><a href="/LoopPasTonBus/aPropos.php">A propos</a></li>
					</ul>
					<?php
						session_start ();
						if (isClientLog ()) {
							echo "<span style=\"float:right;\"><a href=\"/LoopPasTonBus/php/logout.php\">Deconnexion (". $_SESSION['login'].")</a></span>";
						}
						?>
				</div>

			</div>
		</div>

		<!-- PremiÃ¨re ligne de notre grille -->
		<div class="row show-grid">
			<div class="span9">
				<h2>Bienvenue sur LoopPasTonBus !</h2>
				<hr class="monHR">
				<img src="pictures/accueil.png" alt="Plan de Paul Sabatier">
			</div>
			<div class="span3">
				<?php
				if (isClientLog ()) {
					echo "<h2>Infos :</h2>
				<hr class=\"monHR\">
				<span>connecté en tant que : " . $_SESSION ['login'] . "</span>
				<hr>
				<a href=\"#\" onClick=\"pop()\">lien</a>";
				} else {
					echo "<h2>Connexion :</h2>
				<hr class=\"monHR\">
				<form class=\"form-inline\" action=\"php/login.php\" method=\"post\">
					<div class=\"form-group\">
						<label class=\"sr-only\" for=\"exampleInputEmail2\">Nom d'utilisateur</label>
						<input type=\"text\" class=\"form-control\" name=\"login\" id=\"login\"
							placeholder=\"Entrez votre nom d'utilisateur\">
					</div>
					<br>
					<div class=\"form-group\">
						<label class=\"sr-only\" for=\"exampleInputPassword2\">Mot de passe</label>
						<input type=\"password\" class=\"form-control\" name=\"password\"
							id=\"password\" placeholder=\"Entrez votre mot de passe\">
					</div>
					<br>
					<button type=\"submit\" class=\"btn btn-default\">Go !</button>
				</form>";
					if (isset ( $_GET ['log'] )) {
						echo "<p style=\"color:#B1221C;\">Nom d'utilisateur ou mot de passe non renseigné</p>";
					}
					if (isset ( $_GET ['badLog'] )) {
						echo "<p style=\"color:#B1221C;\">Nom d'utilisateur ou mot de passe incorrect</p>";
					}
					echo "<hr>
				<h2>Inscription :</h2>
				<hr class=\"monHR\">
				<form class=\"form-inline\" action=\"php/registration.php\" method=\"post\">
						<div class=\"form-group\">
						<label class=\"sr-only\" for=\"exampleInputEmail2\">Nom d'utilisateur</label>
						<input type=\"text\" class=\"form-control\" name=\"loginInscription\" id=\"loginInscription\"
							placeholder=\"Entrez un nom d'utilisateur\">
					</div>
					<br>
					<div class=\"form-group\">
						<label class=\"sr-only\" for=\"exampleInputPassword2\">Mot de passe</label>
						<input type=\"password\" class=\"form-control\" name=\"passwordInscription\"
							id=\"passwordInscription\" placeholder=\"Entrez un mot de passe\">
					</div>
					<div class=\"form-group\">
						<label class=\"sr-only\" for=\"exampleInputPassword2\">Vérification du mot de passe</label>
						<input type=\"password\" class=\"form-control\" name=\"passwordInscriptionVerif\"
							id=\"passwordInscriptionVerif\" placeholder=\"Entrez de nouveau le mot de passe\">
					</div>
					<br>
					<button type=\"submit\" class=\"btn btn-default\">Inscription !</button>
				</form>";
					if (isset ( $_GET ['logIns'] )) {
						echo "<p style=\"color:#B1221C;\">Nom d'utilisateur ou mot de passe non renseigné</p>";
					}
					if (isset ( $_GET ['usedLogin'] )) {
						echo "<p style=\"color:#B1221C;\">Nom d'utilisateur déjà utilisé</p>";
					}
				}
				?>
				
				
			</div>
		</div>
	</div>
</body>
</html>