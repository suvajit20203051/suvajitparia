<?php if (!empty($success)): ?><div class="alert alert-success alert-dismissible fade show"><?= $success ?><button type="button" class="btn-close" data-bs-dismiss="alert"></button></div><?php endif; ?>
<div class="d-flex justify-content-between align-items-center mb-3">
  <h6 class="fw-bold mb-0">Contact Messages (<?= count($messages) ?>)</h6>
</div>
<div class="form-card p-0">
  <div class="table-responsive">
    <table class="table table-hover align-middle mb-0">
      <thead class="table-light"><tr><th>#</th><th>Name</th><th>Email</th><th>Subject</th><th>Date</th><th>Status</th><th>Actions</th></tr></thead>
      <tbody>
      <?php if (empty($messages)): ?><tr><td colspan="7" class="text-center text-muted py-4">No messages yet.</td></tr>
      <?php else: foreach ($messages as $i => $m): ?>
      <tr class="<?= !$m->is_read ? 'fw-semibold' : '' ?>">
        <td class="text-muted"><?= $i+1 ?></td>
        <td><?= htmlspecialchars($m->name) ?></td>
        <td style="font-size:.85rem"><?= htmlspecialchars($m->email) ?></td>
        <td style="font-size:.85rem"><?= htmlspecialchars($m->subject ?: '(no subject)') ?></td>
        <td style="font-size:.8rem;white-space:nowrap"><?= date('d M Y', strtotime($m->created_at)) ?></td>
        <td><?= $m->is_read ? '<span class="badge bg-secondary">Read</span>' : '<span class="badge bg-primary">New</span>' ?></td>
        <td>
          <a href="<?= site_url('admin/messages/view/'.$m->id) ?>" class="btn btn-sm btn-outline-primary py-0 px-2"><i class="fas fa-eye"></i></a>
          <a href="<?= site_url('admin/messages/delete/'.$m->id) ?>" class="btn btn-sm btn-outline-danger py-0 px-2" onclick="return confirm('Delete this message?')"><i class="fas fa-trash"></i></a>
        </td>
      </tr>
      <?php endforeach; endif; ?>
      </tbody>
    </table>
  </div>
</div>
