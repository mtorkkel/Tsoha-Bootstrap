<?php
class UserController extends BaseController{
  public static function login(){
      View::make('suunnitelmat/login.html');
  }
  public static function handle_login(){
    $params = $_POST;

    $user = User::authenticate($params['kayttajatunnus'], $params['salasana']);

    if(!$user){
      View::make('suunnitelmat/login.html', array('error' => 'Väärä käyttäjätunnus tai salasana!', 'kayttajatunnus' => $params['kayttajatunnus']));
    }else{
      $_SESSION['user'] = $user->id;

      Redirect::to('/', array('message' => 'Tervetuloa takaisin ' . $user->nimi . '!'));
    }
  }

    public static function logout(){
    $_SESSION['user'] = null;
    Redirect::to('/login', array('message' => 'Olet kirjautunut ulos!'));
  }


// toista CRUD:ia varten

  public static function kayttaja(){
    self::check_logged_in();
    $users = User::all();
    View::make('kayttaja.html', array('users' => $users));
    // Kint::dump($users);
  }

  public static function create(){
    self::check_logged_in();
    View::make('user/uusi.html');
  }

  public static function store(){
    self::check_logged_in();
    
    $params = $_POST;
      $attributes = array(
      'nimi' => $params['nimi'],
      'salasana' => $params['salasana']
      );

    $user = new User($attributes);
    //$errors = $sovellus->errors();

    //if(count($errors) == 0) {
      $user->save();
      Redirect::to('/user/' . $user->id, array('message' => 'Käyttäjä on lisätty!'));
    //} else {
      //View::make('sovellus/uusi.html', array('errors' => $errors, 'attributes' => $attributes));
    //}
}

  public static function find($id) {
    self::check_logged_in();
    $user = User::find($id);
    // Kint::dump($user);
    View::make('naytakayttaja.html', array('user' => $user));
    
  }

    public static function edit($id){
    self::check_logged_in();
    $user = User::find($id);
    View::make('muokkaakayttaja.html', array('user' => $user));
  }

    public static function update($id){
    self::check_logged_in();
    $params = $_POST;
    // Kint::dump($params);
    $attributes = array(
      'id' => $id,
      'nimi' => $params['nimi'],
      'salasana' => $params['salasana']
      );

    $user = new User($attributes);
    // $errors = $user->errors();

    // if(count($errors) > 0){
      // View::make('muokkaakayttaja.html', array('errors' => $errors, 'attributes' => $attributes));
    // }else{
      $user->update();

      Redirect::to('/user/' . $user->id, array('message' => 'Käyttäjää on muokattu onnistuneesti!'));
    //}
  }

    public static function destroy($id){
    self::check_logged_in();
    $user = new User(array('id' => $id));
    $user->destroy($id);
    Redirect::to('/kayttaja', array('message' => 'Käyttäjä on poistettu onnistuneesti!'));
  } 
}