<!-- ===== EXPERIENCE SECTION ===== -->
<section id="experience" class="experience-section section-padding">
  <div class="container">

    <div class="section-header text-center mb-5" data-aos="fade-up">
      <span class="section-tag">My Journey</span>
      <h2 class="section-title">Experience &amp; <span class="text-primary">Training</span></h2>
      <div class="section-divider"></div>
    </div>

    <div class="timeline">
      <?php foreach ($experience as $i => $exp): ?>
      <div class="timeline-item <?= ($i % 2 === 0) ? 'left' : 'right' ?>"
           data-aos="<?= ($i % 2 === 0) ? 'fade-right' : 'fade-left' ?>"
           data-aos-duration="800">
        <div class="timeline-dot">
          <i class="fas <?= ($exp->type === 'work') ? 'fa-briefcase' : 'fa-graduation-cap' ?>"></i>
        </div>
        <div class="timeline-content">
          <div class="timeline-header">
            <span class="timeline-type-badge <?= $exp->type ?>">
              <?= ucfirst($exp->type) ?>
            </span>
            <span class="timeline-duration">
              <i class="fas fa-calendar-alt me-1"></i><?= htmlspecialchars($exp->duration) ?>
            </span>
          </div>
          <h4 class="timeline-role"><?= htmlspecialchars($exp->role) ?></h4>
          <h5 class="timeline-company">
            <i class="fas fa-building me-2 text-primary"></i><?= htmlspecialchars($exp->company) ?>
          </h5>
          <p class="timeline-location">
            <i class="fas fa-map-marker-alt me-1 text-muted"></i><?= htmlspecialchars($exp->location) ?>
          </p>
          <ul class="timeline-desc">
            <?php foreach (explode('. ', $exp->description) as $point): ?>
              <?php if (trim($point)): ?>
              <li><?= htmlspecialchars(trim($point)) ?></li>
              <?php endif; ?>
            <?php endforeach; ?>
          </ul>
        </div>
      </div>
      <?php endforeach; ?>
    </div>

  </div>
</section>
