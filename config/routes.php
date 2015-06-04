<?php

  $routes->get('/', function() {
    SovellusController::sovelluslista();
  });

  $routes->get('/hiekkalaatikko', function() {
    HelloWorldController::sandbox();
  });

  $routes->get('/sovelluslista', function() {
  SovellusController::sovelluslista();
});

  $routes->get('/naytasovellus', function() {
  SovellusController::naytasovellus();
});

$routes->get('/login', function() {
  SovellusController::login();
});

$routes->get('/', function() {
  SovellusController::sovelluslista();
});

$routes->get('/sovellus/uusi', function(){
  SovellusController::create();
});

$routes->get('/sovellus/:id', function($id) {
  SovellusController::find($id);
});

$routes->post('/sovellus', function(){
  SovellusController::store();
});


$routes->get('/sovellus/:id/edit', function($id){
  SovellusController::edit($id);
});


$routes->post('/sovellus/:id/destroy', function($id){
  SovellusController::destroy($id);
});



