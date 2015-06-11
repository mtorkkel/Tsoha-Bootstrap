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


    //toista CRUD:ia varten seuraavat

  	  	public static function all() {
  		$query = DB::connection()->prepare('SELECT * FROM Opettaja');

  		$query->execute();

  		$rows = $query->fetchAll();
  		$users = array();

  		foreach($rows as $row) {

  			$users[] = new User(array(
  				'id' => $row['id'],
  				'nimi' => $row['nimi'],
  				'salasana' => $row['salasana']
  				));
  		}
  		
  		return $users;


  	}

  	  	public function save() {
  		$query = DB::connection()->prepare('INSERT INTO Opettaja (nimi, salasana) VALUES (:nimi, :salasana ) RETURNING id');

  		$query->execute(array('nimi' => $this->nimi, 'salasana' => $this->salasana));

  		$row = $query->fetch();

  		$this->id = $row['id'];
  	}

    public function update() {
      $query = DB::connection()->prepare('UPDATE Opettaja SET nimi=:nimi, salasana=:salasana WHERE id=:id');

      $query->execute(array('id' => $this->id, 'nimi' => $this->nimi, 'salasana' => $this->salasana));

      $row = $query->fetch();

     
    }

    public function destroy($id) {
     $query = DB::connection()->prepare('DELETE FROM Opettaja WHERE id = :id');
      $query->execute(array('id' => $this->id));
    }
	
	}
	