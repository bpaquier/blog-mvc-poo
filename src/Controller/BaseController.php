<?php

namespace App\Controller;

class BaseController {

    protected $params;
    protected $template = __DIR__ . '../View/template.php';
    protected $viewsDir = __DIR__ . '../View/';

    public function __construct(string $action, array $params = []) {
        $this->params = $params;

        $method = 'execute' . ucfirst($action);

        if (!is_callable([$this, $method])) {
            throw new \RuntimeException("L'action " . $action . " n'est pas définie dans ce module");
        }

        $this->method;
    }

    public function render(string $title, string $view) {
        $view = $this->viewsDir . $view . '.php';

        ob_start();
        require $view;
        $content = ob_get_clean();
        return require $this->template;
    }
}