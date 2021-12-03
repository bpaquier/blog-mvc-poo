<?php
    $users = $data;

    if($users){
        ?>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">First</th>
                        <th scope="col">Last</th>
                        <th scope="col">Email</th>
                        <th scope="col">Is Admin</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
        <?php
       foreach ($users as $user) : ?>
               <tr>
                   <th scope="row"><?= $user['user_id'] ?></th>
                   <td><?= $user['last_name'] ?></td>
                   <td><?= $user['first_name'] ?></td>
                   <td><?= $user['email'] ?></td>
                   <td><?= $user['role'] ?></td>
                   <td>
                       <?php if($_SESSION['user']['role'] === "admin" && $user['user_id'] != $_SESSION['user']['id']) :?>
                            <a href="/remove-user/<?= $user['user_id'] ?>" class="btn btn-danger">Delete</a>
                       <?php endif; ?>
                    </td>
               </tr>
            <?php endforeach; ?>
                </tbody>
            </table>
        <?php
    } else {
        echo "<p>You're alone my friend</p>";
    }
?>
