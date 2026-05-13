<!-- ===== SKILLS SECTION ===== -->
<section id="skills" class="skills-section section-padding">
  <div class="container">

    <div class="section-header text-center mb-5" data-aos="fade-up">
      <span class="section-tag">What I Know</span>
      <h2 class="section-title">Technical <span class="text-primary">Skills</span></h2>
      <div class="section-divider"></div>
    </div>

    <!-- Category Tabs -->
    <ul class="nav nav-pills justify-content-center mb-5 skills-tabs" id="skillsTabs" data-aos="fade-up" data-aos-delay="100">
      <li class="nav-item"><button class="nav-link active" data-filter="all">All</button></li>
      <?php foreach ($skills as $category => $items): ?>
      <li class="nav-item">
        <button class="nav-link" data-filter="<?= strtolower(str_replace(' ', '-', $category)) ?>">
          <?= htmlspecialchars($category) ?>
        </button>
      </li>
      <?php endforeach; ?>
    </ul>

    <!-- Skills Grid -->
    <div class="row g-4" id="skillsGrid">
      <?php foreach ($skills as $category => $items): ?>
        <?php foreach ($items as $i => $skill): ?>
        <div class="col-md-6 col-lg-4 skill-item"
             data-category="<?= strtolower(str_replace(' ', '-', $category)) ?>"
             data-aos="zoom-in" data-aos-delay="<?= ($i % 3) * 100 ?>">
          <div class="skill-card">
            <div class="skill-card-inner">
              <div class="skill-icon">
                <i class="<?= htmlspecialchars($skill->icon) ?>"></i>
              </div>
              <div class="skill-info">
                <div class="d-flex justify-content-between align-items-center mb-2">
                  <span class="skill-name"><?= htmlspecialchars($skill->name) ?></span>
                  <span class="skill-percent"><?= $skill->percentage ?>%</span>
                </div>
                <div class="skill-bar">
                  <div class="skill-fill" data-width="<?= $skill->percentage ?>"></div>
                </div>
                <span class="skill-category-badge"><?= htmlspecialchars($category) ?></span>
              </div>
            </div>
          </div>
        </div>
        <?php endforeach; ?>
      <?php endforeach; ?>
    </div>

    <!-- Certifications -->
    <div class="row mt-5" data-aos="fade-up">
      <div class="col-12">
        <h4 class="text-center mb-4 text-primary">
          <i class="fas fa-certificate me-2"></i>Certifications
        </h4>
        <div class="d-flex flex-wrap justify-content-center gap-3">
          <?php foreach ($certifications as $cert): ?>
          <div class="cert-badge">
            <i class="fas fa-award me-2 text-warning"></i>
            <strong><?= htmlspecialchars($cert->title) ?></strong>
            <span class="cert-issuer">– <?= htmlspecialchars($cert->issuer) ?></span>
          </div>
          <?php endforeach; ?>
        </div>
      </div>
    </div>

  </div>
</section>
