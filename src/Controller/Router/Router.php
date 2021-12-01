<?php

namespace App\Controller\Router;

class Router
{
    public function getController(){
        $xml = new \DOMDocument();
        $xml->load(__DIR__.'/routes.xml');
        $routes = $xml->getElementsByTagName('route');

        isset($_GET['p']) ? $path = htmlspecialchars($_GET['p']) : $path = '';

    
        foreach ($routes as $route) {
            if ($path === $route->getAttribute('p')) {
              $controller = $route->getAttribute('controller');
              $controllerClass = 'App\Controller\\'.$controller;
              $action = $route->getAttribute('action');
              $params = [];

              if ($route->hasAttribute('params')) {
                $keys = explode(',', $route->getAttribute('params'));
                foreach ($keys as $key){
                  if (isset($_GET[$key])) {
                    $params[$key] = htmlspecialchars($_GET[$key]);
                  }
                }
              }
            return new $controllerClass($action, $params);
            }
        }

    // return new ErrorController('error404');
  }

}