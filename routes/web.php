<?php
use Application\Router;
Router::get('/', 'Application\Controllers\home@index')->name('index')->addMiddleware(\Application\Middleware\userControl::class);
Router::get('/login', 'Application\Controllers\login@index')->name('login');
Router::post('/login', 'Application\Controllers\login@store')->name('login.post');

Router::get('/404', 'Application\Controllers\ErrorPage@notFound');
Router::error(function(\Pecee\Http\Request $request, \Exception $exception) {
    if($exception instanceof \Pecee\SimpleRouter\Exceptions\NotFoundHttpException && $exception->getCode() === 404) {
        //response()->redirect('/404');
        response()->redirect('/');
    }

});