<?php
    $post = $data['post'];
    $comments = $data['comments'];
    if($post) : ?>
        <div class="single-post">
            <div class="sub-section">
                <div class="posts-list">
                    <div class="card">
                        <img class="card-img-top" src="https://source.unsplash.com/1600x900/?beach" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title"><?= $post['title'] ?></h5>
                            <p class="card-text"><?= $post['content'] ?></p>
                            <p class="card-text"><small class="text-muted"><?= $post['author_firstName'] . " " . $post['author_lastName'] ?></small></p>
                            <p class="card-text"><small class="text-muted"><?= $post['date'] ?></small></p>
                            <a href="#" class="btn btn-danger">Delete</a>
                            <a href="#" class="btn btn-warning">Update</a>
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
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif; ?>
        </div>
        <div class="sub-section">
            <h2>Ecrire un commentaire</h2>
            <form>
                <input class="form-control" type="text" placeholder="Jean francois" readonly>
                <div class="form-group">
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Comment</button>
            </form>
        </div>
    <?php endif; ?>

