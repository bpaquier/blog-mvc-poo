<?php
    $posts = $data;

    if($posts){
        ?>
            <div class="posts-list">
                <div class="card-deck">
                    <?php foreach ($posts as $post): ?>
                        <div class="card">
                            <img class="card-img-top" src="https://source.unsplash.com/1600x900/?beach" alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title"><?= $post['title'] ?></h5>
                                <p class="card-text"><?= substr($post['content'],0,150) . "..." ?></p>
                                <p class="card-text"><small class="text-muted">By <?= $post['author_firstName'] . " " . $post['author_lastName'] ?></small></p>
                                <p class="card-text"><small class="text-muted"><?= $post['date'] ?></small></p>
                                <a href="/post/<?= $post['post_id'] ?>" class="btn btn-primary">See Post</a>
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

