<?php if (!empty($success)): ?><div class="alert alert-success alert-dismissible fade show"><?= $success ?><button type="button" class="btn-close" data-bs-dismiss="alert"></button></div><?php endif; ?>
<div class="d-flex justify-content-between align-items-center mb-3">
  <h6 class="fw-bold mb-0">Education (<?= count($education) ?>)</h6>
  <a href="<?= site_url('admin/education/add') ?>" class="btn btn-primary btn-sm"><i class="fas fa-plus me-1"></i>Add</a>
</div>
<div class="form-card p-0">
  <div class="table-responsive">
    <table class="table table-hover align-middle mb-0">
      <thead class="table-light"><tr><th>#</th><th>Degree / Institution</th><th>Year</th><th>Score</th><th>Order</th><th>Actions</th></tr></thead>
      <tbody>
      <?php if (empty($education)): ?><tr><td colspan="6" class="text-center text-muted py-4">No education yet.</td></tr>
      <?php else: foreach ($education as $i => $e): ?>
      <tr>
        <td class="text-muted"><?= $i+1 ?></td>
        <td><strong><?= htmlspecialchars($e->degree) ?></strong><br/><small class="text-muted"><?= htmlspecialchars($e->institution) ?></small></td>
        <td><?= htmlspecialchars($e->year) ?></td>
        <td><?= htmlspecialchars($e->score) ?></td>
        <td><?= $e->sort_order ?></td>
        <td>
          <a href="<?= site_url('admin/education/edit/'.$e->id) ?>" class="btn btn-sm btn-outline-primary py-0 px-2"><i class="fas fa-edit"></i></a>
          <a href="<?= site_url('admin/education/delete/'.$e->id) ?>" class="btn btn-sm btn-outline-danger py-0 px-2" onclick="return confirm('Delete?')"><i class="fas fa-trash"></i></a>
        </td>
      </tr>
      <?php endforeach; endif; ?>
      </tbody>
    </table>
  </div>
</div>
