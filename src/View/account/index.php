<?php

$user = $data;

\App\Vendors\ErrorHandler::redirectIfNoLogin();
?>

<div style="width: 70%; margin: auto">
    <div style="display: flex; justify-content: space-between; align-items: center">
        <h2>Your profile</h2>
        <a style="height: fit-content" class="btn btn-dark" href="/update-account">Update profile</a>
    </div>
    <table  class="table">
        <tbody>
            <tr>
                <th scope="row">First name:</th>
                <td><?= $user['first_name'] ?></td>
            </tr>
            <tr>
                <th scope="row">Last name:</th>
                <td><?= $user['last_name'] ?></td>
            </tr>
            <tr>
                <th scope="row">Email:</th>
                <td><?= $user['email'] ?></td>
            </tr>
            <tr>
                <th scope="row">Role:</th>
                <td><?= $user['role'] ?></td>
            </tr>

        </tbody>

    </table>


</div>
