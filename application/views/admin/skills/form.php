<?php $edit = isset($skill); ?>
<div class="mb-3">
  <a href="<?= site_url('admin/skills') ?>" class="btn btn-sm btn-outline-secondary"><i class="fas fa-arrow-left me-1"></i>Back</a>
</div>
<div class="form-card" style="max-width:600px">
  <h6 class="fw-bold mb-4"><i class="fas fa-code text-primary me-2"></i><?= $edit ? 'Edit' : 'Add' ?> Skill</h6>
  <?= form_open($edit ? 'admin/skills/edit/'.$skill->id : 'admin/skills/add') ?>
  <div class="row g-3">
    <div class="col-md-6">
      <label class="form-label">Skill Name *</label>
      <input type="text" name="name" class="form-control" required
             value="<?= $edit ? htmlspecialchars($skill->name) : set_value('name') ?>" placeholder="e.g. PHP CodeIgniter 3"/>
    </div>
    <div class="col-md-6">
      <label class="form-label">Category *</label>
      <input type="text" name="category" class="form-control" required list="cat-list"
             value="<?= $edit ? htmlspecialchars($skill->category) : set_value('category') ?>" placeholder="e.g. Languages"/>
      <datalist id="cat-list">
        <option value="Languages"><option value="Backend"><option value="Databases"><option value="Tools">
      </datalist>
    </div>
    <div class="col-md-6">
      <label class="form-label">Font Awesome Icon Class</label>
      <input type="text" name="icon" class="form-control"
             value="<?= $edit ? htmlspecialchars($skill->icon) : set_value('icon') ?>" placeholder="fab fa-php"/>
      <div class="form-text">e.g. <code>fab fa-php</code>, <code>fas fa-database</code></div>
    </div>
    <div class="col-md-3">
      <label class="form-label">Percentage (1–100) *</label>
      <input type="number" name="percentage" class="form-control" min="1" max="100" required
             value="<?= $edit ? $skill->percentage : set_value('percentage', 80) ?>"/>
    </div>
    <div class="col-md-3">
      <label class="form-label">Sort Order</label>
      <input type="number" name="sort_order" class="form-control" min="0"
             value="<?= $edit ? $skill->sort_order : set_value('sort_order', 0) ?>"/>
    </div>
    <div class="col-12 mt-2">
      <button type="submit" class="btn btn-primary px-4"><i class="fas fa-save me-2"></i><?= $edit ? 'Update' : 'Add' ?> Skill</button>
      <a href="<?= site_url('admin/skills') ?>" class="btn btn-outline-secondary ms-2">Cancel</a>
    </div>
  </div>
  <?= form_close() ?>
</div>
