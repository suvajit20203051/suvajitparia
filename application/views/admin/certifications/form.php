<?php $edit = isset($cert); ?>
<div class="mb-3"><a href="<?= site_url('admin/certifications') ?>" class="btn btn-sm btn-outline-secondary"><i class="fas fa-arrow-left me-1"></i>Back</a></div>
<div class="form-card" style="max-width:600px">
  <h6 class="fw-bold mb-4"><i class="fas fa-certificate text-primary me-2"></i><?= $edit ? 'Edit' : 'Add' ?> Certification</h6>
  <?= form_open($edit ? 'admin/certifications/edit/'.$cert->id : 'admin/certifications/add') ?>
  <div class="row g-3">
    <div class="col-12"><label class="form-label">Certificate Title *</label><input type="text" name="title" class="form-control" required value="<?= $edit ? htmlspecialchars($cert->title) : set_value('title') ?>"/></div>
    <div class="col-md-6"><label class="form-label">Issuer *</label><input type="text" name="issuer" class="form-control" required value="<?= $edit ? htmlspecialchars($cert->issuer) : set_value('issuer') ?>" placeholder="Udemy, Coursera…"/></div>
    <div class="col-md-6"><label class="form-label">Year</label><input type="text" name="year" class="form-control" value="<?= $edit ? htmlspecialchars($cert->year) : set_value('year') ?>" placeholder="2024"/></div>
    <div class="col-12 mt-2"><button type="submit" class="btn btn-primary px-4"><i class="fas fa-save me-2"></i><?= $edit ? 'Update' : 'Add' ?></button><a href="<?= site_url('admin/certifications') ?>" class="btn btn-outline-secondary ms-2">Cancel</a></div>
  </div>
  <?= form_close() ?>
</div>
