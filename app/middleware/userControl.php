<?php
namespace Application\Middleware;
use Application\Models\User;
use Pecee\Http\Middleware\IMiddleware;
use Pecee\Http\Request;

class userControl implements IMiddleware
{
    public function handle(Request $request): void
    {
        if(!User::isLogged()){
            response()->redirect(url('login'));
        }
    }
}