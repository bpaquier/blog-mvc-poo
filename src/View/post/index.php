<?php
    $post = $data;

    if($post) {
        ?>
        <div class="single-post">
            <div class="sub-section">
                <div class="posts-list">
                    <div class="card">
                        <img class="card-img-top" src="https://source.unsplash.com/1600x900/?beach" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title"><?= $post['title'] ?></h5>
                            <p class="card-text"><?= $post['content'] ?></p>
                            <p class="card-text"><small class="text-muted"><?= $post['author'] ?></small></p>
                            <p class="card-text"><small class="text-muted"><?= $post['date'] ?></small></p>
                            <a href="#" class="btn btn-danger">Delete</a>
                            <a href="#" class="btn btn-warning">Update</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="sub-section">
                <h2>Comments</h2>
                <ul class="list-group">
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Nice article
                        <span class="badge badge-primary badge-pill">Batman</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Comment est votre blanquette ?
                        <span class="badge badge-primary badge-pill">Eric Zemmour</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        How can I center a div ?
                        <span class="badge badge-primary badge-pill">Jean-françois</span>
                    </li>
                </ul>
            </div>
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
        <?php
    }
?>

