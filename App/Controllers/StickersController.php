<?php namespace App\Controllers;

use App\Framework\Response;
use App\Models\Sticker;
use App\Models\User;

class StickersController
{
    public function __construct()
    {
        if(!session('user')){
            redirect('/#login');
        }
    }

    /**
     * Show Homepage
     *
     * @param array $params
     * @return Response
     */
    public function index($params = array())
    {

        $user = User::find(session('user')['id']);

        $stickers = $user->stickers();


        return new Response(['home', 'stickers' => $stickers ]);

    }




    public function createSticker(){

        header('Content-type: application/json');

        $request = $_POST;

        $title =        trim($request['title']);
        $body =         trim($request['body']);
        $background =   trim($request['bg']);


        if(session('user')){
            $sticker = new Sticker();

            $sticker->setUserId(session('user')['id']);
            $sticker->setTitle($title);
            $sticker->setBody($body);
            $sticker->setBackground($background);

            $res = $sticker->save();


            return new Response(json_encode(['error' => false, 'sticker' => $sticker, 'result' => $res, 'data' => $request]));
        }else{
            return new Response(json_encode(['error' => true]));
        }



    }




}