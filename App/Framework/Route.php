<?php namespace App\Framework;


class Route
{

    public static function get($uri, $action, $params = array()){

        $URI = $_SERVER['REQUEST_URI'];

        if($uri === $URI){
            if($_SERVER['REQUEST_METHOD'] === 'GET') {

                $action = explode('@', $action);
                $controller = $action[0];
                $method     = $action[1];

                $controller = '\App\Controllers'.'\\'.$controller;


                $call = new $controller;
                $call->$method($params);

            }else{
                return false;
            }
        }else{
            return false;
        }

    }

}