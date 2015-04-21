<?php namespace App\Framework;


class Route
{


    /**
     * Handle GET Request
     *
     * @param $uri
     * @param $action
     * @param array $params
     * @return bool
     */
    public static function get($uri, $action, $params = array()){

        $URI = $_SERVER['REQUEST_URI'];

        if($uri === $URI){
            if($_SERVER['REQUEST_METHOD'] === 'GET') {

                self::call($action, $params);

            }else{
                return false;
            }
        }else{
            return false;
        }

    }

    /**
     * Handle POST Request
     *
     * @param $uri
     * @param $action
     * @param array $params
     * @return bool
     */
    public static function post($uri, $action, $params = array()){

        $URI = $_SERVER['REQUEST_URI'];

        if($uri === $URI){
            if($_SERVER['REQUEST_METHOD'] === 'POST') {

                self::call($action, $params);

            }else{
                return false;
            }
        }else{
            return false;
        }

    }



    private static function call($action, $params = array()){
        $action = explode('@', $action);
        $controller = $action[0];
        $method     = $action[1];

        $controller = '\App\Controllers'.'\\'.$controller;

        $call = new $controller;
        $call->$method($params);

        return true;
    }




}