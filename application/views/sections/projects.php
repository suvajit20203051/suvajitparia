<!-- ===== PROJECTS SECTION ===== -->
<section id="projects" class="projects-section section-padding">
  <div class="container">

    <div class="section-header text-center mb-5" data-aos="fade-up">
      <span class="section-tag">What I've Built</span>
      <h2 class="section-title">My <span class="text-primary">Projects</span></h2>
      <div class="section-divider"></div>
    </div>

    <!-- Filter Buttons -->
    <div class="project-filters d-flex flex-wrap justify-content-center gap-2 mb-5" data-aos="fade-up" data-aos-delay="100">
      <button class="filter-btn active" data-filter="all">All</button>
      <button class="filter-btn" data-filter="Healthcare">Healthcare</button>
      <button class="filter-btn" data-filter="E-Commerce">E-Commerce</button>
      <button class="filter-btn" data-filter="Desktop">Desktop</button>
    </div>

    <!-- Projects Grid -->
    <div class="row g-4" id="projectsGrid">
      <?php foreach ($projects as $i => $project): ?>
      <div class="col-md-6 col-lg-4 project-card-wrap"
           data-category="<?= htmlspecialchars($project->category) ?>"
           data-aos="fade-up" data-aos-delay="<?= ($i % 3) * 150 ?>">
        <div class="project-card h-100">

          <!-- Card Image / Banner -->
          <div class="project-img-wrap">
            <div class="project-banner project-banner-<?= $i + 1 ?>">
              <div class="project-banner-icon">
                <i class="fas <?= ($project->category === 'Healthcare') ? 'fa-heartbeat' : (($project->category === 'E-Commerce') ? 'fa-shopping-cart' : 'fa-laptop') ?>"></i>
              </div>
            </div>
            <?php if ($project->featured): ?>
            <span class="project-featured-badge">
              <i class="fas fa-star me-1"></i>Featured
            </span>
            <?php endif; ?>
            <div class="project-overlay">
              <div class="project-overlay-links">
                <?php if ($project->live_url): ?>
                <a href="<?= htmlspecialchars($project->live_url) ?>" target="_blank" class="overlay-btn" title="Live Demo">
                  <i class="fas fa-external-link-alt"></i>
                </a>
                <?php endif; ?>
                <?php if ($project->github_url): ?>
                <a href="<?= htmlspecialchars($project->github_url) ?>" target="_blank" class="overlay-btn" title="GitHub">
                  <i class="fab fa-github"></i>
                </a>
                <?php endif; ?>
              </div>
            </div>
          </div>

          <!-- Card Body -->
          <div class="project-card-body">
            <div class="d-flex justify-content-between align-items-start mb-2">
              <h4 class="project-title"><?= htmlspecialchars($project->title) ?></h4>
              <span class="project-category-tag"><?= htmlspecialchars($project->category) ?></span>
            </div>
            <p class="project-desc"><?= htmlspecialchars($project->description) ?></p>

            <!-- Tech Stack -->
            <div class="project-tech-stack mt-3">
              <?php foreach (explode(',', $project->tech_stack) as $tech): ?>
              <span class="tech-tag"><?= htmlspecialchars(trim($tech)) ?></span>
              <?php endforeach; ?>
            </div>

            <!-- Links -->
            <div class="project-links mt-3 d-flex gap-2">
              <?php if ($project->live_url): ?>
              <a href="<?= htmlspecialchars($project->live_url) ?>" target="_blank" class="btn btn-primary btn-sm">
                <i class="fas fa-globe me-1"></i>Live Demo
              </a>
              <?php endif; ?>
              <?php if ($project->github_url): ?>
              <a href="<?= htmlspecialchars($project->github_url) ?>" target="_blank" class="btn btn-outline-secondary btn-sm">
                <i class="fab fa-github me-1"></i>Code
              </a>
              <?php endif; ?>
            </div>
          </div>

        </div>
      </div>
      <?php endforeach; ?>
    </div>

  </div>
</section>
