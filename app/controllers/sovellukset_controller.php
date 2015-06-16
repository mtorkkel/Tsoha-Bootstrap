<?php
class SovellusController extends BaseController {
	public static function index() {
    self::check_logged_in();
		$sovellukset = Sovellus::all();

		View::make('views/suunnitelmat/sovelluslista.html', array('sovellukset' => $sovellukset));
		
	}

	public static function store(){
    self::check_logged_in();
    
    $params = $_POST;
      $attributes = array(
      'nimi' => $params['nimi'],
      'url' => $params['url'],
      'lyhytkuvaus' => $params['lyhytkuvaus'],
      'lisatty' => $params['lisatty']
    ); 
    if (iSSET($params['status'])){
      $attributes['status']=1;
     } else {
      $attributes['status']=0;
    }


    $sovellus = new Sovellus($attributes);
    $errors = $sovellus->errors();

    if(count($errors) == 0) {
      $sovellus->save();
      Redirect::to('/sovellus/' . $sovellus->id, array('message' => 'Sovellus on lisätty sovelluslistaasi!'));
    } else {
      View::make('sovellus/uusi.html', array('errors' => $errors, 'attributes' => $attributes));
    }
  }

  public static function find($id) {
    self::check_logged_in();
		$sovellus = Sovellus::find($id);
		// Kint::dump($sovellus);
		View::make('naytasovellus.html', array('sovellus' => $sovellus));
		
	}

  public static function edit($id){
    self::check_logged_in();
    $sovellus = Sovellus::find($id);
    View::make('muokkaasovellus.html', array('sovellus' => $sovellus));
  }

  public static function update($id){
    self::check_logged_in();
    $params = $_POST;
    // Kint::dump($params);
    $attributes = array(
      'id' => $id,
      'nimi' => $params['nimi'],
      'url' => $params['url'],
      'lyhytkuvaus' => $params['lyhytkuvaus'],
      'status' => $params['status']
        );

    $sovellus = new Sovellus($attributes);
    $errors = $sovellus->errors();

    if(count($errors) > 0){
      View::make('muokkaasovellus.html', array('errors' => $errors, 'attributes' => $attributes));
    }else{
      $sovellus->update();

      Redirect::to('/sovellus/' . $sovellus->id, array('message' => 'Sovellusta on muokattu onnistuneesti!'));
    }
  }


  public static function destroy($id){
    self::check_logged_in();
    $sovellus = new Sovellus(array('id' => $id));
    $sovellus->destroy($id);
    Redirect::to('/sovelluslista', array('message' => 'Sovellus on poistettu onnistuneesti!'));
  }

	public static function sovelluslista(){
    $sovellukset = Sovellus::all();
    View::make('suunnitelmat/sovelluslista.html', array('sovellukset' => $sovellukset));
    // Kint::dump($sovellukset);
  }

  public static function login(){
    View::make('suunnitelmat/login.html');
  }

   public static function create(){
    View::make('sovellus/uusi.html');
  }
}
