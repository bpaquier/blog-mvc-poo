<?php
    $useManager = new \App\Model\UserManager();
    if($_SESSION['user']['connected'] && !$_GET['logout']){
        header('Location: /home');
    } elseif($_SESSION['user']['connected'] && $_GET['logout']) {
        $useManager->logout();
    } elseif (isset($_POST['email']) && isset($_POST['password'])) {
        $useManager->login($_POST['email'], $_POST['password']);
    }
?>
<form style="width: 50%; margin: auto;" method="post">
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Email</label>
        <input type="email" name="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com" required>
    </div>
    <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Password</label>
        <input type="password" name="password" class="form-control" id="exampleFormControlTextarea1" rows="3" required>
    </div>
    <div class="col-12">
        <button class="btn btn-primary" type="submit">Login</button>
    </div>
</form>
