<?php
namespace Application\Models;
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

    public static function userInfo($key=NULL, $id=NULL)
    {
        if(is_null($id)){
            $id = $_SESSION['loginUserId'];
        }
        $sorgu = User::where('id', '=', $id)->first();
        if(!is_null($key)){
            return $sorgu[$key];
        } else{
            return $sorgu;
        }
    }
}