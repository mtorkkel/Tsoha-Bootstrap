<?php

class User extends BaseModel {
	public $id, $nimi, $salasana;

	public function authenticate() {
	$query = DB::connection()->prepare('SELECT * FROM Opettaja WHERE nimi = :nimi AND salasana = :salasama LIMIT 1', array('nimi' => $nimi, 'salasana' => $salasana));
	$query->execute();
	$row = $query->fetch();
	if($row){
		$user_id = $_SESSION['user'];
       	$user = User::find($user_id);

      return $user;
  	  // Käyttäjä löytyi, palautetaan löytynyt käyttäjä oliona
	}
	return null;
  	// Käyttäjää ei löytynyt, palautetaan null
	}
	
	}
	