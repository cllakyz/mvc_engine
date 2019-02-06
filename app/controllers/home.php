<?php
use Models\User;
class home extends Controller
{
    public function index()
    {
        $this->view('site/header', array('users' => User::all()));
    }
}