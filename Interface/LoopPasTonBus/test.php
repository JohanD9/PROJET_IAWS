
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
					<span style="float: right;"><a href="/LoopPasTonBus/php/logout.php">Deconnexion</a></span>
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
										<img id=like2paulSab class="clic" src="pictures/like.png"
											alt="Like" height="30" width="30" onclick="like('2');"> <span
											id="nbLike2paulSab"> <script type="text/javascript">nbLike('2');</script>
										</span><img id=unlike2paulSab class="clic"
											src="pictures/unlike.png" alt="Unlike" height="30" width="30"
											onclick="unlike('2');"> <span id="nbUnlike2paulSab"><script
												type="text/javascript">nbUnlike('2');</script></span><img
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
									<span>2014-04-08 10:50:00</span><br> <span>2014-04-08 11:05:00</span><br>
								</div>
							</div>
						</div>
						<br>
						<table class="maTable">
							<tr>
								<td class="numBus" style="background-color: rgb(255, 94, 22);">34</td>
								<td class="infoBus">Arènes / Université Paul Sabatier
									<div class=icone style="float: right;">
										<img id=like34paulSab class="clic" src="pictures/like.png"
											alt="Like" height="30" width="30" onclick="like('34');"> <span
											id="nbLike34paulSab"><script type="text/javascript">nbLike('34');</script></span><img
											id=unlike34paulSab class="clic" src="pictures/unlike.png"
											alt="Unlike" height="30" width="30" onclick="unlike('34');">
										<span id="nbUnlike34paulSab"><script type="text/javascript">nbUnlike('34');</script></span><img
											id=img34paulSab class="clic" style="float: right;"
											src="pictures/plus.png" alt="Velo disponible" height="30"
											width="30"
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
									<span>2014-04-08 10:55:00</span><br> <span>2014-04-08 11:10:00</span><br>
								</div>
							</div>
						</div>
						<br>
						<table class="maTable">
							<tr>
								<td class="numBus" style="background-color: rgb(255, 94, 22);">54</td>
								<td class="infoBus">Empalot / Gleyze-Vieille
									<div class=icone style="float: right;">
										<img id=like54paulSab class="clic" src="pictures/like.png"
											alt="Like" height="30" width="30" onclick="like('54');"> <span
											id="nbLike54paulSab"><script type="text/javascript">nbLike('54');</script></span><img
											id=unlike54paulSab class="clic" src="pictures/unlike.png"
											alt="Unlike" height="30" width="30" onclick="unlike('54');">
										<span id="nbUnlike54paulSab"><script type="text/javascript">nbUnlike('54');</script></span><img
											id=img54paulSab class="clic" style="float: right;"
											src="pictures/plus.png" alt="Velo disponible" height="30"
											width="30"
											onclick="show_panel('ligne54paulSab', 'img54paulSab');">
									</div>
								</td>
							</tr>
						</table>
						<div style="display: none;" id="ligne54paulSab"
							class="infosDepart">
							<div class="infosDepartLigne">
								<p class="direction">Gleyze-Vieille :</p>
								<div class="dateDepart">
									<span>2014-04-08 10:47:44</span><br> <span>2014-04-08 11:17:00</span><br>
								</div>
							</div>
							<div class="infosDepartLigne">
								<p class="direction">Empalot :</p>
								<div class="dateDepart">
									<span>2014-04-08 10:57:01</span><br> <span>2014-04-08 11:27:01</span><br>
								</div>
							</div>
						</div>
						<br>
						<table class="maTable">
							<tr>
								<td class="numBus" style="background-color: rgb(148, 210, 77);">56</td>
								<td class="infoBus">Université Paul Sabatier / Auzeville Église
									<div class=icone style="float: right;">
										<img id=like56paulSab class="clic" src="pictures/like.png"
											alt="Like" height="30" width="30" onclick="like('56');"> <span
											id="nbLike56paulSab"><script type="text/javascript">nbLike('56');</script></span><img
											id=unlike56paulSab class="clic" src="pictures/unlike.png"
											alt="Unlike" height="30" width="30" onclick="unlike('56');">
										<span id="nbUnlike56paulSab"><script type="text/javascript">nbUnlike('56');</script></span><img
											id=img56paulSab class="clic" style="float: right;"
											src="pictures/plus.png" alt="Velo disponible" height="30"
											width="30"
											onclick="show_panel('ligne56paulSab', 'img56paulSab');">
									</div>
								</td>
							</tr>
						</table>
						<div style="display: none;" id="ligne56paulSab"
							class="infosDepart">
							<div class="infosDepartLigne">
								<p class="direction">Auzeville Eglise :</p>
								<div class="dateDepart">
									<span>2014-04-08 10:45:00</span><br> <span>2014-04-08 11:15:00</span><br>
								</div>
							</div>
						</div>
						<br>
						<table class="maTable">
							<tr>
								<td class="numBus" style="background-color: rgb(244, 0, 2);">78</td>
								<td class="infoBus">Université Paul Sabatier / St Orens Lycée
									<div class=icone style="float: right;">
										<img id=like78paulSab class="clic" src="pictures/like.png"
											alt="Like" height="30" width="30" onclick="like('78');"> <span
											id="nbLike78paulSab"><script type="text/javascript">nbLike('78');</script></span><img
											id=unlike78paulSab class="clic" src="pictures/unlike.png"
											alt="Unlike" height="30" width="30" onclick="unlike('78');">
										<span id="nbUnlike78paulSab"><script type="text/javascript">nbUnlike('78');</script></span><img
											id=img78paulSab class="clic" style="float: right;"
											src="pictures/plus.png" alt="Velo disponible" height="30"
											width="30"
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
									<span>2014-04-08 10:50:00</span><br> <span>2014-04-08 11:05:00</span><br>
								</div>
							</div>
						</div>
						<br>
						<table class="maTable">
							<tr>
								<td class="numBus" style="background-color: rgb(244, 0, 208);">81</td>
								<td class="infoBus">Université Paul Sabatier / Castanet-Tolosan
									<div class=icone style="float: right;">
										<img id=like81paulSab class="clic" src="pictures/like.png"
											alt="Like" height="30" width="30" onclick="like('81');"> <span
											id="nbLike81paulSab"><script type="text/javascript">nbLike('81');</script></span><img
											id=unlike81paulSab class="clic" src="pictures/unlike.png"
											alt="Unlike" height="30" width="30" onclick="unlike('81');">
										<span id="nbUnlike81paulSab"><script type="text/javascript">nbUnlike('81');</script></span><img
											id=img81paulSab class="clic" style="float: right;"
											src="pictures/plus.png" alt="Velo disponible" height="30"
											width="30"
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
									<span>2014-04-08 11:00:00</span><br> <span>2014-04-08 11:30:00</span><br>
								</div>
							</div>
						</div>
						<br>
						<table class="maTable">
							<tr>
								<td class="numBus" style="background-color: rgb(244, 0, 2);">82</td>
								<td class="infoBus">Université Paul Sabatier / Ramonville
									Midiville
									<div class=icone style="float: right;">
										<img id=like82paulSab class="clic" src="pictures/like.png"
											alt="Like" height="30" width="30" onclick="like('82');"> <span
											id="nbLike82paulSab"><script type="text/javascript">nbLike('82');</script></span><img
											id=unlike82paulSab class="clic" src="pictures/unlike.png"
											alt="Unlike" height="30" width="30" onclick="unlike('82');">
										<span id="nbUnlike82paulSab"><script type="text/javascript">nbUnlike('82');</script></span><img
											id=img82paulSab class="clic" style="float: right;"
											src="pictures/plus.png" alt="Velo disponible" height="30"
											width="30"
											onclick="show_panel('ligne82paulSab', 'img82paulSab');">
									</div>
								</td>
							</tr>
						</table>
						<div style="display: none;" id="ligne82paulSab"
							class="infosDepart">
							<div class="infosDepartLigne">
								<p class="direction">Ramonville Port Sud :</p>
								<div class="dateDepart">
									<span>2014-04-08 11:10:00</span><br> <span>2014-04-08 11:55:00</span><br>
								</div>
							</div>
						</div>
						<br>
						<table class="maTable">
							<tr>
								<td class="numBus" style="background-color: rgb(178, 145, 255);">88</td>
								<td class="infoBus">Ramonville Métro / Hôpital Larrey
									<div class=icone style="float: right;">
										<img id=like88paulSab class="clic" src="pictures/like.png"
											alt="Like" height="30" width="30" onclick="like('88');"> <span
											id="nbLike88paulSab"><script type="text/javascript">nbLike('88');</script></span><img
											id=unlike88paulSab class="clic" src="pictures/unlike.png"
											alt="Unlike" height="30" width="30" onclick="unlike('88');">
										<span id="nbUnlike88paulSab"><script type="text/javascript">nbUnlike('88');</script></span><img
											id=img88paulSab class="clic" style="float: right;"
											src="pictures/plus.png" alt="Velo disponible" height="30"
											width="30"
											onclick="show_panel('ligne88paulSab', 'img88paulSab');">
									</div>
								</td>
							</tr>
						</table>
						<div style="display: none;" id="ligne88paulSab"
							class="infosDepart">
							<div class="infosDepartLigne">
								<p class="direction">Ramonville Métro :</p>
								<div class="dateDepart">
									<span>2014-04-08 10:44:10</span><br> <span>2014-04-08 10:50:02</span><br>
								</div>
							</div>
							<div class="infosDepartLigne">
								<p class="direction">Hôpital Larrey :</p>
								<div class="dateDepart">
									<span>2014-04-08 10:45:40</span><br> <span>2014-04-08 10:54:00</span><br>
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
										<img id=like2facPharma class="clic" src="pictures/like.png"
											alt="Like" height="30" width="30" onclick="like('2');"> <span
											id="nbLike2facPharma"></span><img id=unlike2facPharma
											class="clic" src="pictures/unlike.png" alt="Unlike"
											height="30" width="30" onclick="unlike('2');"> <span
											id="nbUnlike2facPharma"></span><img id=img2facPharma
											class="clic" style="float: right;" src="pictures/plus.png"
											alt="Velo disponible" height="30" width="30"
											onclick="show_panel('ligne2facPharma', 'img2facPharma');">
									</div>
								</td>
							</tr>
						</table>
						<script type="text/javascript">nbLike('2');</script>
						<script type="text/javascript">nbUnlike('2');</script>
						<div style="display: none;" id="ligne2facPharma"
							class="infosDepart">
							<div class="infosDepartLigne">
								<p class="direction">Université Paul Sabatier :</p>
								<div class="dateDepart">
									<span>2014-04-08 10:50:29</span><br> <span>2014-04-08 11:07:04</span><br>
								</div>
							</div>
							<div class="infosDepartLigne">
								<p class="direction">Cours Dillon :</p>
								<div class="dateDepart">
									<span>2014-04-08 10:52:49</span><br> <span>2014-04-08 11:07:49</span><br>
								</div>
							</div>
						</div>
						<br>
						<table class="maTable">
							<tr>
								<td class="numBus" style="background-color: rgb(244, 0, 2);">78</td>
								<td class="infoBus">Université Paul Sabatier / St Orens Lycée
									<div class=icone style="float: right;">
										<img id=like78facPharma class="clic" src="pictures/like.png"
											alt="Like" height="30" width="30" onclick="like('78');"> <span
											id="nbLike78facPharma"></span><img id=unlike78facPharma
											class="clic" src="pictures/unlike.png" alt="Unlike"
											height="30" width="30" onclick="unlike('78');"> <span
											id="nbUnlike78facPharma"></span><img id=img78facPharma
											class="clic" style="float: right;" src="pictures/plus.png"
											alt="Velo disponible" height="30" width="30"
											onclick="show_panel('ligne78facPharma', 'img78facPharma');">
									</div>
								</td>
							</tr>
						</table>
						<script type="text/javascript">nbLike('78');</script>
						<script type="text/javascript">nbUnlike('78');</script>
						<div style="display: none;" id="ligne78facPharma"
							class="infosDepart">
							<div class="infosDepartLigne">
								<p class="direction">Université Paul Sabatier :</p>
								<div class="dateDepart">
									<span>2014-04-08 10:46:38</span><br> <span>2014-04-08 11:03:36</span><br>
								</div>
							</div>
							<div class="infosDepartLigne">
								<p class="direction">Saint Orens Lycée :</p>
								<div class="dateDepart">
									<span>2014-04-08 10:55:00</span><br> <span>2014-04-08 11:10:00</span><br>
								</div>
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
</body>
</html>