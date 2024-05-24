
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container">
    <a class="navbar-brand" href="#"><?php echo lang('home'); ?></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#app-nav" aria-controls="app-nav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="app-nav">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
        <a class="nav-link" href="#"><?php echo lang('categories'); ?></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#"><?php echo lang('ITEMS'); ?></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#"><?php echo lang('MEMBERS'); ?></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#"><?php echo lang('STATISTICS'); ?></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#"><?php echo lang('LOGS'); ?></a>
        </li>
      </ul>
      <ul class="navbar-nav">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <?php echo $_SESSION["USERNAME"]; ?>
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="#"><?php echo lang('edit_profile'); ?></a></li>
            <li><a class="dropdown-item" href="#"><?php echo lang('settings'); ?></a></li>
            <li><a class="dropdown-item" href="#"><?php echo lang('logout'); ?></a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>
