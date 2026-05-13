<?php if (!empty($success)): ?><div class="alert alert-success alert-dismissible fade show"><?= $success ?><button type="button" class="btn-close" data-bs-dismiss="alert"></button></div><?php endif; ?>
<div class="d-flex justify-content-between align-items-center mb-3">
  <h6 class="fw-bold mb-0">Experience (<?= count($experience) ?>)</h6>
  <a href="<?= site_url('admin/experience/add') ?>" class="btn btn-primary btn-sm"><i class="fas fa-plus me-1"></i>Add</a>
</div>
<div class="form-card p-0">
  <div class="table-responsive">
    <table class="table table-hover align-middle mb-0">
      <thead class="table-light"><tr><th>#</th><th>Role / Company</th><th>Duration</th><th>Type</th><th>Order</th><th>Actions</th></tr></thead>
      <tbody>
      <?php if (empty($experience)): ?><tr><td colspan="6" class="text-center text-muted py-4">No experience yet.</td></tr>
      <?php else: foreach ($experience as $i => $e): ?>
      <tr>
        <td class="text-muted"><?= $i+1 ?></td>
        <td><strong><?= htmlspecialchars($e->role) ?></strong><br/><small class="text-muted"><?= htmlspecialchars($e->company) ?></small></td>
        <td style="font-size:.85rem"><?= htmlspecialchars($e->duration) ?></td>
        <td><span class="badge badge-<?= $e->type ?>"><?= ucfirst($e->type) ?></span></td>
        <td><?= $e->sort_order ?></td>
        <td>
          <a href="<?= site_url('admin/experience/edit/'.$e->id) ?>" class="btn btn-sm btn-outline-primary py-0 px-2"><i class="fas fa-edit"></i></a>
          <a href="<?= site_url('admin/experience/delete/'.$e->id) ?>" class="btn btn-sm btn-outline-danger py-0 px-2" onclick="return confirm('Delete?')"><i class="fas fa-trash"></i></a>
        </td>
      </tr>
      <?php endforeach; endif; ?>
      </tbody>
    </table>
  </div>
</div>
