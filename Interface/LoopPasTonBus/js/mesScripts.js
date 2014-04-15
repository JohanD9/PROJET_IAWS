var stationTab = [ "paulSab", "facPharma" ];

// Function to get a XMLHttpRequest object
function getXMLHttpRequest() {
	var xhr = null;

	if (window.XMLHttpRequest || window.ActiveXObject) {
		if (window.ActiveXObject) {
			try {
				xhr = new ActiveXObject("Msxml2.XMLHTTP");
			} catch (e) {
				xhr = new ActiveXObject("Microsoft.XMLHTTP");
			}
		} else {
			xhr = new XMLHttpRequest();
		}
	} else {
		alert("Votre navigateur ne supporte pas l'objet XMLHTTPRequest.");
		return null;
	}

	return xhr;
}

// Function to display or hide an admin panel
function show_panel(id, idImg) {
	var div = document.getElementById(id);
	var img = document.getElementById(idImg);

	if (div.style.display === "block") {
		div.style.display = "none";
		img.src = "pictures/plus.png";
	} else {
		div.style.display = "block";
		img.src = "pictures/moins.png";
	}
}

function updateLignes() {
	var station = document.getElementById('arret').value

	for ( var i = 0; i < stationTab.length; i++) {
		document.getElementById(stationTab[i]).style.display = "none";
	}

	document.getElementById(station).style.display = "block";
}

function refreshBus() {
	for ( var i = 0; i < stationTab.length; i++) {
		if (document.getElementById(stationTab[i]).style.display === "block") {
			var tmp = stationTab[i];
		}

	}
	/*
	 * var xhr = getXMLHttpRequest();
	 * 
	 * xhr.open("GET", "/LoopPasTonBus/php/updateLigne.php", false);
	 * xhr.setRequestHeader("Content-Type",
	 * "application/x-www-form-urlencoded"); xhr.send(null);
	 * 
	 * var rep = xhr.responseText;
	 * document.getElementById('contenuBus').innerHTML = rep;
	 */
	window.location.reload();
	document.getElementById('arret').value = tmp;
	updateLignes();

}

function like(idImg) {
	for ( var i = 0; i < stationTab.length; i++) {
		var imgLike = document.getElementById("like" + idImg + stationTab[i]);
		if (imgLike != null) {
			imgLike.src = "pictures/like_NB.png";
		}
	}

	var xhr = getXMLHttpRequest();
	xhr.open("GET", "/LoopPasTonBus/php/likeUnlike.php?shortname=" + idImg
			+ "&action=addLike", false);
	xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	xhr.send(null);
	var rep = xhr.responseText;

	for (i = 0; i < stationTab.length; i++) {
		var doc = document.getElementById('nbLike' + idImg + stationTab[i]);
		if (doc != null) {
			doc.innerHTML = rep;
		}
	}

}

function unlike(idImg) {

	for ( var i = 0; i < stationTab.length; i++) {
		var imgUnlike = document.getElementById("unlike" + idImg
				+ stationTab[i]);
		if (imgUnlike != null) {
			imgUnlike.src = "pictures/unlike_NB.png";
		}
	}

	var xhr = getXMLHttpRequest();

	xhr.open("GET", "/LoopPasTonBus/php/likeUnlike.php?shortname=" + idImg
			+ "&action=addUnlike", false);
	xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	xhr.send(null);
	var rep = xhr.responseText;

	for (i = 0; i < stationTab.length; i++) {
		var doc = document.getElementById('nbUnlike' + idImg + stationTab[i]);
		if (doc != null) {
			doc.innerHTML = rep;
		}
	}

}

function likeMetro(idImg) {

	var imgUnlike = document.getElementById("like" + idImg);
	if (imgUnlike != null) {
		imgUnlike.src = "pictures/like_NB.png";
	}

	var xhr = getXMLHttpRequest();

	xhr.open("GET", "/LoopPasTonBus/php/likeUnlike.php?shortname=" + idImg
			+ "&action=addLike", false);
	xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	xhr.send(null);
	var rep = xhr.responseText;

	var doc = document.getElementById('nbLike' + idImg);
	if (doc != null) {
		doc.innerHTML = rep;
	}
}

function unlikeMetro(idImg) {

	imgUnlike = document.getElementById("unlike" + idImg);
	imgUnlike.src = "pictures/unlike_NB.png";

	var xhr = getXMLHttpRequest();

	xhr.open("GET", "/LoopPasTonBus/php/likeUnlike.php?shortname=" + idImg
			+ "&action=addUnlike", false);
	xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	xhr.send(null);
	var rep = xhr.responseText;

	var doc = document.getElementById('nbUnlike' + idImg);
	if (doc != null) {
		doc.innerHTML = rep;
	}
}

