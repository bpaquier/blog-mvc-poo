<?php

\App\Vendors\ErrorHandler::redirectIfNoLogin();

use App\Model\PostManager;

$manager = new PostManager();


if( strlen($_GET['id']) > 0) {
    ## UPDATE POST ##

    $post_id = intval($_GET['id']);
    $post = $manager->getPostById($post_id);

    if( isset($_POST['post_title']) OR isset($_FILES['post_image']) OR isset($_POST['post_content']) ) {

        
        $data = $_POST;
        var_dump($_FILES);
        if($_FILES['post_image'] && strlen($_FILES['post_image']['name']) > 0){
            //unlink(__DIR__ . "/../../uploads" . $post['post_image']);
            $fileName = $manager->uploadImage($_FILES['post_image']);
            $data['post_image'] = $fileName;
        }

        $data['post_id'] = $post_id;
        $data['author_id'] = strval($_SESSION['user']['id']);

        $manager->updatePost($data);
    
        header('Location: /post/' . $post_id);
    } else {
?>

    <div class="container">
        <h1>Add a new post</h1>
        <form method="post">
            <div class="form-group">
                <?php if(isset($post['post_image']) && !empty($post['post_image'])): ?>
                    <img style="max-width: 250px" class="card-img-top" src="http://localhost:5555/uploads/<?= $post['post_image'] ?>" alt="Card image cap">
                <?php endif; ?>
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" name="post_title" aria-describedby="post title" placeholder="Post title" value="<?= $post['post_title'] ?>" required>
            </div>

           <!-- <div class="form-group">
                <label for="image">Change image</label>
                <input type="file" name="post_image_update" id="post_image">
            </div> -->
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
        $postData = $_POST;

        if($_FILES['post_image'] && strlen($_FILES['post_image']['name']) > 0){
            $fileName = $manager->uploadImage($_FILES['post_image']);
            $postData['post_image'] = $fileName;
        }

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
                <input type="file" name="post_image" id="post_image" >
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