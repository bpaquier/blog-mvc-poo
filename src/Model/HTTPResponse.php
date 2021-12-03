<?php

namespace App\Model;

use App\Model\JSONResponse;

class HTTPResponse
{
  public function addHeader($header): void {
    header($header);
  }

  public function redirect($location, int $code = 0, $replace = true): void {
    $this->addHeader('Location:' . $location, $replace, $code);
    exit;
  }

  public function unauthorized(array $messages): void {
    $this->addHeader('WWW-Authenticate: Basic realm="This area needs authentication"');
    $this->addHeader('HTTP/1.0 401 Unauthorized');
    exit(json_encode($messages, JSON_PRETTY_PRINT));
  }

  public function setCookie($name, $value = '', $expire = 0, $path = null, $domain = null, $secure = false, $httpOnly = true): void {
    setcookie($name, $value, $expire, $path, $domain, $secure, $httpOnly);
  }
  
  public function setCacheHeader(int $seconds): void {
    $timestamp = time() + $seconds;
    $date = new \DateTime();
    $date->setTimestamp($timestamp);

    $this->addHeader('Cache-Control: public, max-age=' . $seconds);
    $this->addHeader('Expires: ' . $date->format('D, d M Y H:i:s') . ' GMT');
  }

  public function setJSONHeader(): void {
    $this->addHeader('Content-Type: application/json');
  }

  public function setStatus($status): void {
    http_response_code($status);
  }

  public function sendJSON($status, $data, $errors): void {
    $jsonResponse = new JSONResponse(200, $data, $errors);
    echo($jsonResponse->json);
  }

}

?>