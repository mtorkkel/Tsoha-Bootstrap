<?php

  $routes->get('/', function() {
    HelloWorldController::index();
  });

  $routes->get('/hiekkalaatikko', function() {
    HelloWorldController::sandbox();
  });

  $routes->get('/sovelluslista', function() {
  HelloWorldController::sovelluslista();
});

  $routes->get('/sovelluslista_nayta', function() {
  HelloWorldController::sovelluslista_nayta();
});

$routes->get('/login', function() {
  HelloWorldController::login();
});

$routes->get('/sovelluslista_muokkaus', function() {
  HelloWorldController::sovelluslista_muokkaus();
});
