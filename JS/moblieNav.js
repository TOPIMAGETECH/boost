  document.addEventListener('DOMContentLoaded', () => {
    const servicesToggle = document.getElementById('services-toggle');
    const servicesDropdown = document.getElementById('services-dropdown');
    
    // Improved dropdown toggle with keyboard accessibility
    servicesToggle.addEventListener('click', toggleServices);
    servicesToggle.addEventListener('keydown', (e) => {
      if (e.key === 'Enter' || e.key === ' ') {
        e.preventDefault();
        toggleServices();
      } else if (e.key === 'Escape') {
        collapseServices();
      }
    });

    function toggleServices() {
      const expanded = servicesToggle.getAttribute('aria-expanded') === 'true';
      servicesToggle.setAttribute('aria-expanded', !expanded);
      servicesDropdown.classList.toggle('hidden');
      
      if (!expanded) {
        servicesDropdown.classList.add('opacity-100', 'scale-y-100', 'translate-y-0');
        servicesDropdown.classList.remove('opacity-0', 'scale-y-95', '-translate-y-2');
      } else {
        collapseServices();
      }
    }

    function collapseServices() {
      servicesToggle.setAttribute('aria-expanded', 'false');
      servicesDropdown.classList.add('hidden');
      servicesDropdown.classList.remove('opacity-100', 'scale-y-100', 'translate-y-0');
      servicesDropdown.classList.add('opacity-0', 'scale-y-95', '-translate-y-2');
    }

    // Close dropdown when clicking outside
    document.addEventListener('click', (e) => {
      if (!servicesToggle.contains(e.target) && !servicesDropdown.contains(e.target)) {
        collapseServices();
      }
    });
  });