<?php


namespace App\controllers;


use App\Services\router;
use http\Client\Curl\User;

class auth
{

    public function login($data)
    {
        $email = $data ['email'];
        $password = $data ['password'];

        $user = \R::findOne('users', 'email=?', [$email]);


        if (!$user){
            die('not a users');
        }

        if (password_verify($password, $user->password)){
            session_start();
            $_SESSION['user'] = [
                'id' => $user->id,
                'fullName' => $user->fullName,
                'userName' => $user->userName,
                'group' => $user->group,
                'email' => $user->email,
                'avatar' => $user->avatar,
            ];
            router::redirect('/profile');
        } else {
            die('Не верный логин или пароль');
        }
    }



    public function register($data, $files)
    {
        $username = $data ['username'];
        $fullName = $data ['fullName'];
        $email = $data ['email'];
        $password = $data ['password'];
        $password_confirmation = $data ['password_confirmation'];
        $exampleCheck1123 = $data ['exampleCheck1123'];

        if ($password !== $password_confirmation){
            router::error(500);
            die();
        }

        $avatar = $files['avatar'];

        $fileName = time() . '_' . $avatar['name'];
        $path = 'uploads/avatars/' . $fileName;
        if (move_uploaded_file($avatar['tmp_name'],$path)) {
            $user = \R::dispense('users');
            $user->email = $email;
            $user->username = $username;
            $user->fullName = $fullName;
            $user->gropup = 1;
            $user->avatar = '/' . $path;
            $user->password = password_hash($password,PASSWORD_DEFAULT);

            \R::store($user);
            router::redirect('/login');
        }else{
            router::error('500');
        }

    }


//    public function logout (){
//        unset($_SESSION['user']);
//        router::redirect('login');
//    }
}