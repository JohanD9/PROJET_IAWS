var stationTab = ["paulSab", "facPharma"];

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

//Function to display or hide an admin panel
function show_panel(id, idImg) {
    var div = document.getElementById(id);
    var img = document.getElementById(idImg);

    if (div.style.display === "block") {
        div.style.display = "none";
        img.src="pictures/plus.png";
    }
    else {
        div.style.display = "block";
        img.src="pictures/moins.png";
    }
}

function updateLignes() {
	var station =document.getElementById('arret').value
	
	for(var i= 0; i < stationTab.length; i++)
	{
		document.getElementById(stationTab[i]).style.display = "none";
	}
	
	document.getElementById(station).style.display = "block";
}


function refreshBus() {
	for(var i= 0; i < stationTab.length; i++)
	{
		if (document.getElementById(stationTab[i]).style.display === "block") {
			var tmp = stationTab[i];
		}
			
	}
	var xhr = getXMLHttpRequest();

    xhr.open("GET", "/LoopPasTonBus/php/updateLigne.php", false);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.send(null);

    var rep = xhr.responseText;
	document.getElementById('contenuBus').innerHTML = rep;
	document.getElementById('arret').value=tmp;
	updateLignes();
	
}

function like(idImg) {
	for(var i= 0; i < stationTab.length; i++)
	{
		var imgLike = document.getElementById("like"+idImg+stationTab[i]);
		var imgUnlike = document.getElementById("unlike"+idImg+stationTab[i]);
		imgLike.src="pictures/like_NB.png";
		imgUnlike.src="pictures/unlike.png";
			
	}	
}

function unlike(idImg) {
	for(var i= 0; i < stationTab.length; i++)
	{
		var imgLike = document.getElementById("like"+idImg+stationTab[i]);
		var imgUnlike = document.getElementById("unlike"+idImg+stationTab[i]);

		imgLike.src="pictures/like.png";
		imgUnlike.src="pictures/unlike_NB.png";
	}	
}

function likeMetro(idImg) {
		var imgLike = document.getElementById("like"+idImg);
		var imgUnlike = document.getElementById("unlike"+idImg);
		imgLike.src="pictures/like_NB.png";
		imgUnlike.src="pictures/unlike.png";
}


function unlikeMetro(idImg) {
		var imgLike = document.getElementById("like"+idImg);
		var imgUnlike = document.getElementById("unlike"+idImg);
		imgLike.src="pictures/like.png";
		imgUnlike.src="pictures/unlike_NB.png";
}
