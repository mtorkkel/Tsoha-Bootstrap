<?php

class User extends BaseModel {
	public $id, $nimi, $salasana;

	public function authenticate($kayttajatunnus, $salasana) {
	$query = DB::connection()->prepare('SELECT * FROM Opettaja WHERE nimi = :nimi AND salasana = :salasana LIMIT 1');
	$query->execute(array('nimi' => $kayttajatunnus, 'salasana' => $salasana));
	$row = $query->fetch();
	if($row){
		$user = new User(array(
  				'id' => $row['id'],
  				'nimi' => $row['nimi'],
  				'salasana' => $row['salasana']
  				));

      return $user;
  	  // Käyttäjä löytyi, palautetaan löytynyt käyttäjä oliona
	}
	return null;
  	// Käyttäjää ei löytynyt, palautetaan null
	}

	  	public static function find($id) {
  		$query = DB::connection()->prepare('SELECT * FROM Opettaja WHERE id = :id LIMIT 1');
  		$query->execute(array('id' => $id));
  		$row = $query->fetch();

  		if($row) {
  			$user = new User(array(
  				'id' => $row['id'],
  				'nimi' => $row['nimi'],
  				'salasana' => $row['salasana']
  				));

  				return $user;
  		}

  		return null;
  	}
	
	}
	