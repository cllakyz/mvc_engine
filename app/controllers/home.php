<?php
namespace Application\Controllers;
use Application\Models\User;

class home extends \Application\Controller
{
    public function index()
    {
        $this->view('home');
    }
}