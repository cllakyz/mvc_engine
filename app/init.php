<?php
session_start();
require_once 'system/App.php';
require_once 'system/Controller.php';
require_once 'config/settings.php';
require_once 'vendor/autoload.php';
use Models\Database;
new Database();
require_once 'config/RouterHelpers.php';
require_once 'config/Router.php';