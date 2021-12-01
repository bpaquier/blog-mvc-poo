<?php

require_once './vendor/autoload.php';

include './views/templates/header.php';


$users = new App\Controller\FrontController();
var_dump($users->showUsers());

?>

<h1>Hello World</h1>
<button type="button" class="btn btn-primary">Login</button>

<?php
include './views/templates/footer.php';
?>