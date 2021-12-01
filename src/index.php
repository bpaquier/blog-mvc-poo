<?php

require_once './vendor/autoload.php';

include './views/templates/header.php';


$users = new App\Controller\FrontController();
var_dump($users->showUsers());

?>

<?php 
include './views/templates/header.php';
?>

<?php 
include './views/templates/nav.php';
?>

<?php
include './views/my-account/index.php';
?>

<?php 
include './views/users/index.php';
?>

<?php
include './views/posts/index.php';
?>

<?php
include './views/post/index.php';
?>





<?php
include './views/templates/footer.php';
?>