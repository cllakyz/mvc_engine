<?php
namespace Application\controllers;

class ErrorPage extends \Application\Controller
{
    public function notFound()
    {
        echo "Sayfa Bulunamadı";
    }
}