<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8"/><meta name="viewport" content="width=device-width,initial-scale=1"/>
  <title>Admin Login</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"/>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"/>
  <style>
    body{background:linear-gradient(135deg,#0d0d1a,#1a1a35);min-height:100vh;display:flex;align-items:center;justify-content:center;}
    .login-card{background:#13132a;border:1px solid rgba(108,99,255,.3);border-radius:16px;padding:40px;width:100%;max-width:400px;box-shadow:0 20px 60px rgba(0,0,0,.5);}
    .brand{font-family:monospace;font-size:1.8rem;font-weight:700;color:#fff;text-align:center;margin-bottom:8px;}
    .brand span{color:#6c63ff;}
    .form-control{background:#0d0d1a!important;border:1px solid rgba(108,99,255,.3)!important;color:#e0e0f0!important;border-radius:8px!important;}
    .form-control:focus{border-color:#6c63ff!important;box-shadow:0 0 0 3px rgba(108,99,255,.2)!important;}
    .form-label{color:#aaa;font-size:.88rem;}
    .btn-login{background:#6c63ff;border:none;border-radius:8px;font-weight:600;padding:10px;}
    .btn-login:hover{background:#574fd6;}
  </style>
</head>
<body>
<div class="login-card">
  <div class="brand">&lt;<span>SP</span> /&gt;</div>
  <p class="text-center text-muted mb-4" style="font-size:.85rem">Portfolio Admin Panel</p>

  <?php if (!empty($error)): ?>
  <div class="alert alert-danger py-2 text-center" style="font-size:.85rem"><?= $error ?></div>
  <?php endif; ?>

  <?= form_open('admin/login') ?>
    <div class="mb-3">
      <label class="form-label"><i class="fas fa-user me-1"></i>Username</label>
      <input type="text" name="username" class="form-control" placeholder="admin" required autofocus
             value="<?= set_value('username') ?>"/>
    </div>
    <div class="mb-4">
      <label class="form-label"><i class="fas fa-lock me-1"></i>Password</label>
      <input type="password" name="password" class="form-control" placeholder="••••••••" required/>
    </div>
    <button type="submit" class="btn btn-login text-white w-100">
      <i class="fas fa-sign-in-alt me-2"></i>Login
    </button>
  <?= form_close() ?>

  <p class="text-center mt-3 mb-0">
    <a href="<?= site_url('/') ?>" class="text-muted" style="font-size:.8rem">
      <i class="fas fa-arrow-left me-1"></i>Back to Portfolio
    </a>
  </p>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
