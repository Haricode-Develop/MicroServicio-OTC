<?php

/** @var \Laravel\Lumen\Routing\Router $router */


$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->get('/territorio-y-clima', 'OtcController@getTerritorioClima');

$router->get('/secciones-territorio', 'OtcController@getSeccionesTerritorio');

$router->get('/secciones_clima', 'OtcController@getSeccionesClima');

$router->get('/apps_territorio', 'OtcController@getAppsTerritorio');

$router->get('/getAllFiles', 'OtcController@getAllFiles');


$router->get('/publicaciones_secciones', 'OtcController@getPublicacionesSecciones');

$router->get('/apps_clima', 'OtcController@getAppsClima');

$router->get('/pagina_inicio', 'OtcController@getPaginaInicio');

$router->get('/centro_de_formacion', 'OtcController@getCentroDeFormacion');

$router->get('/contacto', 'OtcController@getContacto');

$router->get('/pie_de_pagina', 'OtcController@getPieDePagina');

$router->get('/boletines', 'OtcController@getBoletines');

$router->get('/fecha_boletin', 'OtcController@getFechaBoletin');

$router->get('/cabezote', 'OtcController@getCabezote');
$router->get('/hola', 'OtcController@holaMundo');

