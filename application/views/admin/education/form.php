<?php $edit = isset($edu); ?>
<div class="mb-3"><a href="<?= site_url('admin/education') ?>" class="btn btn-sm btn-outline-secondary"><i class="fas fa-arrow-left me-1"></i>Back</a></div>
<div class="form-card" style="max-width:700px">
  <h6 class="fw-bold mb-4"><i class="fas fa-graduation-cap text-primary me-2"></i><?= $edit ? 'Edit' : 'Add' ?> Education</h6>
  <?= form_open($edit ? 'admin/education/edit/'.$edu->id : 'admin/education/add') ?>
  <div class="row g-3">
    <div class="col-12"><label class="form-label">Institution *</label><input type="text" name="institution" class="form-control" required value="<?= $edit ? htmlspecialchars($edu->institution) : set_value('institution') ?>"/></div>
    <div class="col-12"><label class="form-label">Degree / Course *</label><input type="text" name="degree" class="form-control" required value="<?= $edit ? htmlspecialchars($edu->degree) : set_value('degree') ?>"/></div>
    <div class="col-md-4"><label class="form-label">Year *</label><input type="text" name="year" class="form-control" required value="<?= $edit ? htmlspecialchars($edu->year) : set_value('year') ?>" placeholder="2020 – 2024"/></div>
    <div class="col-md-4"><label class="form-label">Location *</label><input type="text" name="location" class="form-control" required value="<?= $edit ? htmlspecialchars($edu->location) : set_value('location') ?>"/></div>
    <div class="col-md-4"><label class="form-label">Score / Grade</label><input type="text" name="score" class="form-control" value="<?= $edit ? htmlspecialchars($edu->score) : set_value('score') ?>" placeholder="CGPA: 8.25 or 75%"/></div>
    <div class="col-md-4"><label class="form-label">Sort Order</label><input type="number" name="sort_order" class="form-control" min="0" value="<?= $edit ? $edu->sort_order : set_value('sort_order', 0) ?>"/></div>
    <div class="col-12 mt-2"><button type="submit" class="btn btn-primary px-4"><i class="fas fa-save me-2"></i><?= $edit ? 'Update' : 'Add' ?></button><a href="<?= site_url('admin/education') ?>" class="btn btn-outline-secondary ms-2">Cancel</a></div>
  </div>
  <?= form_close() ?>
</div>
