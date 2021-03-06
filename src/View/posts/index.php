<?php
    $posts = $data;

    if($posts){
        ?>
            <div class="posts-list">
                <div class="card-deck">
                    <?php foreach ($posts as $post): ?>
                        <div class="card">
                        <?php if(isset($post['post_image']) && !empty($post['post_image'])): ?>
                            <img class="card-img-top" src="http://localhost:5555/uploads/<?= $post['post_image'] ?>" alt="Card image cap">
                        <?php endif; ?>
                            <div class="card-body">
                                <h5 class="card-title"><?= $post['post_title'] ?></h5>
                                <p class="card-text"><?= substr($post['post_content'],0,150) . "..." ?></p>
                                <p class="card-text"><small class="text-muted">By <?= $post['author_firstName'] . " " . $post['author_lastName'] ?></small></p>
                                <p class="card-text"><small class="text-muted"><?= $post['post_date'] ?></small></p>
                                <a style="width: 100%" href="/post/<?= $post['post_id'] ?>" class="btn btn-primary">See Post</a>
                                <?php if($_SESSION['user']['id'] === intval($post['author_id']) || $_SESSION['user']['role'] === "admin") : ?>
                                    <div style="display: flex; width: 100%; justify-content: space-between; margin-top: 10px">
                                        <a style="width: 49%" href="/add-post/<?= $post['post_id'] ?>" class="btn btn-warning">Update</a>
                                        <a style="width: 49%" href="/remove-post/<?= $post['post_id'] ?>" class="btn btn-danger">Delete</a>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        <?php
    } else {
        echo "<p>Zero Posts</p>";
    }
?>

