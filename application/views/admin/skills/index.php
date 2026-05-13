<?php if (!empty($success)): ?><div class="alert alert-success alert-dismissible fade show"><?= $success ?><button type="button" class="btn-close" data-bs-dismiss="alert"></button></div><?php endif; ?>
<?php if (!empty($error)):   ?><div class="alert alert-danger  alert-dismissible fade show"><?= $error   ?><button type="button" class="btn-close" data-bs-dismiss="alert"></button></div><?php endif; ?>

<div class="d-flex justify-content-between align-items-center mb-3">
  <h6 class="fw-bold mb-0">All Skills (<?= count($skills) ?>)</h6>
  <a href="<?= site_url('admin/skills/add') ?>" class="btn btn-primary btn-sm"><i class="fas fa-plus me-1"></i>Add Skill</a>
</div>

<div class="form-card p-0">
  <div class="table-responsive">
    <table class="table table-hover align-middle mb-0">
      <thead class="table-light"><tr><th>#</th><th>Name</th><th>Category</th><th>Icon</th><th>%</th><th>Order</th><th>Actions</th></tr></thead>
      <tbody>
      <?php if (empty($skills)): ?>
        <tr><td colspan="7" class="text-center text-muted py-4">No skills yet. <a href="<?= site_url('admin/skills/add') ?>">Add one</a></td></tr>
      <?php else: ?>
      <?php foreach ($skills as $i => $s): ?>
      <tr>
        <td class="text-muted"><?= $i+1 ?></td>
        <td><i class="<?= htmlspecialchars($s->icon) ?> me-2 text-primary"></i><?= htmlspecialchars($s->name) ?></td>
        <td><span class="badge bg-light text-dark border"><?= htmlspecialchars($s->category) ?></span></td>
        <td><code style="font-size:.75rem"><?= htmlspecialchars($s->icon) ?></code></td>
        <td>
          <div class="d-flex align-items-center gap-2">
            <div class="progress flex-grow-1" style="height:6px;width:80px">
              <div class="progress-bar bg-primary" style="width:<?= $s->percentage ?>%"></div>
            </div>
            <span style="font-size:.8rem"><?= $s->percentage ?>%</span>
          </div>
        </td>
        <td><?= $s->sort_order ?></td>
        <td>
          <a href="<?= site_url('admin/skills/edit/'.$s->id) ?>" class="btn btn-sm btn-outline-primary py-0 px-2"><i class="fas fa-edit"></i></a>
          <a href="<?= site_url('admin/skills/delete/'.$s->id) ?>" class="btn btn-sm btn-outline-danger py-0 px-2"
             onclick="return confirm('Delete this skill?')"><i class="fas fa-trash"></i></a>
        </td>
      </tr>
      <?php endforeach; ?>
      <?php endif; ?>
      </tbody>
    </table>
  </div>
</div>
