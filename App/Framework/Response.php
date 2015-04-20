<?php

namespace App\Framework;


class Response {

    public function __construct($response){

        if(is_array($response)){

            extract($response);
            include APP_BASEDIR.'App/Views/'.$response[0].'.php';

        }else{
            if(!json_decode($response)) {

                include APP_BASEDIR . 'App/Views/' . $response.'.php';

            }else{
                echo $response;
            }
        }

        exit; // stop go down the script
    }

}