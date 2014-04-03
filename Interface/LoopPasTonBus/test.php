
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
								<li><a href="#">Mon prochain métro</a></li>
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
					<div id="paulSab" style="display: block;">
						<table class="maTable">
							<tr>
								<td class="numBus" style="background-color: rgb(38, 206, 255);">2</td>
								<td class="infoBus">Cours Dillon / Université Paul Sabatier
									<div class=icone style="float: right;">
										<img id=like2 class="clic" src="pictures/like.png" alt="Like"
											height="30" width="30" onclick="like('2');"> <span>1050</span><img
											id=unlike2 class="clic" src="pictures/unlike.png"
											alt="Unlike" height="30" width="30" onclick="unlike('2');"> <span>103</span><img
											id=img2paulSab class="clic" style="float: right;"
											src="pictures/plus.png" alt="Velo disponible" height="30"
											width="30"
											onclick="show_panel('ligne2paulSab', 'img2paulSab');">
									</div>
								</td>
							</tr>
						</table>
						<div style="display: none;" id="ligne2paulSab" class="infosDepart">
							<div class="infosDepartLigne">
								<p class="direction">Cours Dillon :</p>
								<div class="dateDepart">
									<span>2014-04-03 15:35:00</span><br>
								</div>
							</div>
						</div>
						<br>
						<table class="maTable">
							<tr>
								<td class="numBus" style="background-color: rgb(255, 94, 22);">34</td>
								<td class="infoBus">Arènes / Université Paul Sabatier
									<div class=icone style="float: right;">
										<img id=like34 class="clic" src="pictures/like.png" alt="Like"
											height="30" width="30" onclick="like('34');"> <span>1050</span><img
											id=unlike34 class="clic" src="pictures/unlike.png"
											alt="Unlike" height="30" width="30" onclick="unlike('34');">
										<span>103</span><img id=img34paulSab class="clic"
											style="float: right;" src="pictures/plus.png"
											alt="Velo disponible" height="30" width="30"
											onclick="show_panel('ligne34paulSab', 'img34paulSab');">
									</div>
								</td>
							</tr>
						</table>
						<div style="display: none;" id="ligne34paulSab"
							class="infosDepart">
							<div class="infosDepartLigne">
								<p class="direction">Arènes :</p>
								<div class="dateDepart">
									<span>2014-04-03 15:25:00</span><br>
								</div>
							</div>
						</div>
						<br>
						<table class="maTable">
							<tr>
								<td class="numBus" style="background-color: rgb(255, 94, 22);">54</td>
								<td class="infoBus">Empalot / Gleyze-Vieille
									<div class=icone style="float: right;">
										<img id=like54 class="clic" src="pictures/like.png" alt="Like"
											height="30" width="30" onclick="like('54');"> <span>1050</span><img
											id=unlike54 class="clic" src="pictures/unlike.png"
											alt="Unlike" height="30" width="30" onclick="unlike('54');">
										<span>103</span><img id=img54paulSab class="clic"
											style="float: right;" src="pictures/plus.png"
											alt="Velo disponible" height="30" width="30"
											onclick="show_panel('ligne54paulSab', 'img54paulSab');">
									</div>
								</td>
							</tr>
						</table>
						<div style="display: none;" id="ligne54paulSab"
							class="infosDepart">
							<div class="infosDepartLigne">
								<p class="direction">Empalot :</p>
								<div class="dateDepart">
									<span>2014-04-03 15:26:32</span><br>
								</div>
							</div>
						</div>
						<br>
						<table class="maTable">
							<tr>
								<td class="numBus" style="background-color: rgb(244, 0, 2);">78</td>
								<td class="infoBus">Université Paul Sabatier / St Orens Lycée
									<div class=icone style="float: right;">
										<img id=like78 class="clic" src="pictures/like.png" alt="Like"
											height="30" width="30" onclick="like('78');"> <span>1050</span><img
											id=unlike78 class="clic" src="pictures/unlike.png"
											alt="Unlike" height="30" width="30" onclick="unlike('78');">
										<span>103</span><img id=img78paulSab class="clic"
											style="float: right;" src="pictures/plus.png"
											alt="Velo disponible" height="30" width="30"
											onclick="show_panel('ligne78paulSab', 'img78paulSab');">
									</div>
								</td>
							</tr>
						</table>
						<div style="display: none;" id="ligne78paulSab"
							class="infosDepart">
							<div class="infosDepartLigne">
								<p class="direction">Saint Orens Lycée :</p>
								<div class="dateDepart">
									<span>2014-04-03 15:35:00</span><br>
								</div>
							</div>
						</div>
						<br>
						<table class="maTable">
							<tr>
								<td class="numBus" style="background-color: rgb(244, 0, 208);">81</td>
								<td class="infoBus">Université Paul Sabatier / Castanet-Tolosan
									<div class=icone style="float: right;">
										<img id=like81 class="clic" src="pictures/like.png" alt="Like"
											height="30" width="30" onclick="like('81');"> <span>1050</span><img
											id=unlike81 class="clic" src="pictures/unlike.png"
											alt="Unlike" height="30" width="30" onclick="unlike('81');">
										<span>103</span><img id=img81paulSab class="clic"
											style="float: right;" src="pictures/plus.png"
											alt="Velo disponible" height="30" width="30"
											onclick="show_panel('ligne81paulSab', 'img81paulSab');">
									</div>
								</td>
							</tr>
						</table>
						<div style="display: none;" id="ligne81paulSab"
							class="infosDepart">
							<div class="infosDepartLigne">
								<p class="direction">Castanet-Tolosan :</p>
								<div class="dateDepart">
									<span>2014-04-03 15:25:00</span><br>
								</div>
							</div>
						</div>
						<br>
						<table class="maTable">
							<tr>
								<td class="numBus" style="background-color: rgb(178, 145, 255);">88</td>
								<td class="infoBus">Ramonville Métro / Hôpital Larrey
									<div class=icone style="float: right;">
										<img id=like88 class="clic" src="pictures/like.png" alt="Like"
											height="30" width="30" onclick="like('88');"> <span>1050</span><img
											id=unlike88 class="clic" src="pictures/unlike.png"
											alt="Unlike" height="30" width="30" onclick="unlike('88');">
										<span>103</span><img id=img88paulSab class="clic"
											style="float: right;" src="pictures/plus.png"
											alt="Velo disponible" height="30" width="30"
											onclick="show_panel('ligne88paulSab', 'img88paulSab');">
									</div>
								</td>
							</tr>
						</table>
						<div style="display: none;" id="ligne88paulSab"
							class="infosDepart">
							<div class="infosDepartLigne">
								<p class="direction">Hôpital Larrey :</p>
								<div class="dateDepart">
									<span>2014-04-03 15:24:34</span><br> <span>2014-04-03 15:34:00</span><br>
								</div>
							</div>
							<div class="infosDepartLigne">
								<p class="direction">Ramonville Métro :</p>
								<div class="dateDepart">
									<span>2014-04-03 15:30:53</span><br>
								</div>
							</div>
						</div>
					</div>
					<div id="facPharma" style="display: none;">
						<br>
						<table class="maTable">
							<tr>
								<td class="numBus" style="background-color: rgb(38, 206, 255);">2</td>
								<td class="infoBus">Cours Dillon / Université Paul Sabatier
									<div class=icone style="float: right;">
										<img id=like2 class="clic" src="pictures/like.png" alt="Like"
											height="30" width="30" onclick="like('2');"> <span>1050</span><img
											id=unlike2 class="clic" src="pictures/unlike.png"
											alt="Unlike" height="30" width="30" onclick="unlike('2');"> <span>103</span><img
											id=img2facPharma class="clic" style="float: right;"
											src="pictures/plus.png" alt="Velo disponible" height="30"
											width="30"
											onclick="show_panel('ligne2facPharma', 'img2facPharma');">
									</div>
								</td>
							</tr>
						</table>
						<div style="display: none;" id="ligne2facPharma"
							class="infosDepart">
							<div class="infosDepartLigne">
								<p class="direction">Université Paul Sabatier :</p>
								<div class="dateDepart">
									<span>2014-04-03 15:23:19</span><br> <span>2014-04-03 15:40:40</span><br>
								</div>
							</div>
							<div class="infosDepartLigne">
								<p class="direction">Cours Dillon :</p>
								<div class="dateDepart">
									<span>2014-04-03 15:23:38</span><br> <span>2014-04-03 15:37:49</span><br>
								</div>
							</div>
						</div>
						<br>
						<table class="maTable">
							<tr>
								<td class="numBus" style="background-color: rgb(244, 0, 2);">78</td>
								<td class="infoBus">Université Paul Sabatier / St Orens Lycée
									<div class=icone style="float: right;">
										<img id=like78 class="clic" src="pictures/like.png" alt="Like"
											height="30" width="30" onclick="like('78');"> <span>1050</span><img
											id=unlike78 class="clic" src="pictures/unlike.png"
											alt="Unlike" height="30" width="30" onclick="unlike('78');">
										<span>103</span><img id=img78facPharma class="clic"
											style="float: right;" src="pictures/plus.png"
											alt="Velo disponible" height="30" width="30"
											onclick="show_panel('ligne78facPharma', 'img78facPharma');">
									</div>
								</td>
							</tr>
						</table>
						<div style="display: none;" id="ligne78facPharma"
							class="infosDepart">
							<div class="infosDepartLigne">
								<p class="direction">Saint Orens Lycée :</p>
								<div class="dateDepart">
									<span>2014-04-03 15:25:50</span><br> <span>2014-04-03 15:40:00</span><br>
								</div>
							</div>
							<div class="infosDepartLigne">
								<p class="direction">Université Paul Sabatier :</p>
								<div class="dateDepart">
									<span>2014-04-03 15:32:13</span><br> <span>2014-04-03 15:44:15</span><br>
								</div>
							</div>
						</div>
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
	</div>
</body>
</html>