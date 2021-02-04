<nav class="main-header navbar navbar-expand navbar-dark elevation-2">
  <!-- Left navbar links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
    </li>
    <li class="nav-item d-none d-sm-inline-block <?= ($page ?? '') === 'dashboard' ? 'active' : '' ?>">
      <a href="/user/" class="nav-link">Dashboard</a>
    </li>
    <li class="nav-item d-none d-sm-inline-block <?= ($page ?? '') === 'profile' ? 'active' : '' ?>">
      <a href="/user/profile/" class="nav-link">Edit Profile</a>
    </li>
  </ul>

  <!-- Right navbar links -->
  <ul class="navbar-nav ml-auto">
    <!-- Messages Dropdown Menu -->
    <li class="nav-item">
      <a class="nav-link" href="/user/logout">
        <i class="fa fa-sign-out-alt mr-2"></i> Sign Out
      </a>
    </li>
  </ul>
</nav>

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-navy elevation-4">
  <!-- Brand Logo -->
  <a href="/" class="brand-link">
    <img src="/logo_dark.png" alt="AdminLTE Logo" class="brand-image" style="opacity: .8">
    <span class="brand-text font-weight-light">Template</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel my-3 py-2 d-flex rounded-lg <?= ($page ?? '') === 'profile' ? 'bg-navy' : '' ?>">
      <div class="image">
        <img src="<?= \Config\Services::login()->getAvatarUrl() ?>" alt="">
      </div>
      <div class="info">
        <a href="/user/profile/" class="d-block"><?= \Config\Services::login()->name ?></a>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu">
        <li class="nav-item">
          <a href="/" target="_blank" class="nav-link">
            <i class="nav-icon fas fa-globe"></i>
            <p>
              Website
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="/user/" class="nav-link <?= ($page ?? '') === 'dashboard' ? 'active' : '' ?>">
            <i class="nav-icon fas fa-home"></i>
            <p>
              Dashboard
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="/user/article/" class="nav-link <?= ($page ?? '') === 'article' ? 'active' : '' ?>">
            <i class="nav-icon fas fa-scroll"></i>
            <p>
              Articles
            </p>
          </a>
        </li>

        <?php if (\Config\Services::login()->role === 'admin') : ?>
          <li class="nav-item">
            <a href="/user/manage/" class="nav-link <?= ($page ?? '') === 'users' ? 'active' : '' ?>">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Users
              </p>
            </a>
          </li>
        <?php endif ?>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>