/**
 * Suvajit Paria Portfolio – main.js
 * Handles: Preloader, Navbar scroll, AOS, Typed.js, Particles,
 *          Skill bars, CountUp, Project filter, Skills filter,
 *          Contact form UX, Back-to-top
 */

(function () {
  'use strict';

  /* ── Preloader ─────────────────────────────────────────────── */
  // Handled by inline script in header.php for instant response

  /* ── Navbar scroll effect ──────────────────────────────────── */
  const mainNav = document.getElementById('mainNav');

  function handleNavScroll() {
    if (window.scrollY > 60) {
      mainNav.classList.add('scrolled');
    } else {
      mainNav.classList.remove('scrolled');
    }
  }

  window.addEventListener('scroll', handleNavScroll, { passive: true });
  handleNavScroll();

  /* ── Active nav link on scroll ─────────────────────────────── */
  const sections   = document.querySelectorAll('section[id]');
  const navLinks   = document.querySelectorAll('#mainNav .nav-link[href^="#"]');

  function setActiveNav() {
    let current = '';
    sections.forEach(function (sec) {
      if (window.scrollY >= sec.offsetTop - 120) {
        current = sec.getAttribute('id');
      }
    });
    navLinks.forEach(function (link) {
      link.classList.remove('active');
      if (link.getAttribute('href') === '#' + current) {
        link.classList.add('active');
      }
    });
  }

  window.addEventListener('scroll', setActiveNav, { passive: true });

  /* ── AOS (Animate On Scroll) ───────────────────────────────── */
  if (typeof AOS !== 'undefined') {
    AOS.init({
      duration: 800,
      easing:   'ease-in-out',
      once:     true,
      offset:   80
    });
  }

  /* ── Typed.js ──────────────────────────────────────────────── */
  const typedEl = document.getElementById('typed-text');
  if (typedEl && typeof Typed !== 'undefined') {
    new Typed('#typed-text', {
      strings: [
        'Full Stack Web Developer',
        'PHP CodeIgniter 3 Expert',
        'Java Developer',
        'MySQL Database Designer',
        'Problem Solver'
      ],
      typeSpeed:    55,
      backSpeed:    30,
      backDelay:    1800,
      startDelay:   500,
      loop:         true,
      showCursor:   true,
      cursorChar:   '|'
    });
  }

  /* ── Particles.js ──────────────────────────────────────────── */
  if (typeof particlesJS !== 'undefined' && document.getElementById('particles-js')) {
    particlesJS('particles-js', {
      particles: {
        number:   { value: 60, density: { enable: true, value_area: 900 } },
        color:    { value: '#6c63ff' },
        shape:    { type: 'circle' },
        opacity:  { value: 0.25, random: true },
        size:     { value: 3, random: true },
        line_linked: {
          enable:   true,
          distance: 140,
          color:    '#6c63ff',
          opacity:  0.12,
          width:    1
        },
        move: {
          enable:    true,
          speed:     1.2,
          direction: 'none',
          random:    true,
          out_mode:  'out'
        }
      },
      interactivity: {
        detect_on: 'canvas',
        events: {
          onhover: { enable: true, mode: 'grab' },
          onclick: { enable: true, mode: 'push' }
        },
        modes: {
          grab: { distance: 160, line_linked: { opacity: 0.4 } },
          push: { particles_nb: 3 }
        }
      },
      retina_detect: true
    });
  }

  /* ── Skill bar animation ───────────────────────────────────── */
  function animateSkillBars() {
    document.querySelectorAll('.skill-fill').forEach(function (bar) {
      const width = bar.getAttribute('data-width');
      if (width) {
        bar.style.width = width + '%';
      }
    });
  }

  // Trigger when skills section enters viewport
  const skillsSection = document.getElementById('skills');
  if (skillsSection) {
    const skillObserver = new IntersectionObserver(function (entries) {
      entries.forEach(function (entry) {
        if (entry.isIntersecting) {
          animateSkillBars();
          skillObserver.unobserve(entry.target);
        }
      });
    }, { threshold: 0.2 });
    skillObserver.observe(skillsSection);
  }

  /* ── CountUp (About stats) ─────────────────────────────────── */
  const aboutSection = document.getElementById('about');
  if (aboutSection && typeof CountUp !== 'undefined') {
    const countObserver = new IntersectionObserver(function (entries) {
      entries.forEach(function (entry) {
        if (entry.isIntersecting) {
          document.querySelectorAll('.stat-number[data-count]').forEach(function (el) {
            const target = parseInt(el.getAttribute('data-count'), 10);
            const cu = new CountUp.CountUp(el, target, {
              duration:  2,
              useEasing: true
            });
            if (!cu.error) cu.start();
          });
          countObserver.unobserve(entry.target);
        }
      });
    }, { threshold: 0.3 });
    countObserver.observe(aboutSection);
  }

  /* ── Skills category filter ────────────────────────────────── */
  const skillsTabs = document.getElementById('skillsTabs');
  if (skillsTabs) {
    skillsTabs.addEventListener('click', function (e) {
      const btn = e.target.closest('button[data-filter]');
      if (!btn) return;

      // Update active tab
      skillsTabs.querySelectorAll('.nav-link').forEach(function (b) {
        b.classList.remove('active');
      });
      btn.classList.add('active');

      const filter = btn.getAttribute('data-filter');

      document.querySelectorAll('#skillsGrid .skill-item').forEach(function (item) {
        if (filter === 'all' || item.getAttribute('data-category') === filter) {
          item.style.display = '';
        } else {
          item.style.display = 'none';
        }
      });
    });
  }

  /* ── Projects category filter ──────────────────────────────── */
  const filterBtns = document.querySelectorAll('.filter-btn');
  if (filterBtns.length) {
    filterBtns.forEach(function (btn) {
      btn.addEventListener('click', function () {
        filterBtns.forEach(function (b) { b.classList.remove('active'); });
        btn.classList.add('active');

        const filter = btn.getAttribute('data-filter');

        document.querySelectorAll('#projectsGrid .project-card-wrap').forEach(function (card) {
          if (filter === 'all' || card.getAttribute('data-category') === filter) {
            card.style.display = '';
          } else {
            card.style.display = 'none';
          }
        });
      });
    });
  }

  /* ── Contact form loading state ────────────────────────────── */
  const contactForm = document.getElementById('contactForm');
  if (contactForm) {
    contactForm.addEventListener('submit', function () {
      const btnText    = contactForm.querySelector('.btn-text');
      const btnLoading = contactForm.querySelector('.btn-loading');
      if (btnText && btnLoading) {
        btnText.classList.add('d-none');
        btnLoading.classList.remove('d-none');
      }
    });
  }

  /* ── Back to top ───────────────────────────────────────────── */
  const backToTop = document.getElementById('backToTop');
  if (backToTop) {
    window.addEventListener('scroll', function () {
      if (window.scrollY > 400) {
        backToTop.classList.add('visible');
      } else {
        backToTop.classList.remove('visible');
      }
    }, { passive: true });

    backToTop.addEventListener('click', function (e) {
      e.preventDefault();
      window.scrollTo({ top: 0, behavior: 'smooth' });
    });
  }

  /* ── Flash message auto-dismiss ────────────────────────────── */
  document.querySelectorAll('.alert.fixed-top').forEach(function (alert) {
    setTimeout(function () {
      const bsAlert = bootstrap.Alert.getOrCreateInstance(alert);
      if (bsAlert) bsAlert.close();
    }, 5000);
  });

  /* ── Smooth scroll for anchor links ────────────────────────── */
  document.querySelectorAll('a[href^="#"]').forEach(function (anchor) {
    anchor.addEventListener('click', function (e) {
      const target = document.querySelector(this.getAttribute('href'));
      if (target) {
        e.preventDefault();
        const offset = 70;
        const top    = target.getBoundingClientRect().top + window.scrollY - offset;
        window.scrollTo({ top: top, behavior: 'smooth' });

        // Close mobile navbar if open
        const navCollapse = document.getElementById('navbarNav');
        if (navCollapse && navCollapse.classList.contains('show')) {
          const toggler = document.querySelector('.navbar-toggler');
          if (toggler) toggler.click();
        }
      }
    });
  });

})();
