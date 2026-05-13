<?php
$resume_path = FCPATH . 'assets/resume/Suvajit_Paria_Resume.pdf';
$resume_exists = file_exists($resume_path);
$avatar_path   = FCPATH . 'assets/img/' . ($profile->profile_image ?? 'avatar.png');
$avatar_exists = file_exists($avatar_path);
?>

<?php if (!empty($success)): ?>
<div class="alert alert-success alert-dismissible fade show">
  <i class="fas fa-check-circle me-2"></i><?= $success ?>
  <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
</div>
<?php endif; ?>
<?php if (!empty($error)): ?>
<div class="alert alert-danger alert-dismissible fade show">
  <i class="fas fa-exclamation-circle me-2"></i><?= $error ?>
  <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
</div>
<?php endif; ?>

<?= form_open_multipart('admin/profile/update') ?>
<div class="row g-4" style="max-width:900px">

  <!-- ── Left: Uploads ──────────────────────────────────────── -->
  <div class="col-lg-4">

    <!-- Profile Picture -->
    <div class="form-card text-center mb-4">
      <h6 class="fw-bold mb-3"><i class="fas fa-camera text-primary me-2"></i>Profile Picture</h6>
      <div class="mb-3">
        <img id="avatarPreview"
             src="<?= $avatar_exists ? base_url('assets/img/'.htmlspecialchars($profile->profile_image ?? 'avatar.png')).'?v='.time() : 'https://ui-avatars.com/api/?name='.urlencode($profile->name).'&size=160&background=6c63ff&color=fff' ?>"
             alt="Profile"
             style="width:120px;height:120px;border-radius:50%;object-fit:cover;border:3px solid #6c63ff;"/>
      </div>
      <label class="form-label d-block text-start">Upload New Photo</label>
      <input type="file" name="profile_image" id="profile_image" class="form-control"
             accept=".jpg,.jpeg,.png,.gif,.webp"
             onchange="previewAvatar(this)"/>
      <div class="form-text">JPG, PNG, WEBP — max 2 MB</div>
    </div>

    <!-- Resume Upload -->
    <div class="form-card">
      <h6 class="fw-bold mb-3"><i class="fas fa-file-pdf text-danger me-2"></i>Resume / CV</h6>

      <?php if ($resume_exists): ?>
      <div class="d-flex align-items-center gap-2 mb-3 p-2 bg-light rounded border">
        <i class="fas fa-file-pdf text-danger fa-lg"></i>
        <div class="flex-grow-1">
          <div style="font-size:.82rem;font-weight:600">Suvajit_Paria_Resume.pdf</div>
          <div style="font-size:.75rem;color:#888"><?= round(filesize($resume_path)/1024, 1) ?> KB</div>
        </div>
        <a href="<?= base_url('assets/resume/Suvajit_Paria_Resume.pdf') ?>" target="_blank"
           class="btn btn-sm btn-outline-danger py-0 px-2" title="Preview">
          <i class="fas fa-eye"></i>
        </a>
      </div>
      <?php else: ?>
      <div class="alert alert-warning py-2 mb-3" style="font-size:.82rem">
        <i class="fas fa-exclamation-triangle me-1"></i>No resume uploaded yet.
      </div>
      <?php endif; ?>

      <label class="form-label"><?= $resume_exists ? 'Replace Resume' : 'Upload Resume' ?></label>
      <input type="file" name="resume" class="form-control" accept=".pdf"/>
      <div class="form-text">PDF only — max 5 MB. Filename will be saved as <code>Suvajit_Paria_Resume.pdf</code></div>

      <?php if ($resume_exists): ?>
      <a href="<?= base_url('assets/resume/Suvajit_Paria_Resume.pdf') ?>" download
         class="btn btn-outline-danger btn-sm mt-2 w-100">
        <i class="fas fa-download me-1"></i>Download Current Resume
      </a>
      <?php endif; ?>
    </div>

  </div>

  <!-- ── Right: Profile Fields ──────────────────────────────── -->
  <div class="col-lg-8">
    <div class="form-card">
      <h6 class="fw-bold mb-4"><i class="fas fa-user-edit text-primary me-2"></i>Profile Information</h6>
      <div class="row g-3">

        <div class="col-md-6">
          <label class="form-label">Full Name *</label>
          <input type="text" name="name" class="form-control" required
                 value="<?= htmlspecialchars($profile->name) ?>"/>
        </div>
        <div class="col-md-6">
          <label class="form-label">Email *</label>
          <input type="email" name="email" class="form-control" required
                 value="<?= htmlspecialchars($profile->email) ?>"/>
        </div>
        <div class="col-12">
          <label class="form-label">Tagline *</label>
          <input type="text" name="tagline" class="form-control" required
                 value="<?= htmlspecialchars($profile->tagline) ?>"
                 placeholder="Full Stack Web Developer | PHP CodeIgniter 3 | Java"/>
        </div>
        <div class="col-12">
          <label class="form-label">Bio *</label>
          <textarea name="bio" class="form-control" rows="4" required><?= htmlspecialchars($profile->bio) ?></textarea>
        </div>
        <div class="col-md-6">
          <label class="form-label">Phone *</label>
          <input type="text" name="phone" class="form-control" required
                 value="<?= htmlspecialchars($profile->phone) ?>"/>
        </div>
        <div class="col-md-6">
          <label class="form-label">Location *</label>
          <input type="text" name="location" class="form-control" required
                 value="<?= htmlspecialchars($profile->location) ?>"/>
        </div>

        <div class="col-12"><hr class="my-1"/><p class="text-muted mb-2" style="font-size:.82rem">Social Links</p></div>

        <div class="col-12">
          <label class="form-label"><i class="fab fa-github me-1"></i>GitHub URL</label>
          <input type="url" name="github" class="form-control"
                 value="<?= htmlspecialchars($profile->github) ?>"/>
        </div>
        <div class="col-12">
          <label class="form-label"><i class="fab fa-linkedin me-1"></i>LinkedIn URL</label>
          <input type="url" name="linkedin" class="form-control"
                 value="<?= htmlspecialchars($profile->linkedin) ?>"/>
        </div>
        <div class="col-12">
          <label class="form-label"><i class="fab fa-hackerrank me-1"></i>HackerRank URL</label>
          <input type="url" name="hackerrank" class="form-control"
                 value="<?= htmlspecialchars($profile->hackerrank) ?>"/>
        </div>

        <div class="col-12 mt-2">
          <button type="submit" class="btn btn-primary px-5">
            <i class="fas fa-save me-2"></i>Save All Changes
          </button>
        </div>

      </div>
    </div>
  </div>

</div>
<?= form_close() ?>

<script>
function previewAvatar(input) {
  if (input.files && input.files[0]) {
    const reader = new FileReader();
    reader.onload = e => document.getElementById('avatarPreview').src = e.target.result;
    reader.readAsDataURL(input.files[0]);
  }
}
</script>
