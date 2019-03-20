<nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top">
  <a class="navbar-brand">DAVIET Go</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarGuest" aria-controls="navbarGuest" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarGuest">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="<?=u('home')?>">Home</a>
      </li>
      <?php if($_SESSION["user"]["id"] == 1 || $_SESSION["user"]["id"] == 5): ?>
      <li class="nav-item">
        <a class="nav-link" href="<?=u('admin')?>">Admin</a>
      </li>
      <?php endif; ?>
      <li class="nav-item">
        <a class="nav-link" href="<?=u('map')?>">Map</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?=u('rank')?>">Rank</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?=u('history')?>">History</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?=u('about')?>">About</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?=u('settings')?>">Settings</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?=u('logout')?>">Logout</a>
      </li>
    </ul>
  </div>
</nav>
