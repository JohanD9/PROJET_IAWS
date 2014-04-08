<?php
/*********************************************************************************************
 * 				FONCTIONS POUR LES UTILISATEURS
* *******************************************************************************************
*/
function addUserLine($login, $shortname, $like, $unlike) {
	$ch = curl_init ();
	$userLine = array (
			'like' => $like,
			'unlike' => $unlike 
	);
	
	$payload = json_encode ( $userLine );
	
	curl_setopt ( $ch, CURLOPT_URL, 'http://localhost:5984/looppastonbus/' . $login . "_" . $shortname );
	curl_setopt ( $ch, CURLOPT_CUSTOMREQUEST, 'PUT' ); /* or PUT */
	curl_setopt ( $ch, CURLOPT_POSTFIELDS, $payload );
	curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, true );
	curl_setopt ( $ch, CURLOPT_HTTPHEADER, array (
			'Content-type: application/json',
			'Accept: */*' 
	) );
	$response = curl_exec ( $ch );
	curl_close ( $ch );
}
function deleteUserLine($login, $shortname) {
	$ch = curl_init ();
	$database = 'looppastonbus';
	$documentID = $login . "_" . $shortname;
	
	curl_setopt ( $ch, CURLOPT_URL, sprintf ( 'http://localhost:5984/%s/%s?rev=%s', $database, $documentID, getRevision ( $documentID ) ) );
	curl_setopt ( $ch, CURLOPT_CUSTOMREQUEST, 'DELETE' );
	curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, true );
	curl_setopt ( $ch, CURLOPT_HTTPHEADER, array (
			'Content-type: application/json',
			'Accept: */*' 
	) );
	$response = curl_exec ( $ch );
	curl_close ( $ch );
}
function getUserLine($login, $shortname) {
	$ch = curl_init ();
	$documentID = $login . "_" . $shortname;
	curl_setopt ( $ch, CURLOPT_URL, 'http://localhost:5984/looppastonbus/' . $documentID );
	curl_setopt ( $ch, CURLOPT_CUSTOMREQUEST, 'GET' );
	curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, true );
	curl_setopt ( $ch, CURLOPT_HTTPHEADER, array (
			'Content-type: application/json',
			'Accept: */*' 
	) );
	$response = curl_exec ( $ch );
	curl_close ( $ch );
	return $response;
}

function getUserLike($login, $shortname) {
	$json = getUserLine ( $login, $shortname );
	$like = json_decode ( $json, true );
	
	if (isset ( $like ['like'] )) {
		$res = $like ['like'];
	} else {
		addUserLine ( $login, $shortname, 0, 0);
		$res = 0;
	}
	return $res;
}
function getUserUnlike($login, $shortname) {
	$json = getUserLine ( $login, $shortname );
	$unlike = json_decode ( $json, true );
	
	if (isset ( $unlike ['unlike'] )) {
		$res = $unlike ['unlike'];
	} else {
		addUserLine ( $login, $shortname, 0, 0);
		$res = 0;
	}
	return $res;
}


function addUserUnlike($login, $shortname) {
	$like = getUserLike($login, $shortname);
	deleteUserLine($login, $shortname);
	addUserLine($login, $shortname, $like, 1);
}

function addUserLike($login, $shortname) {
	$unlike = getUserUnlike($login, $shortname);
	deleteUserLine($login, $shortname);
	addUserLine($login, $shortname, 1, $unlike);
}

/*********************************************************************************************
 * 				FONCTIONS POUR LES LIGNES
* *******************************************************************************************
*/

function addDocument($shortname, $like, $unlike) {
	$ch = curl_init ();
	$ligne = array (
			'shortname' => $shortname,
			'like' => $like,
			'unlike' => $unlike
	);
	$payload = json_encode ( $ligne );

	curl_setopt ( $ch, CURLOPT_URL, 'http://localhost:5984/looppastonbus/' . $ligne ['shortname'] );
	curl_setopt ( $ch, CURLOPT_CUSTOMREQUEST, 'PUT' ); /* or PUT */
	curl_setopt ( $ch, CURLOPT_POSTFIELDS, $payload );
	curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, true );
	curl_setopt ( $ch, CURLOPT_HTTPHEADER, array (
	'Content-type: application/json',
	'Accept: */*'
			) );
			$response = curl_exec ( $ch );
			curl_close ( $ch );
}

function getDocument($shortnamme) {
	$ch = curl_init ();
	$documentID = $shortnamme;
	curl_setopt ( $ch, CURLOPT_URL, 'http://localhost:5984/looppastonbus/' . $documentID );
	curl_setopt ( $ch, CURLOPT_CUSTOMREQUEST, 'GET' );
	curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, true );
	curl_setopt ( $ch, CURLOPT_HTTPHEADER, array (
			'Content-type: application/json',
			'Accept: */*' 
	) );
	$response = curl_exec ( $ch );
	curl_close ( $ch );
	return $response;
}

function deleteDocument($shortname) {
	$ch = curl_init ();
	$database = 'looppastonbus';
	$documentID = $shortname;
	
	curl_setopt ( $ch, CURLOPT_URL, sprintf ( 'http://localhost:5984/%s/%s?rev=%s', $database, $documentID, getRevision ( $shortname ) ) );
	curl_setopt ( $ch, CURLOPT_CUSTOMREQUEST, 'DELETE' );
	curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, true );
	curl_setopt ( $ch, CURLOPT_HTTPHEADER, array (
			'Content-type: application/json',
			'Accept: */*' 
	) );
	$response = curl_exec ( $ch );
	curl_close ( $ch );
}

function getRevision($shortname) {
	$json = getDocument ( $shortname );
	$res = json_decode ( $json, true );
	return $res ['_rev'];
}

function getLineLike($shortname) {
	$json = getDocument ( $shortname );
	$ligne = json_decode ( $json, true );
	
	if (isset ( $ligne ['like'] )) {
		$res = $ligne ['like'];
	} else {
		addDocument ( $shortname, 0, 0 );
		$res = 0;
	}
	return $res;
}

function getLineUnlike($shortname) {
	$json = getDocument ( $shortname );
	$ligne = json_decode ( $json, true );
	
	if (isset ( $ligne ['unlike'] )) {
		$res = $ligne ['unlike'];
	} else {
		addDocument ( $shortname, 0, 0 );
		$res = 0;
	}
	return $res;
}

function addLineLike($login, $shortname) {
	$like = getLineLike ( $shortname );
	$unlike = getLineUnlike ( $shortname );
	
	//return $like . "_" . $unlike;
	
	if (getUserLike($login, $shortname) == 0) {
		$like += 1;
		deleteDocument ( $shortname );
		addDocument ($shortname, $like, $unlike );
		addUserLike($login, $shortname);
	}
	
	return $like;
}

function addLineUnlike($login, $shortname) {
	$like = getLineLike ( $shortname );
	$unlike = getLineUnlike ( $shortname );
	
	if (getUserUnlike($login, $shortname) == 0) {
		$unlike += 1;
		deleteDocument ( $shortname );
		addDocument ($shortname, $like, $unlike );
		addUserUnlike($login, $shortname);
	}
	
	return $unlike;
}
  	
  	