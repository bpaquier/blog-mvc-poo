<?php

namespace App\Controller;

use App\Model\HTTPRequest;
use App\Model\HTTPResponse;

class BaseController {

    protected $params;
    protected $template = __DIR__ . './../View/template.php';
    protected $viewsDir = __DIR__ . './../View/';
    protected $HTTPRequest;
    protected $HTTPReponse;

    public function __construct(string $action, array $params = []) {
        $this->params = $params;
        $this->HTTPRequest = new HTTPRequest();
        $this->HTTPResponse = new HTTPResponse();
        $method = $action;
        

        if (!is_callable([$this, $method])) {
            throw new \RuntimeException("L'action " . $action . " n'est pas définie dans ce module");
        }

        $this->$method();
    }

    public function render(string $title, string $view, array $data) {
        $view = $this->viewsDir . $view . '/index.php';

        ob_start();
        require $view;
        $content = ob_get_clean();
        return require $this->template;
    }

    public function renderJSON($json) {
        // headers
        $this->HTTPResponse->setJSONHeader();

        // status code
        if(isset(json_decode($json)->status)){
            $this->HTTPResponse->setStatus(json_decode($json)->status);
        }

        // content
        echo($json);
        return json_encode($json);

    }

}