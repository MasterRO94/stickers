<?php

    function __autoload($class){
        $class = str_replace('\\', '/', $class);
        include APP_BASEDIR.$class.'.php';
    }