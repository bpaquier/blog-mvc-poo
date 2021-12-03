<?php

use App\Model\PostManager;
use App\Vendors\Flash;

if(isset($_GET['id'])) {
    $post_id = intval($_GET['id']);
    $manager = new PostManager();
    $manager->removePost($post_id);
?>
    <div style="display: flex; flex-direction: column; align-items: center;">
        <?= Flash::setFlash('Votre article n°' . $_GET['id'] . ' a bien été supprimé', 'success'); ?>
        <a href="/" class="btn btn-primary">Retour à la liste des articles</a>
    </div>

<?php

} else {
    header('Location: /');
}

