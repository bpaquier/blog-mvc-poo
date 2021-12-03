<?php
    \App\Vendors\ErrorHandler::redirectIfNoLogin();
?>
  <div class="container">
    <h1>My Account</h1>
    <form>
      <div class="form-group">
        <label for="exampleInputEmail1">First Name</label>
        <input type="text" class="form-control" id="firstname" aria-describedby="first name" placeholder="Your first name">
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1">Last Name</label>
        <input type="text" class="form-control" id="lastname" aria-describedby="last name" placeholder="Your last name">
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1">Email address</label>
        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
      </div>
      <div class="form-check">
        <input type="checkbox" class="form-check-input" id="is-admin">
        <label class="form-check-label" for="is-admin">Is admin</label>
      </div>
      <div class="form-group">
        <label for="pass">Password</label>
        <input type="pass" class="form-control" id="pass" placeholder="Password">
      </div>
      <div class="form-group">
        <label for="confirm-pass">Confirm Password</label>
        <input type="password" class="form-control" id="confirm-pass" placeholder="Password">
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>
