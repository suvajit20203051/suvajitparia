<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="description" content="<?= htmlspecialchars($profile->name) ?> – Portfolio | Full Stack Web Developer" />
  <title><?= htmlspecialchars($profile->name) ?> | Portfolio</title>

  <!-- Favicon -->
  <link rel="icon" type="image/png" href="<?= base_url('assets/img/favicon.png') ?>" />

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&family=Fira+Code:wght@400;500&display=swap" rel="stylesheet" />

  <!-- Bootstrap 5 -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" />

  <!-- Font Awesome 6 -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />

  <!-- Animate.css -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

  <!-- AOS (Animate On Scroll) -->
  <link rel="stylesheet" href="https://unpkg.com/aos@2.3.4/dist/aos.css" />

  <!-- Custom CSS -->
  <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>" />
</head>
<body data-bs-spy="scroll" data-bs-target="#mainNav" data-bs-offset="70">

<!-- Preloader -->
<div id="preloader">
  <div class="preloader-inner">
    <div class="preloader-logo">&lt;SP /&gt;</div>
    <div class="preloader-bar"><div class="preloader-fill"></div></div>
  </div>
</div>

<!-- Hide preloader as soon as DOM is ready — does not wait for CDN scripts -->
<script>
  document.addEventListener('DOMContentLoaded', function () {
    setTimeout(function () {
      var p = document.getElementById('preloader');
      if (p) p.classList.add('hidden');
    }, 600);
  });
  // Absolute fallback
  setTimeout(function () {
    var p = document.getElementById('preloader');
    if (p) p.classList.add('hidden');
  }, 2500);
</script>

<!-- Particles Background -->
<div id="particles-js"></div>

<!-- Flash Messages -->
<?php if ($flash_success): ?>
<div class="alert alert-success alert-dismissible fade show fixed-top mx-3 mt-2 shadow" role="alert" style="z-index:9999">
  <i class="fas fa-check-circle me-2"></i><?= $flash_success ?>
  <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
</div>
<?php endif; ?>
<?php if ($flash_error): ?>
<div class="alert alert-danger alert-dismissible fade show fixed-top mx-3 mt-2 shadow" role="alert" style="z-index:9999">
  <i class="fas fa-exclamation-circle me-2"></i><?= $flash_error ?>
  <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
</div>
<?php endif; ?>
