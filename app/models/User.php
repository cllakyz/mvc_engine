<?php
namespace Models;
use Illuminate\Database\Eloquent\Model;
class User extends Model
{
    protected $table = "user";

    public static function isLogged()
    {
        $isLogged = false;
        if (isset($_SESSION['loginUserId'])){
            $x = User::where('id', '=', $_SESSION['loginUserId'])->count();
            if($x){
                $isLogged = true;
            }
        } elseif (isset($_COOKIE['loginUserId'])){
            $x = User::where('id', '=', $_COOKIE['loginUserId'])->count();
            if($x){
                $_SESSION['loginUserId'] = $_COOKIE['loginUserId'];
                $isLogged = true;
            }
        }
        return $isLogged;
    }
}