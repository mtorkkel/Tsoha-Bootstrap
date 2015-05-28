<?php
class SovellusController extends BaseController {
	public static function index() {
		$sovellukset = Sovellus::all();

		View::make('views/suunnitelmat/sovelluslista.html', array('sovellukset' => $sovellukset));
		
	}

	public static function store(){
    
    $params = $_POST;
    
    $sovellus = new Sovellus(array(
      'nimi' => $params['nimi'],
      'url' => $params['url'],
      'lyhytkuvaus' => $params['lyhytkuvaus'],
      'lisatty' => $params['lisatty']
    ));

    
    $sovellus->save();

    
    Redirect::to('/sovellus/' . $sovellus->id, array('message' => 'Sovellus on lisätty sovelluslistaasi!'));
  }

  public static function find($id) {
		$sovellus = Sovellus::find($id);
		Kint::dump($sovellus);
		View::make('naytasovellus.html', array('sovellus' => $sovellus));
		
	}

	public static function sovelluslista(){
    $sovellukset = Sovellus::all();
    View::make('suunnitelmat/sovelluslista.html', array('sovellukset' => $sovellukset));
    Kint::dump($sovellukset);
  }

    public static function sovelluslista_nayta(){
    View::make('suunnitelmat/sovelluslista_nayta.html');
  }

  public static function login(){
    View::make('suunnitelmat/login.html');
  }

  public static function sovelluslista_muokkaus(){
    View::make('suunnitelmat/sovelluslista_muokkaus.html');
  }

   public static function create(){
    View::make('sovellus/uusi.html');
  }
}
