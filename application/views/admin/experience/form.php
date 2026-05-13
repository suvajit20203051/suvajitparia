<?php $edit = isset($exp); ?>
<div class="mb-3"><a href="<?= site_url('admin/experience') ?>" class="btn btn-sm btn-outline-secondary"><i class="fas fa-arrow-left me-1"></i>Back</a></div>
<div class="form-card" style="max-width:760px">
  <h6 class="fw-bold mb-4"><i class="fas fa-briefcase text-primary me-2"></i><?= $edit ? 'Edit' : 'Add' ?> Experience</h6>
  <?= form_open($edit ? 'admin/experience/edit/'.$exp->id : 'admin/experience/add') ?>
  <div class="row g-3">
    <div class="col-md-6"><label class="form-label">Company *</label><input type="text" name="company" class="form-control" required value="<?= $edit ? htmlspecialchars($exp->company) : set_value('company') ?>"/></div>
    <div class="col-md-6"><label class="form-label">Role / Position *</label><input type="text" name="role" class="form-control" required value="<?= $edit ? htmlspecialchars($exp->role) : set_value('role') ?>"/></div>
    <div class="col-md-6"><label class="form-label">Duration *</label><input type="text" name="duration" class="form-control" required value="<?= $edit ? htmlspecialchars($exp->duration) : set_value('duration') ?>" placeholder="Jan 2024 – Present"/></div>
    <div class="col-md-6"><label class="form-label">Location *</label><input type="text" name="location" class="form-control" required value="<?= $edit ? htmlspecialchars($exp->location) : set_value('location') ?>"/></div>
    <div class="col-12"><label class="form-label">Description *</label><textarea name="description" class="form-control" rows="4" required><?= $edit ? htmlspecialchars($exp->description) : set_value('description') ?></textarea><div class="form-text">Separate bullet points with a period and space.</div></div>
    <div class="col-md-6"><label class="form-label">Type *</label><select name="type" class="form-select"><option value="work" <?= ($edit && $exp->type=='work') ? 'selected' : '' ?>>Work</option><option value="training" <?= ($edit && $exp->type=='training') ? 'selected' : '' ?>>Training</option></select></div>
    <div class="col-md-6"><label class="form-label">Sort Order</label><input type="number" name="sort_order" class="form-control" min="0" value="<?= $edit ? $exp->sort_order : set_value('sort_order', 0) ?>"/></div>
    <div class="col-12 mt-2"><button type="submit" class="btn btn-primary px-4"><i class="fas fa-save me-2"></i><?= $edit ? 'Update' : 'Add' ?></button><a href="<?= site_url('admin/experience') ?>" class="btn btn-outline-secondary ms-2">Cancel</a></div>
  </div>
  <?= form_close() ?>
</div>
