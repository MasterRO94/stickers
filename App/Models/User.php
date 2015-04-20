<?php

namespace App\Models;

use DB;

class User {


    /**
     * Find User by Id
     *
     * @param $id
     * @return array|bool|string
     */
    public static function find($id)
    {
        DB::sql('SELECT * FROM users WHER id = '. int($id));

        return DB::query();
    }



    public function create($request){

    }


    public static function auth()
    {
        return false;
    }




}