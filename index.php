<?php
require_once 'app/init.php';
//$App = new App();
use Router\Macaw as Router;
Router::get('/', 'Controllers\home@index');
Router::get('/login', 'Controllers\login@index');

Router::dispatch();