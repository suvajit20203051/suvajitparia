<!-- ===== FOOTER ===== -->
<footer class="footer-section py-5">
  <div class="container text-center">
    <div class="footer-logo mb-3">
      <span class="brand-bracket">&lt;</span>
      <span class="brand-name">SP</span>
      <span class="brand-bracket"> /&gt;</span>
    </div>
    <div class="footer-links mb-4">
      <a href="#about">About</a>
      <a href="#skills">Skills</a>
      <a href="#projects">Projects</a>
      <a href="#contact">Contact</a>
    </div>
    <div class="footer-social mb-4">
      <a href="<?= htmlspecialchars($profile->linkedin) ?>" target="_blank" title="LinkedIn">
        <i class="fab fa-linkedin-in"></i>
      </a>
      <a href="<?= htmlspecialchars($profile->github) ?>" target="_blank" title="GitHub">
        <i class="fab fa-github"></i>
      </a>
      <a href="<?= htmlspecialchars($profile->hackerrank) ?>" target="_blank" title="HackerRank">
        <i class="fab fa-hackerrank"></i>
      </a>
      <a href="mailto:<?= htmlspecialchars($profile->email) ?>" title="Email">
        <i class="fas fa-envelope"></i>
      </a>
    </div>
    <p class="footer-copy mb-0">
      &copy; <?= date('Y') ?> <strong><?= htmlspecialchars($profile->name) ?></strong>. Crafted with
      <i class="fas fa-heart text-danger mx-1"></i> using PHP CodeIgniter 3 &amp; Bootstrap 5.
    </p>
  </div>
</footer>

<!-- Back to Top -->
<a href="#hero" class="back-to-top" id="backToTop" title="Back to top">
  <i class="fas fa-chevron-up"></i>
</a>

<!-- ===== SCRIPTS ===== -->
<!-- Bootstrap 5 -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" defer></script>
<!-- Particles.js -->
<script src="https://cdn.jsdelivr.net/npm/particles.js@2.0.0/particles.min.js" defer></script>
<!-- AOS -->
<script src="https://unpkg.com/aos@2.3.4/dist/aos.js" defer></script>
<!-- Typed.js -->
<script src="https://cdn.jsdelivr.net/npm/typed.js@2.1.0/dist/typed.umd.js" defer></script>
<!-- CountUp.js -->
<script src="https://cdn.jsdelivr.net/npm/countup.js@2.8.0/dist/countUp.umd.js" defer></script>
<!-- Custom JS -->
<script src="<?= base_url('assets/js/main.js') ?>" defer></script>
</body>
</html>
