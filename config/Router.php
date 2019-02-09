<?php
use Pecee\SimpleRouter\SimpleRouter as Router;
try{
    Router::get('/', 'Application\Controllers\home@index')->name('index')->addMiddleware(\Application\Middleware\userControl::class);
    Router::get('/login', 'Application\Controllers\login@index')->name('login');
    Router::post('/login', 'Application\Controllers\login@store')->name('login.post');
} catch (\Pecee\Http\Exceptions\MalformedUrlException $e){
    $e->getMessage();
}

try{
    Router::start();
} catch (Exception $e){
    $e->getMessage();
}
