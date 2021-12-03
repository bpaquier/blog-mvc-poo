<?php

use App\Model\UserManager;

\App\Vendors\ErrorHandler::redirectIfNoAdmin();

if(isset($_GET['id'])) {
    $user_id = intval($_GET['id']);
    $manager = new UserManager();
    $manager->remove($user_id);

    header( 'Location: /users');

} else {
    header('Location: /');
}
