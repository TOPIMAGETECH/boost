<!-- template/header.php -->
<header
  class="flex justify-between items-center px-6 py-4 bg-[var(--color-gray-900)] fixed w-full z-50 shadow-md backdrop-blur-sm">
  
  <!-- Logo Section -->
  <a href="#" class="flex items-center space-x-3 hover:opacity-90 transition-opacity duration-300">
    <img
      src="https://i.postimg.cc/RFg6RS9r/passcohub.png"
      alt="Boostrika Logo"
      class="w-16 h-16 rounded-full border-2 border-[var(--color-pink-light)]"
      loading="lazy"
      decoding="async"
    />
    <span class="text-2xl font-extrabold tracking-wide text-[var(--color-pink-light)] select-none">
      Boostrika
    </span>
  </a>

  <!-- Desktop Navigation -->
  <nav class="hidden md:flex space-x-10 font-semibold text-white">
    <?php
      $navItems = [
        ['name' => 'Home', 'link' => '#'],
        ['name' => 'Services', 'link' => '#'],
        ['name' => 'How It Works', 'link' => '#'],
        ['name' => 'Login / Sign Up', 'link' => '#'],
        ['name' => 'Contact', 'link' => '#']
      ];
      foreach ($navItems as $item) {
        echo '<a href="' . $item['link'] . '" class="relative group px-1 py-1 transition-colors duration-300 hover:text-[var(--color-pink-light)]">';
        echo $item['name'];
        echo '<span class="absolute left-0 -bottom-1 w-0 h-0.5 bg-[var(--color-pink-light)] transition-all group-hover:w-full"></span>';
        echo '</a>';
      }
    ?>
  </nav>

  <!-- Hamburger Menu Button (Mobile) -->
  <button
    id="menu-btn"
    class="md:hidden flex flex-col justify-center items-center w-10 h-10 space-y-1.5 focus:outline-none"
    aria-label="Toggle menu"
    aria-expanded="false"
    aria-controls="mobile-menu"
  >
    <span class="block w-8 h-0.5 bg-[var(--color-pink-light)] rounded transition-transform duration-300 origin-center"></span>
    <span class="block w-8 h-0.5 bg-[var(--color-pink-light)] rounded transition-opacity duration-300"></span>
    <span class="block w-8 h-0.5 bg-[var(--color-pink-light)] rounded transition-transform duration-300 origin-center"></span>
  </button>
</header>
