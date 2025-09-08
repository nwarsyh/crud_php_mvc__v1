<?php
define('APPROOT', __DIR__ . '/');
define('CONTROLLER_PATH', APPROOT . 'controllers/');
define('MODEL_PATH', APPROOT . 'models/');
define('VIEW_PATH', APPROOT . 'views/');
require_once "core/ApplicationCore.php";
require_once "core/ControllerCore.php";
require_once "core/DatabaseCore.php";
require_once "core/AlertCore.php";
require_once "config/Configuration.php";
