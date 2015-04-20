<?php namespace App\Controllers;

use App\Framework\Response;


class MainController
{

    public function index($params = array()){

        return new Response('homepage');

    }


}

