<?php
    $useManager = new \App\Model\UserManager();

    \App\Vendors\ErrorHandler::redirectIfLogin();

    if(isset($_POST['first_name']) && isset($_POST['last_name']) && isset($_POST['email']) && isset($_POST['role']) && isset($_POST['password'])) {
        $userId = $useManager->add($_POST);

        if(intVal($userId) > 0) {
            \App\Vendors\SuccessHandler::successLogin($_POST['role'], $_POST['first_name'], $userId, '/');
        } else {
            \App\Vendors\Flash::setFlash("Error", "alert");
        }
    }
?>

<form style="width: 50%; margin: auto;" method="post">
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">First Name</label>
        <input type="text" name="first_name" class="form-control" id="exampleFormControlInput1"  required>
    </div>
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Last Name</label>
        <input type="text" name="last_name" class="form-control" id="exampleFormControlInput1" required>
    </div>
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Email</label>
        <input type="email" name="email" class="form-control" id="exampleFormControlInput1" required>
    </div>
    <div class="mb-3">
        <label class="form-label" for="select_role">Role</label>
        <select class="form-control" name="role" id="select_role">
            <option value="default">Default</option>
            <option value="admin">Admin</option>
        </select>
    </div>
    <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Password</label>
        <input type="password" name="password" class="form-control" id="exampleFormControlTextarea1" rows="3" required>
    </div>
    <div class="col-12">
        <button class="btn btn-primary" type="submit" name="add">Create Account</button>
    </div>
</form>
