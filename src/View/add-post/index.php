<?php

    use App\Model\PostManager;

        if( isset($_POST['title']) AND isset($_POST['content']) ) {
            $manager = new PostManager();
    
            $title = htmlspecialchars($_POST['title']);
            $author_id = intval($_SESSION['user']['id']);
            $content = htmlspecialchars($_POST['content']);
            $post_id = $manager->addPost($title, $author_id, $content);
    
            header('Location: /post/' . $post_id);
        } else {
?>
        <div class="container">
            <h1>Add a new post</h1>
            <form method="post">
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" id="title" name="title" aria-describedby="post title" placeholder="Post title" required>
                </div>
                <div class="form-group">
                    <label for="image">Image</label>
                    <input type="text" class="form-control" id="image" name="image" aria-describedby="post image" placeholder="Post image">
                </div>
                <div class="form-group">
                    <label for="content"></label>
                    <textarea class="form-control" id="content" name="content" aria-describedby="post content" placeholder="Post content" required></textarea>
                </div>
                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
<?php
        }