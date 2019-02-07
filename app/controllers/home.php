<?php
namespace Controllers;
use Models\User;
class home extends \Application\Controller
{
    public function index()
    {
        $this->view('home');
    }
}