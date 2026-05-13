<?php $edit = isset($project); ?>
<div class="mb-3"><a href="<?= site_url('admin/projects') ?>" class="btn btn-sm btn-outline-secondary"><i class="fas fa-arrow-left me-1"></i>Back</a></div>
<div class="form-card" style="max-width:760px">
  <h6 class="fw-bold mb-4"><i class="fas fa-rocket text-primary me-2"></i><?= $edit ? 'Edit' : 'Add' ?> Project</h6>
  <?= form_open($edit ? 'admin/projects/edit/'.$project->id : 'admin/projects/add') ?>
  <div class="row g-3">
    <div class="col-md-8"><label class="form-label">Project Title *</label><input type="text" name="title" class="form-control" required value="<?= $edit ? htmlspecialchars($project->title) : set_value('title') ?>"/></div>
    <div class="col-md-4"><label class="form-label">Category *</label><input type="text" name="category" class="form-control" required list="cat-list" value="<?= $edit ? htmlspecialchars($project->category) : set_value('category') ?>"/><datalist id="cat-list"><option value="Healthcare"><option value="E-Commerce"><option value="Desktop"><option value="Web"></datalist></div>
    <div class="col-12"><label class="form-label">Description *</label><textarea name="description" class="form-control" rows="3" required><?= $edit ? htmlspecialchars($project->description) : set_value('description') ?></textarea></div>
    <div class="col-12"><label class="form-label">Tech Stack (comma-separated) *</label><input type="text" name="tech_stack" class="form-control" required value="<?= $edit ? htmlspecialchars($project->tech_stack) : set_value('tech_stack') ?>" placeholder="PHP CodeIgniter 3, MySQL, Bootstrap 5"/></div>
    <div class="col-md-6"><label class="form-label">Live URL</label><input type="url" name="live_url" class="form-control" value="<?= $edit ? htmlspecialchars($project->live_url) : set_value('live_url') ?>"/></div>
    <div class="col-md-6"><label class="form-label">GitHub URL</label><input type="url" name="github_url" class="form-control" value="<?= $edit ? htmlspecialchars($project->github_url) : set_value('github_url') ?>"/></div>
    <div class="col-md-6"><label class="form-label">Featured</label><select name="featured" class="form-select"><option value="0" <?= ($edit && !$project->featured) ? 'selected' : '' ?>>No</option><option value="1" <?= ($edit && $project->featured) ? 'selected' : '' ?>>Yes</option></select></div>
    <div class="col-md-6"><label class="form-label">Sort Order</label><input type="number" name="sort_order" class="form-control" min="0" value="<?= $edit ? $project->sort_order : set_value('sort_order', 0) ?>"/></div>
    <div class="col-12 mt-2"><button type="submit" class="btn btn-primary px-4"><i class="fas fa-save me-2"></i><?= $edit ? 'Update' : 'Add' ?> Project</button><a href="<?= site_url('admin/projects') ?>" class="btn btn-outline-secondary ms-2">Cancel</a></div>
  </div>
  <?= form_close() ?>
</div>
