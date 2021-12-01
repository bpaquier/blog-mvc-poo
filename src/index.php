<?php
session_start();


require_once './vendor/autoload.php';

$router = new \App\Controller\Router\Router();

$router->getController();