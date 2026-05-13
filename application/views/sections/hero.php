<!-- ===== HERO SECTION ===== -->
<section id="hero" class="hero-section d-flex align-items-center">
  <div class="container">
    <div class="row align-items-center min-vh-100">

      <!-- Text Column -->
      <div class="col-lg-7 hero-text" data-aos="fade-right" data-aos-duration="1000">
        <p class="hero-greeting animate__animated animate__fadeInDown">
          <span class="greeting-wave">👋</span> Hello, I'm
        </p>
        <h1 class="hero-name animate__animated animate__fadeInLeft">
          <?= htmlspecialchars($profile->name) ?>
        </h1>
        <div class="hero-typed-wrapper">
          <span class="typed-prefix">&gt; </span>
          <span id="typed-text"></span>
        </div>
        <p class="hero-bio mt-3" data-aos="fade-up" data-aos-delay="300">
          <?= htmlspecialchars($profile->bio) ?>
        </p>

        <!-- CTA Buttons -->
        <div class="hero-cta mt-4 d-flex flex-wrap gap-3" data-aos="fade-up" data-aos-delay="500">
          <a href="#projects" class="btn btn-primary btn-lg px-4">
            <i class="fas fa-rocket me-2"></i>View Projects
          </a>
          <a href="#contact" class="btn btn-outline-light btn-lg px-4">
            <i class="fas fa-paper-plane me-2"></i>Hire Me
          </a>
          <a href="<?= base_url('assets/resume/Suvajit_Paria_Resume.pdf') ?>" target="_blank" class="btn btn-outline-primary btn-lg px-4">
            <i class="fas fa-download me-2"></i>Resume
          </a>
        </div>

        <!-- Social Links -->
        <div class="hero-social mt-4" data-aos="fade-up" data-aos-delay="700">
          <a href="<?= htmlspecialchars($profile->linkedin) ?>" target="_blank" class="social-icon" title="LinkedIn">
            <i class="fab fa-linkedin-in"></i>
          </a>
          <a href="<?= htmlspecialchars($profile->github) ?>" target="_blank" class="social-icon" title="GitHub">
            <i class="fab fa-github"></i>
          </a>
          <a href="<?= htmlspecialchars($profile->hackerrank) ?>" target="_blank" class="social-icon" title="HackerRank">
            <i class="fab fa-hackerrank"></i>
          </a>
          <a href="mailto:<?= htmlspecialchars($profile->email) ?>" class="social-icon" title="Email">
            <i class="fas fa-envelope"></i>
          </a>
        </div>
      </div>

      <!-- Avatar Column -->
      <div class="col-lg-5 text-center mt-5 mt-lg-0" data-aos="fade-left" data-aos-duration="1000">
        <div class="hero-avatar-wrapper">
          <div class="avatar-ring ring-1"></div>
          <div class="avatar-ring ring-2"></div>
          <div class="avatar-ring ring-3"></div>
          <div class="avatar-img-wrap">
          <img src="<?= base_url('assets/img/'.htmlspecialchars($profile->profile_image ?? 'avatar.png')) ?>" alt="<?= htmlspecialchars($profile->name) ?>"
                 class="hero-avatar-img" onerror="this.src='https://ui-avatars.com/api/?name=<?= urlencode($profile->name) ?>&size=320&background=6c63ff&color=fff'" />
          </div>
          <!-- Floating Tech Badges -->
          <div class="float-badge badge-php">PHP</div>
          <div class="float-badge badge-java">Java</div>
          <div class="float-badge badge-mysql">MySQL</div>
          <div class="float-badge badge-ci">CI3</div>
        </div>
      </div>

    </div>

    <!-- Scroll Down Indicator -->
    <div class="scroll-indicator text-center" data-aos="fade-up" data-aos-delay="1000">
      <a href="#about">
        <div class="scroll-mouse">
          <div class="scroll-wheel"></div>
        </div>
        <span>Scroll Down</span>
      </a>
    </div>
  </div>
</section>
