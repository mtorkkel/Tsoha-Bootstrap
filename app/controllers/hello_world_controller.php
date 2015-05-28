<?php

  require 'app/models/sovellus.php';
  class HelloWorldController extends BaseController{

    public static function index(){
      // make-metodi renderöi app/views-kansiossa sijaitsevia tiedostoja
      echo 'Tämä on etusivu!';
    }

    public static function sandbox(){
      // Testaa koodiasi täällä
      $skyrim = Sovellus::find(1);
      $sovellukset = Sovellus::all(1);
      //Kint-luokan dump-metodi tulostaa muuttujan arvon
      Kint::dump($sovellukset);
      Kint::dump($skyrim);
      View::make('helloworld.html');
    }


  }
