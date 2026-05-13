<?php if (!empty($success)): ?><div class="alert alert-success alert-dismissible fade show"><?= $success ?><button type="button" class="btn-close" data-bs-dismiss="alert"></button></div><?php endif; ?>
<div class="d-flex justify-content-between align-items-center mb-3">
  <h6 class="fw-bold mb-0">All Projects (<?= count($projects) ?>)</h6>
  <a href="<?= site_url('admin/projects/add') ?>" class="btn btn-primary btn-sm"><i class="fas fa-plus me-1"></i>Add Project</a>
</div>
<div class="form-card p-0">
  <div class="table-responsive">
    <table class="table table-hover align-middle mb-0">
      <thead class="table-light"><tr><th>#</th><th>Title</th><th>Category</th><th>Featured</th><th>Order</th><th>Actions</th></tr></thead>
      <tbody>
      <?php if (empty($projects)): ?>
        <tr><td colspan="6" class="text-center text-muted py-4">No projects yet.</td></tr>
      <?php else: ?>
      <?php foreach ($projects as $i => $p): ?>
      <tr>
        <td class="text-muted"><?= $i+1 ?></td>
        <td><strong><?= htmlspecialchars($p->title) ?></strong><br/><small class="text-muted"><?= substr(htmlspecialchars($p->description), 0, 60) ?>...</small></td>
        <td><span class="badge bg-light text-dark border"><?= htmlspecialchars($p->category) ?></span></td>
        <td><?= $p->featured ? '<span class="badge bg-warning text-dark"><i class="fas fa-star"></i> Featured</span>' : '' ?></td>
        <td><?= $p->sort_order ?></td>
        <td>
          <a href="<?= site_url('admin/projects/edit/'.$p->id) ?>" class="btn btn-sm btn-outline-primary py-0 px-2"><i class="fas fa-edit"></i></a>
          <a href="<?= site_url('admin/projects/delete/'.$p->id) ?>" class="btn btn-sm btn-outline-danger py-0 px-2"
             onclick="return confirm('Delete this project?')"><i class="fas fa-trash"></i></a>
        </td>
      </tr>
      <?php endforeach; ?>
      <?php endif; ?>
      </tbody>
    </table>
  </div>
</div>
