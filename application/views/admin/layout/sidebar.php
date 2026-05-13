<?php $uri = $this->uri->segment(2); // dashboard, skills, projects… ?>
<div id="sidebar">
  <div class="brand">&lt;<span>SP</span> Admin /&gt;</div>
  <nav class="mt-2">
    <div class="nav-section">Main</div>
    <a href="<?= site_url('admin/dashboard') ?>" class="nav-link <?= ($uri=='dashboard'||!$uri)?'active':'' ?>">
      <i class="fas fa-tachometer-alt"></i> Dashboard
    </a>

    <div class="nav-section">Portfolio</div>
    <a href="<?= site_url('admin/profile') ?>" class="nav-link <?= $uri=='profile'?'active':'' ?>">
      <i class="fas fa-user-circle"></i> Profile
    </a>
    <a href="<?= site_url('admin/skills') ?>" class="nav-link <?= $uri=='skills'?'active':'' ?>">
      <i class="fas fa-code"></i> Skills
    </a>
    <a href="<?= site_url('admin/projects') ?>" class="nav-link <?= $uri=='projects'?'active':'' ?>">
      <i class="fas fa-rocket"></i> Projects
    </a>
    <a href="<?= site_url('admin/experience') ?>" class="nav-link <?= $uri=='experience'?'active':'' ?>">
      <i class="fas fa-briefcase"></i> Experience
    </a>
    <a href="<?= site_url('admin/education') ?>" class="nav-link <?= $uri=='education'?'active':'' ?>">
      <i class="fas fa-graduation-cap"></i> Education
    </a>
    <a href="<?= site_url('admin/certifications') ?>" class="nav-link <?= $uri=='certifications'?'active':'' ?>">
      <i class="fas fa-certificate"></i> Certifications
    </a>

    <div class="nav-section">Inbox</div>
    <a href="<?= site_url('admin/messages') ?>" class="nav-link <?= $uri=='messages'?'active':'' ?>">
      <i class="fas fa-envelope"></i> Messages
    </a>

    <div class="nav-section">Account</div>
    <a href="<?= site_url('admin/change_password') ?>" class="nav-link <?= $uri=='change_password'?'active':'' ?>">
      <i class="fas fa-key"></i> Change Password
    </a>
    <a href="<?= site_url('admin/logout') ?>" class="nav-link text-danger">
      <i class="fas fa-sign-out-alt"></i> Logout
    </a>

    <div class="nav-section">Site</div>
    <a href="<?= site_url('/') ?>" target="_blank" class="nav-link">
      <i class="fas fa-external-link-alt"></i> View Portfolio
    </a>
  </nav>
</div>

<div id="main">
  <!-- Topbar -->
  <div id="topbar">
    <div class="d-flex align-items-center gap-3">
      <button class="btn btn-sm btn-light d-md-none" id="sidebarToggle"><i class="fas fa-bars"></i></button>
      <h6 class="page-title"><?= isset($title) ? htmlspecialchars($title) : 'Admin' ?></h6>
    </div>
    <div class="d-flex align-items-center gap-2">
      <span class="text-muted small"><i class="fas fa-user-shield me-1"></i><?= htmlspecialchars($admin_username ?? 'admin') ?></span>
      <a href="<?= site_url('admin/logout') ?>" class="btn btn-sm btn-outline-danger ms-2">
        <i class="fas fa-sign-out-alt"></i>
      </a>
    </div>
  </div>
  <!-- Page Content -->
  <div class="p-4">
