<?php

namespace App\Models;

use DB;

class User {


    protected $id;
    protected $name;
    protected $email;
    protected $password;


    /**
     * Find User by Id
     *
     * @param $id
     * @return array|bool|string
     */
    public static function find($id)
    {
        DB::sql('SELECT * FROM users WHERE id = '. int($id));

        $user = DB::query();

        if($user){

            $user = $user[0];

            $User = new self;

            $User->setId((int)$user['id']);
            $User->setName($user['name']);
            $User->setEmail($user['email']);

            return $User;

        }else{
            return false;
        }
    }


    /**
     * Find User by Email
     *
     * @param $email
     * @return array|bool|string
     */
    public static function get($email)
    {
        DB::sql("SELECT * FROM users WHERE email = '". $email . "'; ");

        $user = DB::query();

        if($user){
            return $user[0];
        }else{
            return false;
        }

    }


    /**
     * Save user to database
     *
     * @return $this
     */
    public function save(){
        $q = "INSERT INTO users (`name`, email, password, created_at)
                VALUES('" . $this->name . "', '" . $this->email . "', '" . $this->password . "', NOW() ); ";

        DB::sql($q);
        $res = DB::execute();

        if($res){
            $this->id = $res;
            return $this;
        }else{
            dd($res);
        }
    }


    /**
     * Check authentication
     *
     * @return bool|null
     */
    public static function auth()
    {
        return session('user');
    }





    public function stickers(){

        DB::sql("SELECT * FROM stickers WHERE user_id = ". $this->id . "; ");

        $stickers = DB::query();

        if($stickers){
            return $stickers;
        }else{
            return false;
        }

    }



    /**
     * @return integer
     */
    public function getId()
    {
        return (int)$this->id;
    }

    /**
     * @param integer $id
     * @return $this
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     * @return $this
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param $email
     * @return $this
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     * @return $this
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }




}