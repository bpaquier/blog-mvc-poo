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
  
  static function ok($data){
    $res = new JSONResponse(200, $data, null);
    return $res->json;
  }

  static function notFound(){
    $res = new JSONResponse(404, null, ['Not found']);
    return $res->json;
  }
}

?>