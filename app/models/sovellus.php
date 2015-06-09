<?php

class Sovellus extends BaseModel {
	public $id, $sovellus_id, $nimi, $url, $lyhytkuvaus, $status, $lisatty, $kuvaus;

	public function __construct($attributes){
    parent::__construct($attributes);
    $this->validators = array('validoinimi', 'validoiurl', 'validoilyhytkuvaus');
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
  		$query = DB::connection()->prepare('INSERT INTO Sovellus (nimi, url, lyhytkuvaus, lisatty, status) VALUES (:nimi, :url, :lyhytkuvaus, NOW(), :status ) RETURNING id');

  		$query->execute(array('nimi' => $this->nimi, 'url' => $this->url, 'lyhytkuvaus' => $this->lyhytkuvaus, 'status' => $this->status));

  		$row = $query->fetch();

  		$this->id = $row['id'];
  	}

    public function update() {
      $query = DB::connection()->prepare('UPDATE Sovellus SET nimi=:nimi, url=:url, lyhytkuvaus=:lyhytkuvaus, status=:status WHERE id=:id');

      $query->execute(array('id' => $this->id, 'nimi' => $this->nimi, 'url' => $this->url, 'lyhytkuvaus' => $this->lyhytkuvaus, 'status' => $this->status));

      $row = $query->fetch();

     
    }

    public function destroy($id) {
     $query = DB::connection()->prepare('DELETE FROM Sovellus WHERE id = :id');
      $query->execute(array('id' => $this->id));
    }

    public function validoinimi() {
      $errors = array();
      if($this->nimi == '' || $this->nimi == null) {
        $errors[] = 'Nimi ei saa olla tyhjä.';
      }
      if(strlen($this->nimi) < 2) {
        $errors[] = 'Nimen pituuden tulee olla vähintään kaksi merkkiä.';
      }
      return $errors;
    }

    public function validoiurl() {
      $errors = array();
      if($this->url == '' || $this->url == null) {
        $errors[] = 'URL ei saa olla tyhjä.';
      }
      if(strlen($this->url) < 4) {
        $errors[] = 'URL:n pituuden tulee olla vähintään neljä merkkiä.';
      }
      return $errors;
    }

    public function validoilyhytkuvaus() {
      $errors = array();
      if($this->lyhytkuvaus == '' || $this->lyhytkuvaus == null) {
        $errors[] = 'Lyhyt kuvaus ei saa olla tyhjä.';
      }
      if(strlen($this->lyhytkuvaus) < 4) {
        $errors[] = 'Lyhyen kuvauksen pituuden tulee olla vähintään neljä merkkiä.';
      }
      return $errors;
    }



    
}