<?php $login_name = \Config\Services::login()->name ?? ''; ?>
<nav class="main-header navbar navbar-expand navbar-navy navbar-dark">
  <!-- Left navbar links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
    </li>
    <li class="nav-item d-none d-sm-inline-block <?= ($page ?? '') == 'home' ? 'active' : '' ?>">
      <a href="/" class="nav-link">Home</a>
    </li>
    <li class="nav-item d-none d-sm-inline-block dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown2" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        About
      </a>
      <div class="dropdown-menu" aria-labelledby="navbarDropdown2">
        <a class="dropdown-item" href="/article/1/about_us">About Us</a>
        <a class="dropdown-item" href="/article/2/faq">FAQ</a>
        <a class="dropdown-item" href="/article/3/contact">Contact</a>
        <a class="dropdown-item" href="/article/4/privacy">Privacy</a>
        <a class="dropdown-item" href="/article/5/service">Service</a>
      </div>
    </li>
  </ul>

  <!-- SEARCH FORM -->
  <form action="/search" class="form-inline ml-3">
    <div class="input-group input-group-sm">
      <input name="q" class="form-control text-white form-control-navbar" value="<?= esc($search ?? '') ?>" type="search" placeholder="Search Articles" aria-label="Search">
      <div class="input-group-append">
        <button class="btn btn-navbar" type="submit">
          <i class="fas fa-search"></i>
        </button>
      </div>
    </div>
  </form>

  <!-- Right navbar links -->
  <ul class="navbar-nav ml-auto">
    <!-- Messages Dropdown Menu -->
    <li class="nav-item">
      <a class="nav-link" href="/login">
        <i class="fa fa-sign-in-alt mr-2"></i> Sign In
      </a>
    </li>
  </ul>
</nav>

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-light-navy elevation-4">
  <!-- Brand Logo -->
  <a href="/" class="brand-link">
    <img src="/logo_light.png" alt="AdminLTE Logo" class="brand-image" style="opacity: .8">
    <span class="brand-text font-weight-light">Template</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <?php if ($login_name) : ?>
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
        </div>
        <div class="info">
          <a href="/user/" class="d-block"><i class="fa fa-user mr-2"></i><?= $login_name ?></a>
        </div>
      </div>
    <?php endif ?>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu">
        <li class="nav-item">
          <a href="/" class="nav-link <?= ($page ?? '') == 'home' ? 'active' : '' ?>">
            <i class="nav-icon fas fa-home"></i>
            <p>
              Home
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="/category/news/" class="nav-link <?= ($page ?? '') == 'news' ? 'active' : '' ?>">
            <i class="nav-icon fas fa-newspaper"></i>
            <p>
              News
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="/category/info/" class="nav-link <?= ($page ?? '') == 'info' ? 'active' : '' ?>">
            <i class="nav-icon fas fa-info"></i>
            <p>
              Info
            </p>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>