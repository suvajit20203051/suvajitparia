<!-- ===== ABOUT SECTION ===== -->
<section id="about" class="about-section section-padding">
  <div class="container">

    <div class="section-header text-center mb-5" data-aos="fade-up">
      <span class="section-tag">Get To Know Me</span>
      <h2 class="section-title">About <span class="text-primary">Me</span></h2>
      <div class="section-divider"></div>
    </div>

    <div class="row align-items-center g-5">

      <!-- Left: Code Card -->
      <div class="col-lg-5" data-aos="fade-right" data-aos-duration="900">
        <div class="about-code-card">
          <div class="code-card-header">
            <span class="dot red"></span>
            <span class="dot yellow"></span>
            <span class="dot green"></span>
            <span class="code-filename ms-2">about.php</span>
          </div>
          <div class="code-card-body">
<pre><code><span class="c-keyword">class</span> <span class="c-class">SuvajitParia</span> {

  <span class="c-keyword">public</span> <span class="c-var">$name</span>     = <span class="c-str">"Suvajit Paria"</span>;
  <span class="c-keyword">public</span> <span class="c-var">$role</span>     = <span class="c-str">"Web Developer"</span>;
  <span class="c-keyword">public</span> <span class="c-var">$location</span> = <span class="c-str">"West Bengal, IN"</span>;
  <span class="c-keyword">public</span> <span class="c-var">$degree</span>   = <span class="c-str">"B.E - IT (CGPA 8.25)"</span>;

  <span class="c-keyword">public function</span> <span class="c-fn">getStack</span>() {
    <span class="c-keyword">return</span> [
      <span class="c-str">"PHP CodeIgniter 3"</span>,
      <span class="c-str">"Java / JDBC"</span>,
      <span class="c-str">"MySQL / PostgreSQL"</span>,
      <span class="c-str">"HTML5 / CSS3 / JS"</span>,
    ];
  }

  <span class="c-keyword">public function</span> <span class="c-fn">isAvailable</span>() {
    <span class="c-keyword">return</span> <span class="c-bool">true</span>; <span class="c-comment">// Open to work!</span>
  }
}</code></pre>
          </div>
        </div>
      </div>

      <!-- Right: Info -->
      <div class="col-lg-7" data-aos="fade-left" data-aos-duration="900">
        <h3 class="about-heading mb-3">
          I'm a <span class="text-primary">Full Stack Web Developer</span>
        </h3>
        <p class="about-bio"><?= htmlspecialchars($profile->bio) ?></p>

        <!-- Info Grid -->
        <div class="row about-info-grid mt-4 g-3">
          <div class="col-sm-6">
            <div class="info-item">
              <i class="fas fa-user-circle text-primary"></i>
              <div>
                <span class="info-label">Name</span>
                <span class="info-value"><?= htmlspecialchars($profile->name) ?></span>
              </div>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="info-item">
              <i class="fas fa-envelope text-primary"></i>
              <div>
                <span class="info-label">Email</span>
                <span class="info-value"><?= htmlspecialchars($profile->email) ?></span>
              </div>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="info-item">
              <i class="fas fa-map-marker-alt text-primary"></i>
              <div>
                <span class="info-label">Location</span>
                <span class="info-value"><?= htmlspecialchars($profile->location) ?></span>
              </div>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="info-item">
              <i class="fas fa-phone text-primary"></i>
              <div>
                <span class="info-label">Phone</span>
                <span class="info-value"><?= htmlspecialchars($profile->phone) ?></span>
              </div>
            </div>
          </div>
        </div>

        <!-- Stats -->
        <div class="row about-stats mt-4 g-3">
          <div class="col-4 text-center">
            <div class="stat-card">
              <span class="stat-number" data-count="2">0</span><span class="stat-plus">+</span>
              <span class="stat-label">Live Projects</span>
            </div>
          </div>
          <div class="col-4 text-center">
            <div class="stat-card">
              <span class="stat-number" data-count="6">0</span><span class="stat-plus">+</span>
              <span class="stat-label">Months Exp.</span>
            </div>
          </div>
          <div class="col-4 text-center">
            <div class="stat-card">
              <span class="stat-number" data-count="8">0</span><span class="stat-plus">+</span>
              <span class="stat-label">Technologies</span>
            </div>
          </div>
        </div>

        <div class="mt-4">
          <a href="#contact" class="btn btn-primary me-3">
            <i class="fas fa-paper-plane me-2"></i>Let's Talk
          </a>
          <a href="<?= base_url('assets/resume/Suvajit_Paria_Resume.pdf') ?>" target="_blank" class="btn btn-outline-primary">
            <i class="fas fa-file-pdf me-2"></i>Download CV
          </a>
        </div>
      </div>

    </div>
  </div>
</section>
