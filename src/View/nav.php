
<nav class="navbar navbar-expand-lg navbar-light bg-light" style="margin-bottom: 50px">
  <a class="navbar-brand">
    <img href="https://github.com/bpaquier/blog-mvc-poo" target="_blank" class="github-icon" src="../public/images/github.png" alt="github icon">
  </a>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="/home">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">My Account</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Write article</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          API
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Posts</a>
          <a class="dropdown-item" href="#">Comments</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/users">User list </a>
      </li>
    </ul>
  </div>
  <div class="nav-form form-inline">
      <?php if($_SESSION['user']['connected']) : ?>
          <a class="btn btn-primary" href="/logout">Logout</a>
      <?php else: ?>
          <a class="btn btn-primary" href="/login">Login</a>
      <?php endif; ?>

  </div>
</nav>
