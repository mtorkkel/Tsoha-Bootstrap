<?php
class SovellusController extends BaseController {
	public static function index() {
		$sovellukset = Sovellus::all();

		View::make('views/suunnitelmat/sovelluslista.html', array('sovellukset' => $sovellukset));
		
	}

	public static function store(){
    
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
		$sovellus = Sovellus::find($id);
		Kint::dump($sovellus);
		View::make('naytasovellus.html', array('sovellus' => $sovellus));
		
	}

  public static function edit($id){
    $sovellus = Sovellus::find($id);
    View::make('muokkaasovellus.html', array('sovellus' => $sovellus));
  }

  public static function update($id){
    $params = $_POST;
    Kint::dump($params);
    $attributes = array(
      'id' => $id,
      'nimi' => $params['nimi'],
      'url' => $params['url'],
      'lyhytkuvaus' => $params['lyhytkuvaus']
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
    $sovellus = new Sovellus(array('id' => $id));
    $sovellus->destroy($id);
    Redirect::to('/sovelluslista', array('message' => 'Sovellus on poistettu onnistuneesti!'));
  }

	public static function sovelluslista(){
    $sovellukset = Sovellus::all();
    View::make('suunnitelmat/sovelluslista.html', array('sovellukset' => $sovellukset));
    Kint::dump($sovellukset);
  }

  public static function login(){
    View::make('suunnitelmat/login.html');
  }

   public static function create(){
    View::make('sovellus/uusi.html');
  }
}
