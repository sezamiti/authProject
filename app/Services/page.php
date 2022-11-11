<?php


namespace App\Services;


class page
{
    public static function part($part_name){
        require_once 'views/components/' . $part_name . '.php';
    }
}