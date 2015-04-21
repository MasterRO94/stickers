<?php

namespace App\Models;

use DB;

class Sticker {


    protected $id;
    protected $user_id;
    protected $title;
    protected $body;
    protected $background;
    protected $created_at;
    protected $updated_at;


    /**
     * Get all stickers
     *
     * @return array|bool
     */
    public static function all()
    {
        DB::sql('SELECT * FROM stickers');

        $stickers = DB::query();

        if($stickers){
            return $stickers;
        }else{
            return false;
        }
    }



    /**
     * Find Sticker by Id
     *
     * @param $id
     * @return array|bool|string
     */
    public static function find($id)
    {
        DB::sql('SELECT * FROM stickers WHERE id = '. int($id));

        $sticker = DB::query();

        if($sticker){
            return $sticker[0];
        }else{
            return false;
        }
    }


    /**
     * Get user
     *
     * @return bool
     */
    public function user()
    {
        DB::sql("SELECT * FROM users WHERE id = '". $this->user_id . "'; ");

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
        $q = "INSERT INTO stickers (user_id, title, body, created_at, updated_at)
                VALUES(" . $this->user_id . ", '" . $this->title . "', '" . $this->body . "', NOW(), NOW() ); ";

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
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getUserId()
    {
        return $this->user_id;
    }

    /**
     * @param mixed $user_id
     */
    public function setUserId($user_id)
    {
        $this->user_id = $user_id;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return mixed
     */
    public function getBody()
    {
        return $this->body;
    }

    /**
     * @param mixed $body
     */
    public function setBody($body)
    {
        $this->body = $body;
    }

    /**
     * @return mixed
     */
    public function getBackground()
    {
        return $this->background;
    }

    /**
     * @param mixed $background
     */
    public function setBackground($background)
    {
        $this->background = $background;
    }

    /**
     * @return mixed
     */
    public function getCreatedAt()
    {
        return $this->created_at;
    }

    /**
     * @param mixed $created_at
     */
    public function setCreatedAt($created_at)
    {
        $this->created_at = $created_at;
    }

    /**
     * @return mixed
     */
    public function getUpdatedAt()
    {
        return $this->updated_at;
    }

    /**
     * @param mixed $updated_at
     */
    public function setUpdatedAt($updated_at)
    {
        $this->updated_at = $updated_at;
    }












}