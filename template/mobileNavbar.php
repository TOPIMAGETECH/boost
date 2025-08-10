<!-- Mobile Menu Overlay -->
<div id="menu-overlay" class="fixed inset-0 hidden flex flex-col justify-between animated-gradient z-50 p-6">

  <!-- Close Button -->
  <div class="flex justify-end">
    <button
      id="close-btn"
      aria-label="Close menu"
      class="text-white hover:text-yellow-300 transition-colors duration-300 focus:outline-none"
    >
      <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
      </svg>
    </button>
  </div>

  <!-- Navigation Links -->
  <nav class="flex flex-col items-center space-y-8 text-2xl font-semibold tracking-wide text-white w-full max-w-xs mx-auto">
    <a href="#" class="hover:text-yellow-300 transition-colors duration-300 w-full text-center">Home</a>

    <!-- Services Dropdown -->
    <div class="w-full text-center relative">
      <button
        id="services-toggle"
        aria-expanded="false"
        aria-controls="services-dropdown"
        class="hover:text-yellow-300 transition-colors duration-300 focus:outline-none w-full flex justify-center items-center mx-auto"
      >
        Services
        <svg
          class="inline-block ml-2 h-5 w-5 stroke-current"
          fill="none"
          stroke-width="2"
          stroke-linecap="round"
          stroke-linejoin="round"
          viewBox="0 0 24 24"
        >
          <path d="M19 9l-7 7-7-7" />
        </svg>
      </button>

      <!-- Dropdown menu -->
      <div
        id="services-dropdown"
        class="hidden flex flex-col mt-2 space-y-4 bg-[rgba(255,255,255,0.1)] rounded-md py-4"
      >
        <a href="https://youtube.com" target="_blank" rel="noopener" class="hover:text-yellow-300 transition-colors duration-300">
          YouTube
        </a>
        <a href="https://facebook.com" target="_blank" rel="noopener" class="hover:text-yellow-300 transition-colors duration-300">
          Facebook
        </a>
      </div>
    </div>

    <a href="#" class="hover:text-yellow-300 transition-colors duration-300 w-full text-center">How It Works</a>
    <a href="#" class="hover:text-yellow-300 transition-colors duration-300 w-full text-center">Login / Sign Up</a>
    <a href="#" class="hover:text-yellow-300 transition-colors duration-300 w-full text-center">Contact</a>
  </nav>

  <!-- Social Media Icons -->
  <div class="flex justify-center space-x-8 text-3xl pb-6 text-white">
    <a href="#" class="hover:text-yellow-300 transition-colors duration-300" aria-label="Facebook"><i class="fab fa-facebook"></i></a>
    <a href="#" class="hover:text-yellow-300 transition-colors duration-300" aria-label="YouTube"><i class="fab fa-youtube"></i></a>
    <a href="#" class="hover:text-yellow-300 transition-colors duration-300" aria-label="WhatsApp"><i class="fab fa-whatsapp"></i></a>
  </div>
</div>

<script>
  const servicesToggle = document.getElementById('services-toggle');
  const servicesDropdown = document.getElementById('services-dropdown');

  servicesToggle.addEventListener('click', () => {
    const expanded = servicesToggle.getAttribute('aria-expanded') === 'true';
    servicesToggle.setAttribute('aria-expanded', !expanded);
    servicesDropdown.classList.toggle('hidden');
  });
</script>
