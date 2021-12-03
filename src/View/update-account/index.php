<?php
    $useManager = new \App\Model\UserManager();

    \App\Vendors\ErrorHandler::redirectIfNoLogin();
    $user = $data;

        if($_POST['password'] || $_POST['first_name'] || $_POST['last_name'] || $_POST['role'] || $_POST['email']){
            $updatedUser = $useManager->update($_POST);

            if ($updatedUser){
                $user = $updatedUser;
                \App\Vendors\SuccessHandler::successLogin($updatedUser['role'], $updatedUser['first_name'], $updatedUser['user_id'], '');
                \App\Vendors\Flash::setFlash('Profile Updated', 'info');
            } else {
                \App\Vendors\Flash::setFlash('Ooooops error', 'alert');
            }
        }
 ?>

<form style="width: 50%; margin: auto;" method="post">
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">First Name</label>
        <input type="text" name="first_name" class="form-control" id="exampleFormControlInput1" value="<?= $user['first_name'] ?>"  >
    </div>
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Last Name</label>
        <input type="text" name="last_name" class="form-control" id="exampleFormControlInput1" value="<?= $user['last_name'] ?>" >
    </div>
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Email</label>
        <input type="email" name="email" class="form-control" id="exampleFormControlInput1" value="<?= $user['email'] ?>" >
    </div>
    <div class="mb-3">
        <label class="form-label" for="select_role">Role</label>
        <select class="form-control" name="role" id="select_role">
            <option <?php $user['role'] === 'default' ? "selected" : "" ?> value="default">Default</option>
            <option <?php $user['role'] === 'admin' ? "selected" : "" ?> value="admin">admin</option>
        </select>
    </div>
    <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Password</label>
        <input type="password" name="password" class="form-control" id="exampleFormControlTextarea1" rows="3" >
    </div>
    <div class="col-12">
        <button class="btn btn-primary" type="submit" name="update">Update</button>
    </div>
</form>