function nbLike(shortname) {
	var xhr = getXMLHttpRequest();

	xhr.open("GET", "/LoopPasTonBus/php/likeUnlike.php?shortname=" + shortname
			+ "&action=getLike", false);
	xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	xhr.send(null);
	var rep = xhr.responseText;

	xhr.open("GET", "/LoopPasTonBus/php/likeUnlike.php?shortname=" + shortname
			+ "&action=getUserLike", false);
	xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	xhr.send(null);
	var rep2 = xhr.responseText;

	for ( var i = 0; i < stationTab.length; i++) {
		document.getElementById('nbLike' + shortname + stationTab[i]).innerHTML = rep;

		// Teste si l'utilisateur aime deja cette ligne
		if (rep2 == 1) {
			document.getElementById("like" + shortname + stationTab[i]).src = "pictures/like_NB.png";
		}
	}
}

function nbUnlike(shortname) {
	var xhr = getXMLHttpRequest();

	xhr.open("GET", "/LoopPasTonBus/php/likeUnlike.php?shortname=" + shortname
			+ "&action=getUnlike", false);
	xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	xhr.send(null);
	var rep = xhr.responseText;

	for ( var i = 0; i < stationTab.length; i++) {
		document.getElementById('nbUnlike' + shortname + stationTab[i]).innerHTML = rep;

		// Teste si l'utilisateur aime deja cette
		// lignewindow.open('/LoopPasTonBus/php/popup.php','INFOS','menubar=no,
		// scrollbars=no, top='+top+', left='+left+', width='+width+',
		// height='+height+'');
		xhr.open("GET", "/LoopPasTonBus/php/likeUnlike.php?shortname="
				+ shortname + "&action=getUserUnlike", false);
		xhr.setRequestHeader("Content-Type",
				"application/x-www-form-urlencoded");
		xhr.send(null);
		var rep2 = xhr.responseText;

		if (rep2 == 1) {
			document.getElementById("unlike" + shortname + stationTab[i]).src = "pictures/unlike_NB.png";
		}
	}
}

function nbLikeMetro(shortname) {
	var xhr = getXMLHttpRequest();

	xhr.open("GET", "/LoopPasTonBus/php/likeUnlike.php?shortname=" + shortname
			+ "&action=getLike", false);
	xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	xhr.send(null);
	var rep = xhr.responseText;

	xhr.open("GET", "/LoopPasTonBus/php/likeUnlike.php?shortname=" + shortname
			+ "&action=getUserLike", false);
	xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	xhr.send(null);
	var rep2 = xhr.responseText;

	document.getElementById('nbLike' + shortname).innerHTML = rep;

	// Teste si l'utilisateur aime deja cette ligne
	if (rep2 == 1) {
		document.getElementById("like" + shortname).src = "pictures/like_NB.png";
	}

}

function nbUnlikeMetro(shortname) {
	var xhr = getXMLHttpRequest();

	xhr.open("GET", "/LoopPasTonBus/php/likeUnlike.php?shortname=" + shortname
			+ "&action=getUnlike", false);
	xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	xhr.send(null);
	var rep = xhr.responseText;

	document.getElementById('nbUnlike' + shortname).innerHTML = rep;

	// Teste si l'utilisateur aime deja cette
	// lignewindow.open('/LoopPasTonBus/php/popup.php','INFOS','menubar=no,
	// scrollbars=no, top='+top+', left='+left+', width='+width+',
	// height='+height+'');
	xhr.open("GET", "/LoopPasTonBus/php/likeUnlike.php?shortname=" + shortname
			+ "&action=getUserUnlike", false);
	xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	xhr.send(null);
	var rep2 = xhr.responseText;

	if (rep2 == 1) {
		document.getElementById("unlike" + shortname).src = "pictures/unlike_NB.png";
	}
}

function getTrajet() {
	document.getElementById("infosTrajetBusVelo").style.display = "block";
	var xhr = getXMLHttpRequest();
	var dep = document.getElementById("arretVelosBus").value;
	var arr = document.getElementById("arriveeZone").value;
	var villeArr = document.getElementById("villeArriveeZone").value;

	var url = "/LoopPasTonBus/php/infosVelosBus.php?dep=" + dep + "&arr=" + arr
			+ "&villeArr=" + villeArr;

	xhr.open("GET", url, false);
	xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	xhr.send(null);
	var rep = xhr.responseText;
	document.getElementById("infosTrajetBusVelo").innerHTML = rep;
}

function pop(num) {
	largeur = 500;
	hauteur = 500;
	var top = (screen.height - hauteur) / 2;
	var left = (screen.width - largeur) / 2;
	var content = document.getElementById('infosContent' + num).innerHTML;
	var page = '/LoopPasTonBus/php/popup.php?content='+content;
	window.open(
					page,
					'INFOS',
					"top="
							+ top
							+ ",left="
							+ left
							+ ",width="
							+ largeur
							+ ",height="
							+ hauteur
							+ ",titlebar=0,directories=0,location=0,menubar=0,resizable=0,scrollbars=1,status=0,toolbar=0");
}
