<?php
namespace App\Model;

class HTTPResquest
{
  public function cookieData($key){
    return isset($_COOKIE[$key]) ? $_COOKIE[$key] : null;
  }

  public function cookieExists($key){
    return isset($_COOKIE[$key]);
  }

  public function method(){
    return $_SERVER['REQUEST_METHOD'];
  }

  public function requestURI(){
    return $_SERVER['REQUEST_URI'];
  }
}

?>