<!-- ===== CONTACT SECTION ===== -->
<section id="contact" class="contact-section section-padding">
  <div class="container">

    <div class="section-header text-center mb-5" data-aos="fade-up">
      <span class="section-tag">Get In Touch</span>
      <h2 class="section-title">Contact <span class="text-primary">Me</span></h2>
      <div class="section-divider"></div>
      <p class="section-subtitle mt-3">
        Have a project in mind or want to hire me? I'd love to hear from you!
      </p>
    </div>

    <div class="row g-5 align-items-start">

      <!-- Contact Info -->
      <div class="col-lg-5" data-aos="fade-right" data-aos-duration="900">
        <div class="contact-info-card">
          <h4 class="mb-4">Let's Connect</h4>

          <div class="contact-info-item">
            <div class="contact-info-icon">
              <i class="fas fa-envelope"></i>
            </div>
            <div>
              <span class="contact-info-label">Email</span>
              <a href="mailto:<?= htmlspecialchars($profile->email) ?>" class="contact-info-value">
                <?= htmlspecialchars($profile->email) ?>
              </a>
            </div>
          </div>

          <div class="contact-info-item">
            <div class="contact-info-icon">
              <i class="fas fa-phone"></i>
            </div>
            <div>
              <span class="contact-info-label">Phone</span>
              <a href="tel:<?= htmlspecialchars($profile->phone) ?>" class="contact-info-value">
                <?= htmlspecialchars($profile->phone) ?>
              </a>
            </div>
          </div>

          <div class="contact-info-item">
            <div class="contact-info-icon">
              <i class="fas fa-map-marker-alt"></i>
            </div>
            <div>
              <span class="contact-info-label">Location</span>
              <span class="contact-info-value"><?= htmlspecialchars($profile->location) ?></span>
            </div>
          </div>

          <!-- Social -->
          <div class="contact-social mt-4">
            <a href="<?= htmlspecialchars($profile->linkedin) ?>" target="_blank" class="contact-social-btn linkedin">
              <i class="fab fa-linkedin-in"></i> LinkedIn
            </a>
            <a href="<?= htmlspecialchars($profile->github) ?>" target="_blank" class="contact-social-btn github">
              <i class="fab fa-github"></i> GitHub
            </a>
            <a href="<?= htmlspecialchars($profile->hackerrank) ?>" target="_blank" class="contact-social-btn hackerrank">
              <i class="fab fa-hackerrank"></i> HackerRank
            </a>
          </div>

          <!-- Availability Badge -->
          <div class="availability-badge mt-4">
            <span class="avail-dot"></span>
            <span>Available for freelance &amp; full-time opportunities</span>
          </div>
        </div>
      </div>

      <!-- Contact Form -->
      <div class="col-lg-7" data-aos="fade-left" data-aos-duration="900">
        <div class="contact-form-card">
          <h4 class="mb-4">Send a Message</h4>
          <?= form_open('contact/send', ['class' => 'contact-form', 'id' => 'contactForm', 'novalidate' => '']) ?>

            <div class="row g-3">
              <div class="col-md-6">
                <div class="form-floating">
                  <input type="text" class="form-control" id="name" name="name"
                         placeholder="Your Name" required
                         value="<?= set_value('name') ?>" />
                  <label for="name"><i class="fas fa-user me-2"></i>Your Name</label>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-floating">
                  <input type="email" class="form-control" id="email" name="email"
                         placeholder="Your Email" required
                         value="<?= set_value('email') ?>" />
                  <label for="email"><i class="fas fa-envelope me-2"></i>Your Email</label>
                </div>
              </div>
              <div class="col-12">
                <div class="form-floating">
                  <input type="text" class="form-control" id="subject" name="subject"
                         placeholder="Subject"
                         value="<?= set_value('subject') ?>" />
                  <label for="subject"><i class="fas fa-tag me-2"></i>Subject</label>
                </div>
              </div>
              <div class="col-12">
                <div class="form-floating">
                  <textarea class="form-control" id="message" name="message"
                            placeholder="Your Message" style="height:150px"
                            required><?= set_value('message') ?></textarea>
                  <label for="message"><i class="fas fa-comment me-2"></i>Your Message</label>
                </div>
              </div>
              <div class="col-12">
                <button type="submit" class="btn btn-primary btn-lg w-100 submit-btn">
                  <span class="btn-text">
                    <i class="fas fa-paper-plane me-2"></i>Send Message
                  </span>
                  <span class="btn-loading d-none">
                    <span class="spinner-border spinner-border-sm me-2"></span>Sending...
                  </span>
                </button>
              </div>
            </div>

          <?= form_close() ?>
        </div>
      </div>

    </div>
  </div>
</section>
