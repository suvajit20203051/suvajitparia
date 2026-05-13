<!-- ===== EDUCATION SECTION ===== -->
<section id="education" class="education-section section-padding">
  <div class="container">

    <div class="section-header text-center mb-5" data-aos="fade-up">
      <span class="section-tag">Academic Background</span>
      <h2 class="section-title">My <span class="text-primary">Education</span></h2>
      <div class="section-divider"></div>
    </div>

    <div class="row justify-content-center g-4">
      <?php foreach ($education as $i => $edu): ?>
      <div class="col-md-6 col-lg-4" data-aos="flip-left" data-aos-delay="<?= $i * 150 ?>">
        <div class="edu-card h-100">
          <div class="edu-card-icon">
            <i class="fas <?= ($i === 0) ? 'fa-university' : 'fa-school' ?>"></i>
          </div>
          <div class="edu-card-body">
            <span class="edu-year">
              <i class="fas fa-calendar me-1"></i><?= htmlspecialchars($edu->year) ?>
            </span>
            <h4 class="edu-degree"><?= htmlspecialchars($edu->degree) ?></h4>
            <h5 class="edu-institution"><?= htmlspecialchars($edu->institution) ?></h5>
            <p class="edu-location">
              <i class="fas fa-map-marker-alt me-1"></i><?= htmlspecialchars($edu->location) ?>
            </p>
            <?php if ($edu->score): ?>
            <div class="edu-score">
              <i class="fas fa-star text-warning me-1"></i>
              <strong><?= htmlspecialchars($edu->score) ?></strong>
            </div>
            <?php endif; ?>
          </div>
        </div>
      </div>
      <?php endforeach; ?>
    </div>

  </div>
</section>
