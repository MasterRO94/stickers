<?php



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
    header('Location: '.$url);
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