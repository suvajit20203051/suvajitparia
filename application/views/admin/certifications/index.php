<?php if (!empty($success)): ?><div class="alert alert-success alert-dismissible fade show"><?= $success ?><button type="button" class="btn-close" data-bs-dismiss="alert"></button></div><?php endif; ?>
<div class="d-flex justify-content-between align-items-center mb-3">
  <h6 class="fw-bold mb-0">Certifications (<?= count($certs) ?>)</h6>
  <a href="<?= site_url('admin/certifications/add') ?>" class="btn btn-primary btn-sm"><i class="fas fa-plus me-1"></i>Add</a>
</div>
<div class="form-card p-0">
  <div class="table-responsive">
    <table class="table table-hover align-middle mb-0">
      <thead class="table-light"><tr><th>#</th><th>Title</th><th>Issuer</th><th>Year</th><th>Actions</th></tr></thead>
      <tbody>
      <?php if (empty($certs)): ?><tr><td colspan="5" class="text-center text-muted py-4">No certifications yet.</td></tr>
      <?php else: foreach ($certs as $i => $c): ?>
      <tr>
        <td class="text-muted"><?= $i+1 ?></td>
        <td><i class="fas fa-award text-warning me-2"></i><?= htmlspecialchars($c->title) ?></td>
        <td><?= htmlspecialchars($c->issuer) ?></td>
        <td><?= htmlspecialchars($c->year) ?></td>
        <td>
          <a href="<?= site_url('admin/certifications/edit/'.$c->id) ?>" class="btn btn-sm btn-outline-primary py-0 px-2"><i class="fas fa-edit"></i></a>
          <a href="<?= site_url('admin/certifications/delete/'.$c->id) ?>" class="btn btn-sm btn-outline-danger py-0 px-2" onclick="return confirm('Delete?')"><i class="fas fa-trash"></i></a>
        </td>
      </tr>
      <?php endforeach; endif; ?>
      </tbody>
    </table>
  </div>
</div>
