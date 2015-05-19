<?php

  class HelloWorldController extends BaseController{

    public static function index(){
      // make-metodi renderöi app/views-kansiossa sijaitsevia tiedostoja
      echo 'Tämä on etusivu!';
    }

    public static function sandbox(){
      // Testaa koodiasi täällä
      View::make('helloworld.html');
    }

    public static function sovelluslista(){
    View::make('suunnitelmat/sovelluslista.html');
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
  }
