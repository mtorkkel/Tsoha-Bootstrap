<?php

  $routes->get('/', function() {
    HelloWorldController::index();
  });

  $routes->get('/hiekkalaatikko', function() {
    HelloWorldController::sandbox();
  });

  $routes->get('/sovelluslista', function() {
  SovellusController::sovelluslista();
});

  $routes->get('/sovelluslista_nayta', function() {
  SovellusController::sovelluslista_nayta();
});

$routes->get('/login', function() {
  SovellusController::login();
});

$routes->get('/sovelluslista_muokkaus', function() {
  SovellusController::sovelluslista_muokkaus();
});

$routes->get('/sovellus', function() {
  SovellusController::sovelluslista();
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

$routes->get('/sovellus/:id/edit', function(){
  SovellusController::sovelluslista_muokkaus();
});

$routes->get('/sovellus/:id/edit', function($id){
  SovellusController::find($id);
});

