<div class="mb-3"><a href="<?= site_url('admin/messages') ?>" class="btn btn-sm btn-outline-secondary"><i class="fas fa-arrow-left me-1"></i>Back to Messages</a></div>
<div class="form-card" style="max-width:700px">
  <div class="d-flex justify-content-between align-items-start mb-4">
    <h6 class="fw-bold mb-0"><i class="fas fa-envelope-open text-primary me-2"></i>Message from <?= htmlspecialchars($msg->name) ?></h6>
    <a href="<?= site_url('admin/messages/delete/'.$msg->id) ?>" class="btn btn-sm btn-outline-danger" onclick="return confirm('Delete?')"><i class="fas fa-trash me-1"></i>Delete</a>
  </div>
  <table class="table table-borderless" style="font-size:.9rem">
    <tr><th width="120" class="text-muted">From</th><td><?= htmlspecialchars($msg->name) ?></td></tr>
    <tr><th class="text-muted">Email</th><td><a href="mailto:<?= htmlspecialchars($msg->email) ?>"><?= htmlspecialchars($msg->email) ?></a></td></tr>
    <tr><th class="text-muted">Subject</th><td><?= htmlspecialchars($msg->subject ?: '(no subject)') ?></td></tr>
    <tr><th class="text-muted">Date</th><td><?= date('d M Y, h:i A', strtotime($msg->created_at)) ?></td></tr>
  </table>
  <hr/>
  <div class="p-3 bg-light rounded" style="white-space:pre-wrap;font-size:.9rem"><?= htmlspecialchars($msg->message) ?></div>
  <div class="mt-3">
    <a href="mailto:<?= htmlspecialchars($msg->email) ?>?subject=Re: <?= urlencode($msg->subject) ?>" class="btn btn-primary btn-sm">
      <i class="fas fa-reply me-1"></i>Reply via Email
    </a>
  </div>
</div>
