<?php
namespace Controllers;
use Models\User;
use Pecee\Http\Request;
class login extends \Application\Controller
{
    public function index()
    {
        $this->view('login');
    }

    public function store()
    {
        $email = \request()->getInputHandler()->value('email');
        $password = \request()->getInputHandler()->value('password');
        $remember_me = \request()->getInputHandler()->exists('remember_me');
        $control = User::where('email', '=', $email)->where('password', '=', sha1($password))->first();
        if ($control){
            $_SESSION['loginUserId'] = $control->id;
            if($remember_me){
                setcookie('loginUserId', $control->id, time()+60*60*24*365, '/');
                response()->redirect(url('index'));
            }
        }
    }
}