<?php

    use App\Model\CommentManager;
    $post = $data['post'];
    $comments = $data['comments'];

    if(isset($_POST['author_name']) && isset($_POST['content'])) {
        $data = $_POST;
        $data['post_id'] = $post['post_id'];

        $commentManager = new CommentManager();
        $lastId =  $commentManager->createOne($data);

        if(intVal($lastId) > 0) {
            header('Location: /?p=post&id=' . $post['post_id']);
        } else {
            \App\Vendors\Flash::setFlash("Fail adding comment", "alert");
        }
    }

    if($post) : ?>
        <div class="single-post">
            <div class="sub-section">
                <div class="posts-list">
                    <div class="card">
                        <?php if(isset($post['post_image']) && !empty($post['post_image'])): ?>
                            <img class="card-img-top" src="http://localhost:5555/uploads/<?= $post['post_image'] ?>" alt="Card image cap">
                        <?php endif; ?>
                        <div class="card-body">
                            <h5 class="card-title"><?= $post['post_title'] ?></h5>
                            <p class="card-text"><?= $post['post_content'] ?></p>
                            <p class="card-text"><small class="text-muted">By <?= $post['author_firstName'] . " " . $post['author_lastName'] ?></small></p>
                            <p class="card-text"><small class="text-muted"><?= $post['post_date'] ?></small></p>
                            <?php if($_SESSION['user']['id'] === intval($post['author_id']) || $_SESSION['user']['role'] === "admin") : ?>
                                <a href="/remove-post/<?= $post['post_id'] ?>" class="btn btn-danger">Delete</a>
                                <a href="/add-post/<?= $post['post_id'] ?>" class="btn btn-warning">Update</a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php if($comments) : ?>
                <div class="sub-section">
                    <h2>Comments</h2>
                    <ul class="list-group">
                        <?php foreach ($comments as $comment) : ?>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <?= $comment['content'] ?>
                                <span class="badge badge-primary badge-pill"><?= $comment['author_name'] ?></span>
                                <?php if($_SESSION['user']['role'] === 'admin'): ?>
                                    <a href="/remove-comment/<?= $comment['comment_id'] ?>" class="btn btn-danger">Delete</a>
                                <?php endif; ?>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif; ?>
        </div>
        <div class="sub-section">
            <h2>Comment this post</h2>
            <form method="post">
                <div class="form-group">
                    <label for="exampleFormControlInput1">Name</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" name="author_name" required>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Content</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="content" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Comment</button>
            </form>
        </div>
    <?php endif; ?>

