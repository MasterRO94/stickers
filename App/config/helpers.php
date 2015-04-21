<?php


function dd($var){

    echo '<pre>';
    var_dump($var);
    echo '</pre>';
    die;

}


/**
 * Returns the absolute path to file
 *
 * @param $path
 * @return string
 */
function asset($path){
    return PATH.'/public/'.$path;
}


/**
 * Returns the absolute path to page
 *
 * @param $path
 * @return string
 */
function url($path){
    return PATH.'/'.$path;
}


/**
 * Redirect to url
 *
 * @param string $url
 */
function redirect($url = '/'){
    header('Location: '.PATH.$url);
    exit;
}


/**
 * Make ?abs integer value
 *
 * @param $var
 * @param bool $abs
 * @return number
 */
function int($var, $abs = true){
    return abs((int)$var);
}


/**
 * Session manipulates
 *
 * @param $key
 * @param null $value
 * @return bool|null
 */
function session($key, $value = null){
    if($value !== null){

        $_SESSION[$key] = $value;

        return true;

    }else{

        return isset($_SESSION[$key]) ? $_SESSION[$key] : null;

    }
}


/**
 * Delete session var
 *
 * @param $key
 * @return bool
 */
function session_delete($key){
    if(isset($_SESSION[$key]) ) {

        unset($_SESSION[$key]);

        return true;

    }else{

        return false;

    }
}







