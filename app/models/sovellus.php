<?php

class Sovellus extends BaseModel {
	public $id, $sovellus_id, $nimi, $url, $lyhytkuvaus, $status, $lisatty, $kuvaus;

	public function __construct($attributes){
    parent::__construct($attributes);
	}
  
  // $skyrim = new Sovellus(array('id' => 1, 'nimi' => 'Kahoot', 'lyhytkuvaus' => 'Kyselytyökalu'));

  	public static function all() {
  		$query = DB::connection()->prepare('SELECT * FROM Sovellus');

  		$query->execute();

  		$rows = $query->fetchAll();
  		$sovellukset = array();

  		foreach($rows as $row) {

  			$sovellukset[] = new Sovellus(array(
  				'id' => $row['id'],
  				'sovellus_id' => $row['sovellus_id'],
  				'nimi' => $row['nimi'],
  				'url' => $row['url'],
  				'lyhytkuvaus' => $row['lyhytkuvaus'],
  				'status' => $row['status'],
  				'lisatty' => $row['lisatty'],
          'kuvaus' => $row['kuvaus']
  				));
  		}
  		Kint::dump($sovellukset);
  		return $sovellukset;


  	}

  	public static function find($id) {
  		$query = DB::connection()->prepare('SELECT * FROM Sovellus WHERE id = :id LIMIT 1');
  		$query->execute(array('id' => $id));
  		$row = $query->fetch();

  		if($row) {
  			$sovellus = new Sovellus(array(
  				'id' => $row['id'],
  				'sovellus_id' => $row['sovellus_id'],
  				'nimi' => $row['nimi'],
  				'url' => $row['url'],
  				'lyhytkuvaus' => $row['lyhytkuvaus'],
  				'status' => $row['status'],
  				'lisatty' => $row['lisatty'],
          'kuvaus' => $row['kuvaus']
  				));

  				return $sovellus;
  		}

  		return null;
  	}

  	public function save() {
  		$query = DB::connection()->prepare('INSERT INTO Sovellus (nimi, url, lyhytkuvaus, lisatty) VALUES (:nimi, :url, :lyhytkuvaus, NOW() ) RETURNING id');

  		$query->execute(array('nimi' => $this->nimi, 'url' => $this->url, 'lyhytkuvaus' => $this->lyhytkuvaus));

  		$row = $query->fetch();

  		$this->id = $row['id'];
  	}
}