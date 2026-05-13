<?php
$cards = [
  ['label'=>'Skills',         'count'=>$counts['skills'],         'icon'=>'fa-code',            'color'=>'#6c63ff', 'url'=>'admin/skills'],
  ['label'=>'Projects',       'count'=>$counts['projects'],       'icon'=>'fa-rocket',          'color'=>'#fd79a8', 'url'=>'admin/projects'],
  ['label'=>'Experience',     'count'=>$counts['experience'],     'icon'=>'fa-briefcase',       'color'=>'#00b894', 'url'=>'admin/experience'],
  ['label'=>'Education',      'count'=>$counts['education'],      'icon'=>'fa-graduation-cap',  'color'=>'#fdcb6e', 'url'=>'admin/education'],
  ['label'=>'Certifications', 'count'=>$counts['certifications'], 'icon'=>'fa-certificate',     'color'=>'#e17055', 'url'=>'admin/certifications'],
  ['label'=>'Messages',       'count'=>$counts['messages'],       'icon'=>'fa-envelope',        'color'=>'#0984e3', 'url'=>'admin/messages',
   'badge'=>$counts['unread']],
];
?>

<!-- Stats Grid -->
<div class="row g-3 mb-4">
  <?php foreach ($cards as $c): ?>
  <div class="col-6 col-md-4 col-lg-2">
    <a href="<?= site_url($c['url']) ?>" class="text-decoration-none">
      <div class="stat-card text-center">
        <div class="stat-icon mx-auto mb-2" style="background:<?= $c['color'] ?>22;color:<?= $c['color'] ?>">
          <i class="fas <?= $c['icon'] ?>"></i>
        </div>
        <div class="fw-bold fs-4" style="color:<?= $c['color'] ?>"><?= $c['count'] ?>
          <?php if (!empty($c['badge'])): ?>
          <span class="badge bg-danger" style="font-size:.6rem"><?= $c['badge'] ?></span>
          <?php endif; ?>
        </div>
        <div class="text-muted" style="font-size:.78rem"><?= $c['label'] ?></div>
      </div>
    </a>
  </div>
  <?php endforeach; ?>
</div>

<!-- Quick Actions + Recent Messages -->
<div class="row g-4">
  <div class="col-lg-4">
    <div class="form-card h-100">
      <h6 class="fw-bold mb-3"><i class="fas fa-bolt text-warning me-2"></i>Quick Actions</h6>
      <div class="d-grid gap-2">
        <a href="<?= site_url('admin/skills/add') ?>"          class="btn btn-outline-primary btn-sm"><i class="fas fa-plus me-2"></i>Add Skill</a>
        <a href="<?= site_url('admin/projects/add') ?>"        class="btn btn-outline-primary btn-sm"><i class="fas fa-plus me-2"></i>Add Project</a>
        <a href="<?= site_url('admin/experience/add') ?>"      class="btn btn-outline-primary btn-sm"><i class="fas fa-plus me-2"></i>Add Experience</a>
        <a href="<?= site_url('admin/education/add') ?>"       class="btn btn-outline-primary btn-sm"><i class="fas fa-plus me-2"></i>Add Education</a>
        <a href="<?= site_url('admin/certifications/add') ?>"  class="btn btn-outline-primary btn-sm"><i class="fas fa-plus me-2"></i>Add Certification</a>
        <a href="<?= site_url('admin/profile') ?>"             class="btn btn-outline-secondary btn-sm"><i class="fas fa-user-edit me-2"></i>Edit Profile</a>
        <a href="<?= site_url('/') ?>" target="_blank"         class="btn btn-outline-success btn-sm"><i class="fas fa-eye me-2"></i>View Portfolio</a>
      </div>
    </div>
  </div>

  <div class="col-lg-8">
    <div class="form-card">
      <div class="d-flex justify-content-between align-items-center mb-3">
        <h6 class="fw-bold mb-0"><i class="fas fa-envelope text-primary me-2"></i>Recent Messages</h6>
        <a href="<?= site_url('admin/messages') ?>" class="btn btn-sm btn-outline-primary">View All</a>
      </div>
      <?php if (empty($messages)): ?>
        <p class="text-muted text-center py-3">No messages yet.</p>
      <?php else: ?>
      <div class="table-responsive">
        <table class="table table-hover align-middle mb-0">
          <thead><tr><th>Name</th><th>Subject</th><th>Date</th><th></th></tr></thead>
          <tbody>
          <?php foreach ($messages as $m): ?>
          <tr class="<?= !$m->is_read ? 'table-primary' : '' ?>">
            <td>
              <?php if (!$m->is_read): ?><span class="badge bg-primary me-1" style="font-size:.6rem">New</span><?php endif; ?>
              <?= htmlspecialchars($m->name) ?>
            </td>
            <td class="text-muted" style="font-size:.85rem"><?= htmlspecialchars($m->subject ?: '(no subject)') ?></td>
            <td class="text-muted" style="font-size:.8rem"><?= date('d M', strtotime($m->created_at)) ?></td>
            <td><a href="<?= site_url('admin/messages/view/'.$m->id) ?>" class="btn btn-xs btn-sm btn-outline-secondary py-0 px-2">View</a></td>
          </tr>
          <?php endforeach; ?>
          </tbody>
        </table>
      </div>
      <?php endif; ?>
    </div>
  </div>
</div>
