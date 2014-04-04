<?php
	function addDocument($shortname, $like, $unlike) {
		$ch = curl_init();
		$ligne = array(
				'shortname' => $shortname,
				'like' => $like,
				'unlike' => $unlike,
		);
		$payload = json_encode($ligne);
		
		curl_setopt($ch, CURLOPT_URL, 'http://localhost:5984/looppastonbus/'.$ligne['shortname']);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT'); /* or PUT */
		curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array(
		'Content-type: application/json',
		'Accept: */*'
				));
		$response = curl_exec($ch);
		curl_close($ch);
	}
	
	function getDocument($shortnamme) {
		$ch = curl_init();
		$documentID = $shortnamme;
		curl_setopt($ch, CURLOPT_URL, 'http://localhost:5984/looppastonbus/'.$documentID);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array(
		'Content-type: application/json',
		'Accept: */*'
		));
		$response = curl_exec($ch);
		curl_close($ch);
		return $response;
	}
	
	function deleteDocument($shortname) {
		$ch = curl_init();
		$database = 'looppastonbus';
		$documentID = $shortname;
		
		curl_setopt($ch, CURLOPT_URL, sprintf('http://localhost:5984/%s/%s?rev=%s', $database, $documentID, getRevision($shortname)));
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'DELETE');
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array(
		'Content-type: application/json',
		'Accept: */*'
		));
		$response = curl_exec($ch);
		curl_close($ch);
	}
	
	function getRevision($shortname) {
		$json = getDocument($shortname);
		$res = json_decode($json,true);
		return $res['_rev'];
	}
	
  	function getLineLike($shortname) {
  		$json = getDocument($shortname);
  		$ligne = json_decode($json,true);
  		
  		if (isset($ligne['like'])) {
  			$res = $ligne['like'];
  		} else {
  			addDocument($shortname, 0, 0);
  			$res = 0;
  		}
  		return $res;  		
  	}
  	
  	function getLineUnlike($shortname) {
  		$json = getDocument($shortname);
  		$ligne = json_decode($json,true);
  	
  		if (isset($ligne['unlike'])) {
  			$res = $ligne['unlike'];
  		} else {
  			addDocument($shortname, 0, 0);
  			$res = 0;
  		}
  		return $res;
  	}
  	
  	function addLineLike($shortname) {
  		$like = getLineLike($shortname);
  		$unlike = getLineUnlike($shortname);
  		$like += 1;
  		
  		deleteDocument($shortname);
  		addDocument($shortname, $like, $unlike);
  		return $like;
  	}
  	
  	function addLineUnlike($shortname) {
  		$like = getLineLike($shortname);
  		$unlike = getLineUnlike($shortname);
  		$unlike += 1;
  	
  		deleteDocument($shortname);
  		addDocument($shortname, $like, $unlike);
  		return $unlike;
  	}
  	
  	/*********************************************************************************************
  	 * 				FONCTION POUR LES UTILISATEURS
  	 * *******************************************************************************************
  	 */
  	
  	function addUser($login, $password) {
  		$ch = curl_init();
  		$user = array(
  				'login' => $login,
  				'password' => $password,
  		);
  		
  		$payload = json_encode($user);
  	
  		curl_setopt($ch, CURLOPT_URL, 'http://localhost:5984/looppastonbus/'.$user['login']);
  		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT'); /* or PUT */
  		curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
  		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  		curl_setopt($ch, CURLOPT_HTTPHEADER, array(
  		'Content-type: application/json',
  		'Accept: */*'
  				));
  				$response = curl_exec($ch);
  				curl_close($ch);
  	}
  	
  	function getUser($login) {
  		$ch = curl_init();
  		$documentID = $login;
  		curl_setopt($ch, CURLOPT_URL, 'http://localhost:5984/looppastonbus/'.$documentID);
  		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
  		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  		curl_setopt($ch, CURLOPT_HTTPHEADER, array(
  		'Content-type: application/json',
  		'Accept: */*'
  				));
  				$response = curl_exec($ch);
  				curl_close($ch);
  				return $response;
  	}
  	
  	function getLogin($login) {
  		$json = getUser($login);
  		$user = json_decode($json,true);
  			
  		if (isset($user['login'])) {
  			$res = $user['login'];
  		} else {
  			$res = "missingLogin";
  		}
  		return $res;
  	}
  	
  	function getPassword($login) {
  		$json = getUser($login);
  		$user = json_decode($json,true);
  		$res = $user['password'];
  		return $res;
  	}
  	
  	function verifyUser($login, $password) {
  		$logintmp = getLogin($login);
  		$passwordtmp = getPassword($login);
  		
  		if (($login != $logintmp) || ($passwordtmp != $password)) {
  			return "badLogin";
  		}
  	}