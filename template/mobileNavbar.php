<!-- template/mobileNavbar.php -->

<!-- Mobile Menu Overlay -->
<div 
  id="menu-overlay" 
  class="fixed inset-0 hidden flex flex-col justify-between animated-gradient z-50 p-6 backdrop-blur-sm"
  aria-hidden="true"
  aria-modal="true"
  role="dialog"
>

  <!-- Close Button -->
  <div class="flex justify-end">
    <button
      id="close-btn"
      aria-label="Close menu"
      class="text-white hover:text-yellow-300 transition-colors duration-300 focus:outline-none focus:ring-2 focus:ring-yellow-300 focus:ring-opacity-50 rounded-full p-2"
    >
      <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
      </svg>
    </button>
  </div>

  <!-- Navigation Links -->
  <nav 
    class="flex flex-col items-center space-y-8 text-2xl font-semibold tracking-wide text-white w-full max-w-xs mx-auto"
    aria-label="Main navigation"
  >
    <a 
      href="#" 
      class="hover:text-yellow-300 transition-colors duration-300 w-full flex items-center justify-center space-x-3 py-2 rounded-lg hover:bg-white/10 focus:outline-none focus:ring-2 focus:ring-yellow-300 focus:ring-opacity-50"
    >
      <i class="fas fa-home w-6 text-center" aria-hidden="true"></i>
      <span>Home</span>
    </a>

    <!-- Services Dropdown -->
    <div class="w-full text-center relative group">
      <button
        id="services-toggle"
        aria-expanded="false"
        aria-controls="services-dropdown"
        class="hover:text-yellow-300 transition-all duration-300 focus:outline-none w-full flex justify-center items-center space-x-3 mx-auto py-2 rounded-lg hover:bg-white/10 focus:ring-2 focus:ring-yellow-300 focus:ring-opacity-50"
      >
        <i class="fas fa-concierge-bell w-6 text-center" aria-hidden="true"></i>
        <span>Services</span>
        <svg
          class="inline-block ml-2 h-5 w-5 stroke-current transform transition-transform duration-300 group-aria-expanded:rotate-180"
          fill="none"
          stroke-width="2"
          stroke-linecap="round"
          stroke-linejoin="round"
          viewBox="0 0 24 24"
          aria-hidden="true"
        >
          <path d="M19 9l-7 7-7-7" />
        </svg>
      </button>

      <!-- Dropdown menu -->
      <div
        id="services-dropdown"
        class="hidden flex flex-col mt-2 space-y-4 bg-white/10 rounded-lg py-4 transition-all duration-300 ease-in-out transform origin-top opacity-0 scale-y-95 -translate-y-2 group-aria-expanded:opacity-100 group-aria-expanded:scale-y-100 group-aria-expanded:translate-y-0"
        aria-labelledby="services-toggle"
      >
        <a 
          href="https://youtube.com" 
          target="_blank" 
          rel="noopener noreferrer" 
          class="hover:text-yellow-300 transition-colors duration-300 flex items-center justify-center space-x-3 py-2 px-4 rounded-md hover:bg-white/10 focus:outline-none focus:ring-2 focus:ring-yellow-300 focus:ring-opacity-50"
        >
          <i class="fab fa-youtube w-6 text-center" aria-hidden="true"></i>
          <span>YouTube</span>
        </a>
        <a 
          href="https://facebook.com" 
          target="_blank" 
          rel="noopener noreferrer" 
          class="hover:text-yellow-300 transition-colors duration-300 flex items-center justify-center space-x-3 py-2 px-4 rounded-md hover:bg-white/10 focus:outline-none focus:ring-2 focus:ring-yellow-300 focus:ring-opacity-50"
        >
          <i class="fab fa-facebook w-6 text-center" aria-hidden="true"></i>
          <span>Facebook</span>
        </a>
      </div>
    </div>

    <a 
      href="#" 
      class="hover:text-yellow-300 transition-colors duration-300 w-full flex items-center justify-center space-x-3 py-2 rounded-lg hover:bg-white/10 focus:outline-none focus:ring-2 focus:ring-yellow-300 focus:ring-opacity-50"
    >
      <i class="fas fa-cogs w-6 text-center" aria-hidden="true"></i>
      <span>How It Works</span>
    </a>
    <a 
      href="#" 
      class="hover:text-yellow-300 transition-colors duration-300 w-full flex items-center justify-center space-x-3 py-2 rounded-lg hover:bg-white/10 focus:outline-none focus:ring-2 focus:ring-yellow-300 focus:ring-opacity-50"
    >
      <i class="fas fa-user w-6 text-center" aria-hidden="true"></i>
      <span>Login / Sign Up</span>
    </a>
    <a 
      href="#" 
      class="hover:text-yellow-300 transition-colors duration-300 w-full flex items-center justify-center space-x-3 py-2 rounded-lg hover:bg-white/10 focus:outline-none focus:ring-2 focus:ring-yellow-300 focus:ring-opacity-50"
    >
      <i class="fas fa-envelope w-6 text-center" aria-hidden="true"></i>
      <span>Contact</span>
    </a>
  </nav>

  <!-- Social Media Icons -->
  <div class="flex justify-center space-x-8 text-3xl pb-6 text-white">
    <a 
      href="#" 
      class="hover:text-yellow-300 transition-colors duration-300 p-2 rounded-full hover:bg-white/10 focus:outline-none focus:ring-2 focus:ring-yellow-300 focus:ring-opacity-50" 
      aria-label="Facebook"
    >
      <i class="fab fa-facebook" aria-hidden="true"></i>
    </a>
    <a 
      href="#" 
      class="hover:text-yellow-300 transition-colors duration-300 p-2 rounded-full hover:bg-white/10 focus:outline-none focus:ring-2 focus:ring-yellow-300 focus:ring-opacity-50" 
      aria-label="YouTube"
    >
      <i class="fab fa-youtube" aria-hidden="true"></i>
    </a>
    <a 
      href="#" 
      class="hover:text-yellow-300 transition-colors duration-300 p-2 rounded-full hover:bg-white/10 focus:outline-none focus:ring-2 focus:ring-yellow-300 focus:ring-opacity-50" 
      aria-label="WhatsApp"
    >
      <i class="fab fa-whatsapp" aria-hidden="true"></i>
    </a>
  </div>
</div>

<script>
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
</script>

<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" crossorigin="anonymous">