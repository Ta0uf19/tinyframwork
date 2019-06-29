<?php
/**
 * Routage
 */

Route::set('index', 'IndexController');
Route::set('search', 'IndexController@method');


Route::set('jeudetails', 'JeuxController@details');


Route::set('api/jeux/get', 'JeuxController@get');
Route::set('api/jeux/add', 'JeuxController@add');

Route::run();


//Route::set('aboutus', 'IndexController');