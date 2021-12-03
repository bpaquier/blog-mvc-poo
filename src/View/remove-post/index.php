<?php

use App\Model\PostManager;

if(isset($_GET['id'])) {
    $post_id = $_GET['id'];
    $manager = new PostManager();
    $manager->removePost($post_id);
?>

    <h1>Votre article n°  <?= $_GET['id'] ?> a bien été supprimé.</h1>
    <a href="/">Retour à la liste des articles</a>
<?php
} else {
    header('Location: /');
}

