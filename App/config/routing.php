<?php use App\Framework\Route;


Route::get('/', 'MainController@index');


Route::post('/register', 'MainController@userCreate');


Route::post('/login', 'MainController@userLogin');


Route::get('/logout', 'MainController@userLogout');


Route::get('/home', 'StickersController@index');


Route::post('/create-sticker', 'StickersController@createSticker');




/**
 * Error 404
 */
require APP_BASEDIR . 'App/Views/errors/404.php';