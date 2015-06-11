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
  UserController::login();
});

$routes->post('/login', function(){
   UserController::handle_login();
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

$routes->post('/sovellus/:id/edit', function($id){
  SovellusController::update($id);
});

$routes->post('/sovellus/:id/destroy', function($id){
  SovellusController::destroy($id);
});

$routes->post('/logout', function(){
  UserController::logout();
});

// toista CRUD:ia varten

  $routes->get('/kayttaja', function() {
  UserController::kayttaja();
});

  $routes->get('/user/uusi', function(){
  UserController::create();
});

  $routes->post('/user', function(){
  UserController::store();
});

  $routes->get('/user/:id', function($id) {
  UserController::find($id);
});

  $routes->get('/user/:id/edit', function($id){
  UserController::edit($id);
});

  $routes->get('/', function() {
  UserController::kayttaja();
  });

  $routes->get('/naytakayttaja', function() {
  UserController::naytakayttaja();
});

  $routes->post('/user/:id/edit', function($id){
  UserController::update($id);
});

  $routes->post('/user/:id/destroy', function($id){
  UserController::destroy($id);
});

