  </div><!-- /p-4 -->
</div><!-- /main -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
  // Mobile sidebar toggle
  const tog = document.getElementById('sidebarToggle');
  if(tog) tog.addEventListener('click', () => document.getElementById('sidebar').classList.toggle('open'));
  // Auto-dismiss alerts
  document.querySelectorAll('.alert-dismissible').forEach(a => setTimeout(() => {
    const i = bootstrap.Alert.getOrCreateInstance(a); if(i) i.close();
  }, 4000));
</script>
</body>
</html>
