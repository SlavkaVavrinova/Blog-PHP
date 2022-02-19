<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
    <div class="sidebar-brand-icon rotate-n-15">
      <i class="fas fa-edit"></i>
    </div>
    <div class="sidebar-brand-text mx-3">Administrace</div>
  </a>

  <hr class="sidebar-divider my-0" />

  <li class="nav-item<?php echo $this->title === "Dashboard" ? " active" : null; ?>">
    <a class="nav-link" href="?page=home">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>Dashboard</span></a>
  </li>

  <li class="nav-item<?php echo $this->title === "Blog" ? " active" : null; ?>">
    <a class="nav-link" href="?page=blog">
      <i class="fas fa-fw fa-paperclip"></i>
      <span>Blog</span></a>
  </li>

  <li class="nav-item<?php echo $this->title === "Uživatelé" ? " active" : null; ?>">
    <a class="nav-link" href="?page=user">
      <i class="fas fa-fw fa-user"></i>
      <span>Uživatelé</span></a>
  </li>

  <hr class="sidebar-divider d-none d-md-block" />

  <!-- Sidebar Toggler (Sidebar) -->
  <div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
  </div>
</ul>