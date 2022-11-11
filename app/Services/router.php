<?php

namespace App\Services;

class router
{
    private static $list = [];

    public static function page($uri, $pageName){
        self::$list[] = [
            "uri" => $uri,
            "page" => $pageName,
        ];
    }

    public static function post($uri, $class, $method, $formdata = false, $files = false){
        self::$list[] = [
            'uri' => $uri,
            'class' => $class,
            'method' => $method, //tut priletaet primerno login primer
            'post' => true,
            'formdata'=> $formdata,
            'files'=> $files,

        ];
    }

    public static function enable() {
        $query = $_GET['q'];
        foreach (self::$list as $route) {

            if ($route['uri'] === '/' . $query){ //если /login = login
                if ($route['post']===true && $_SERVER['REQUEST_METHOD'] === 'POST'){//если Пост пришел и включился
                    $action = new $route['class']; //создаем новый класс и пихаем в экшн
                    $method = $route['method']; //достаем метод и пихаем в перем
                    if ($route['formdata'] && $route['files']){ //если есть ава и формдата
                        $action->$method($_POST, $_FILES); // то отправляем
                    }elseif ($route['formdata'] && !$route['files']){  // если есть ава, но нет формы
                        $action->$method($_POST); // то отправялем только аву
                    }else {
                        $action->$method(); // иначе, ничего не отправялем
                    }                    die();
                }else{
                    require_once 'views/pages/' . $route['page'] . '.php';
                    die();
                }
            }
        }
        self::error('404');
    }
    public static function error($error){
        require_once "views/error/" . $error . '.php';
    }

    public static function redirect($uri){
        header('Location: ' . $uri);
    }
}