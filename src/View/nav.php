
<nav class="navbar navbar-expand-lg navbar-light bg-light" style="margin-bottom: 50px">
  <a class="navbar-brand">
    <img href="https://github.com/bpaquier/blog-mvc-poo" target="_blank" class="github-icon" src="../public/images/github.png" alt="github icon">
  </a>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="/">Home</a>
      </li>
        <?php if($_SESSION['user']) : ?>
          <li class="nav-item">
            <a class="nav-link" href="/add-post">Write article</a>
          </li>
            <li class="nav-item">
                <a class="nav-link" href="/account">My Account</a>
            </li>
        <?php endif; ?>
      <li class="nav-item">
        <a class="nav-link" href="/users">User list </a>
      </li>
        <li class="nav-item dropdown">
            <a class="nav-link" href="/api-doc" role="button">
                API
            </a>
        </li>
    </ul>
  </div>
  <div class="nav-form form-inline">
      <?php if($_SESSION['user']) : ?>
          <div style="pointer-events: none" class="btn btn-warning">Welcome <?= $_SESSION['user']['name'] ?> !</div>
          <a class="btn btn-primary" href="/logout">Logout</a>
      <?php else: ?>
          <a class="btn btn-primary" href="/login">Login</a>
      <?php endif; ?>

  </div>
</nav>
