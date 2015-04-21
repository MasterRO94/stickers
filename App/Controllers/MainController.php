<?php namespace App\Controllers;

use App\Framework\Response;
use App\Models\User;

class MainController
{

    /**
     * Show Homepage
     *
     * @param array $params
     * @return Response
     */
    public function index($params = array()){

        return new Response('homepage');

    }


    /**
     * Create new User
     *
     * @return bool
     */
    public function userCreate(){

        $request = $_POST;

        $name =             trim($request['name']);
        $email =            trim($request['email']);
        $password =         trim($request['password']);
        $password_conf =    trim($request['password_confirmation']);

        $errors = [];

        if($name == ''){
            $errors[] =  'Имя должно быть указано!';
        }
        if($email == ''){
            $errors[] =  'Email должен быть указан!';
        }
        if($password == ''){
            $errors[] =  'Пароль должен быть указан!';
        }
        if($password != $password_conf){
            $errors[] =  'Пароли не совпадают!';
        }

        if(count($errors)){
            session('userFields', $request);
            session('errors', $errors);
            redirect('/#register');
            return false;
        }

        $user = new User();

        $user->setName($name);
        $user->setEmail($email);
        $user->setPassword(password_hash($password, PASSWORD_DEFAULT));

        $user->save();

        redirect();

        return true;

    }


    /**
     * Login User
     */
    public function userLogin(){

        $request = $_POST;

        $email =    trim($request['email']);
        $password = trim($request['password']);


        $user = User::get($email);

        if(!$user){
            $error = 'Пользователь не найден!';
            session('loginError', $error);
            redirect();
        }else{


            if(password_verify($password, $user['password'])){
                session('user', $user);
                redirect('/home');
            }else{
                $error = 'Неверный пароль!';
                session('loginError', $error);
                redirect();
            }
        }


    }

    /**
     * Logout User
     */
    public function userLogout(){
        session_delete('user');
        redirect();
        return true;
    }






}

