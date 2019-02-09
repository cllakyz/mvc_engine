<?php
session_start();
require_once 'system/App.php';
require_once 'system/Controller.php';
require_once 'config/settings.php';
require_once 'vendor/autoload.php';
use Application\Models\Database;
new Database();
require_once 'config/RouterHelpers.php';
require_once 'Router.php';