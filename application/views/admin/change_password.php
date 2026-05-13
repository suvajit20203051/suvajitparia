<?php if (!empty($success)): ?><div class="alert alert-success alert-dismissible fade show"><?= $success ?><button type="button" class="btn-close" data-bs-dismiss="alert"></button></div><?php endif; ?>
<?php if (!empty($error)):   ?><div class="alert alert-danger  alert-dismissible fade show"><?= $error   ?><button type="button" class="btn-close" data-bs-dismiss="alert"></button></div><?php endif; ?>
<div class="form-card" style="max-width:480px">
  <h6 class="fw-bold mb-4"><i class="fas fa-key text-primary me-2"></i>Change Password</h6>
  <?= form_open('admin/change_password') ?>
  <div class="mb-3"><label class="form-label">Current Password *</label><input type="password" name="current_password" class="form-control" required/></div>
  <div class="mb-3"><label class="form-label">New Password * <small class="text-muted">(min 6 chars)</small></label><input type="password" name="new_password" class="form-control" required minlength="6"/></div>
  <div class="mb-4"><label class="form-label">Confirm New Password *</label><input type="password" name="confirm_password" class="form-control" required/></div>
  <button type="submit" class="btn btn-primary px-4"><i class="fas fa-save me-2"></i>Update Password</button>
  <?= form_close() ?>
</div>
