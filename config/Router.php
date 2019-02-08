<?php
use Pecee\SimpleRouter\SimpleRouter as Router;
try{
    Router::get('/', 'Controllers\home@index')->name('index');
    Router::get('/login', 'Controllers\login@index')->name('login');
    Router::post('/login', 'Controllers\login@store')->name('login.post');
} catch (\Pecee\Http\Exceptions\MalformedUrlException $e){
    $e->getMessage();
}

try{
    Router::start();
} catch (Exception $e){
    $e->getMessage();
}
