<?php

use App\Model\PostManager;
use App\Entity\Post;

$manager = new PostManager();


if( strlen($_GET['id']) > 0) {
    ## UPDATE POST ##

    $post_id = intval($_GET['id']);

    if( isset($_POST['post_title']) OR isset($_POST['post_image']) OR isset($_POST['post_content']) ) {

        
        $data = $_POST;
        $data['post_id'] = $post_id;
        $data['author_id'] = strval($_SESSION['user']['id']);

        $manager->updatePost($data);
    
        header('Location: /post/' . $post_id);
    } else {
        $post = $manager->getPostById($post_id);
?>

    <div class="container">
        <h1>Add a new post</h1>
        <form method="post">
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" name="post_title" aria-describedby="post title" placeholder="Post title" value="<?= $post['post_title'] ?>" required>
            </div>
            <div class="form-group">
                <label for="image">Image</label>
                <input type="text" class="form-control" id="image" name="post_image" aria-describedby="post image" placeholder="Post image" value="<?= $post['post_image'] ?>">
            </div>
            <div class="form-group">
                <label for="content"></label>
                <textarea class="form-control" id="content" name="post_content" aria-describedby="post content" placeholder="Post content" required> <?= $post['post_content'] ?></textarea>
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Update</button>
        </form>
    </div>

<?php
    }

} else {
    ## CREATE POST ##

    if( isset($_POST['post_title']) AND isset($_POST['post_content']) ) {
        if($_POST['post_image']){
            var_dump($_FILES);
            $fileName = $_POST['post_image'];
            $from = $fileName;
            $to = $_SERVER['DOCUMENT_ROOT'] .'/uploads/'. $fileName;
            var_dump($to);
            die();
            move_uploaded_file($from,  $to);
            var_dump($_SERVER['DOCUMENT_ROOT']);
            var_dump($fileName);
            die();
        }
        $postData = $_POST;
        $postData['author_id'] = strval($_SESSION['user']['id']);

        $newPostId = $manager->addPost($postData);
    
        header('Location: /post/' . $newPostId);
    } else {
    ?>
    
    <div class="container">
        <h1>Add a new post</h1>
        <form method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" name="post_title" aria-describedby="post title" placeholder="Post title" required>
            </div>
            <div class="form-group">
                <label for="image">Image</label>
                <input type="file" name="post_image" id="post_image">
            </div>
            <div class="form-group">
                <label for="content"></label>
                <textarea class="form-control" id="content" name="post_content" aria-describedby="post content" placeholder="Post content" required></textarea>
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    
    <?php
    }
}