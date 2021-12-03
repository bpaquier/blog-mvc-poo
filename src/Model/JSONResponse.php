<?php
namespace App\Model;

class JSONResponse
{   
  public $json;

  public function __construct($status , $data, $errors) {
    $this->json = json_encode(array(
      'status' => $status,
      'data' => $data,
      'errors' => $errors,
    ), JSON_PRETTY_PRINT); 
  }

  // 200 ...
  
  static function ok($data){
    $res = new JSONResponse(200, $data, null);
    return $res->json;
  }

  static function created($data){
    $res = new JSONResponse(201, $data, null);
    return $res->json;
  }

  // 400 ...

  static function badRequest($msg = "Bad Request", $errors = []){
    $res = new JSONResponse(400, null, [$msg, ...$errors]);
    return $res->json;
  }

  static function missingParameters($errors = []){
    $res = new JSONResponse(400, null, ['Missing parameters',...$errors]);
    return $res->json;
  }

  static function unauthorized($errors = []){
    $res = new JSONResponse(401, null, ['Unauthorized',...$errors]);
    return $res->json;
  }

  static function forbidden($errors = []){
    $res = new JSONResponse(403, null, ['Forbidden',...$errors]);
    return $res->json;
  }

  static function notFound($errors = []){
    $res = new JSONResponse(404, null, ['Not found', ...$errors]);
    return $res->json;
  }

  static function methodNotAllowed($errors = []){
    $res = new JSONResponse(405, null, ['Method not allowed',...$errors]);
    return $res->json;
  }

  static function duplicatedRessource($errors = []){
    
    $res = new JSONResponse(409, null, ['Duplicated resource',...$errors]);
    return $res->json;
  }

  // 500 ...
  static function internalServerError($errors = []){
    $res = new JSONResponse(500, null, ['Internal server error',...$errors]);
    return $res->json;
  }

  

}

?>