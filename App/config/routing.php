<?php use App\Framework\Route;


Route::get('/', 'MainController@index', ['name' => 'Roman']);


require APP_BASEDIR . 'App/Views/errors/404.php';