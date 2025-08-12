  <!-- template/header.php -->
  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Boostrika</title>

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">

    <!-- Font Awesome Icons -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
      integrity="sha512-z0jY8zBiwg5rW2ngXJYPHcGxWBATMy+H1uwqHy9PrmivcftlCzkIVwQJmA3ZqZmA3nDnXvRvi3HDi+wQyU5zKg=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer" />

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="favicon.png">

    <!-- Custom Variables -->
    <style>
      :root {
        --color-gray-900: #111827;
        /* Tailwind's gray-900 */
        --color-pink-light: #ff4081;
        /* or use #e91e63 */
      }

      body {
        font-family: 'Poppins', sans-serif;
        background-color: var(--color-gray-900);
        color: white;
      }
    </style>

    <!-- Custom CSS -->
    <link rel="stylesheet" href="CSS/style.css">
  </head>

  <body class="font-poppins">

    <header
      class="flex justify-between items-center px-6 py-4 bg-[var(--color-gray-900)] fixed w-full z-50 shadow-md backdrop-blur-sm">

      <!-- Logo Section -->
      <a href="#" class="flex items-center space-x-3 hover:opacity-90 transition-opacity duration-300">
        <img
          src="https://i.postimg.cc/RFg6RS9r/passcohub.png"
          alt="Boostrika Logo"
          class="w-16 h-16 rounded-full border-2 border-[var(--color-pink-light)]"
          loading="lazy"
          decoding="async" />
        <span class="text-2xl font-extrabold tracking-wide text-[var(--color-pink-light)] select-none">
          Boostrika
        </span>
      </a>

      <!-- Desktop Navigation -->
      <nav class="hidden md:flex items-center">
        <div class="flex space-x-10 font-semibold">
          <?php
          $navItems = [
            ['name' => 'Home', 'link' => '#', 'icon' => 'fa-home'],
            ['name' => 'Services', 'link' => '#', 'icon' => 'fa-concierge-bell', 'dropdown' => [
              ['name' => 'Instagram', 'link' => 'https://instagram.com', 'icon' => 'fab fa-instagram'],
              ['name' => 'TikTok', 'link' => 'https://tiktok.com', 'icon' => 'fab fa-tiktok'],
              ['name' => 'Facebook', 'link' => 'https://facebook.com', 'icon' => 'fab fa-facebook'],
              ['name' => 'YouTube', 'link' => 'https://youtube.com', 'icon' => 'fab fa-youtube'],
            ]],
            ['name' => 'Useful links', 'link' => '#', 'icon' => 'fa-cogs'],
            ['name' => 'Contact', 'link' => '#', 'icon' => 'fa-envelope']
          ];
          ?>
        </div>



        <div class="flex space-x-10 font-semibold">
          <?php foreach ($navItems as $item): ?>
            <?php if (isset($item['dropdown'])): ?>
              <div class="relative group">
                <a href="<?= $item['link'] ?>"
                  class="flex items-center space-x-2 px-1 py-1 transition-colors duration-300 hover:text-[var(--color-pink-light)] cursor-pointer select-none">
                  <i class="fas <?= $item['icon'] ?> text-lg"></i>
                  <span><?= $item['name'] ?></span>
                  <i class="fas fa-chevron-down text-xs ml-1"></i>
                  <span class="absolute left-0 -bottom-1 w-0 h-0.5 bg-[var(--color-pink-light)] transition-all group-hover:w-full"></span>
                </a>

                <!-- Dropdown menu -->
                <div
                  class="absolute left-0 mt-2 w-48 bg-[var(--color-gray-900)] rounded-md shadow-lg opacity-0 pointer-events-none group-hover:opacity-100 group-hover:pointer-events-auto transition-opacity duration-300 z-50">
                  <ul class="py-2">
                    <?php foreach ($item['dropdown'] as $drop): ?>
                      <li>
                        <a href="<?= $drop['link'] ?>" target="_blank" rel="noopener noreferrer"
                          class="flex items-center space-x-3 px-4 py-2 text-sm text-gray-300 hover:bg-[var(--color-pink-light)] hover:text-white transition-colors duration-200">
                          <i class="<?= $drop['icon'] ?>"></i>
                          <span><?= $drop['name'] ?></span>
                        </a>
                      </li>
                    <?php endforeach; ?>
                  </ul>
                </div>
              </div>

            <?php else: ?>
              <a href="<?= $item['link'] ?>"
                class="relative group flex items-center space-x-2 px-1 py-1 transition-colors duration-300 hover:text-[var(--color-pink-light)]">
                <i class="fas <?= $item['icon'] ?> text-lg"></i>
                <span><?= $item['name'] ?></span>
                <span class="absolute left-0 -bottom-1 w-0 h-0.5 bg-[var(--color-pink-light)] transition-all group-hover:w-full"></span>
              </a>
            <?php endif; ?>
          <?php endforeach; ?>
        </div>


        <!-- Login/Sign Up as a prominent button -->
        <div class="ml-10 pl-10 border-l border-gray-700">
          <a href="#" class="flex items-center space-x-2 bg-[var(--color-pink-light)] hover:bg-pink-600 text-white font-semibold py-2 px-4 rounded-full transition-all duration-300 shadow-lg hover:shadow-pink-500/30">
            <i class="fas fa-user-circle text-lg"></i>
            <span>Login / Sign Up</span>
          </a>
        </div>
      </nav>

      <!-- Hamburger Menu Button (Mobile) -->
      <button
        id="menu-btn"
        class="md:hidden flex flex-col justify-center items-center w-10 h-10 space-y-1.5 focus:outline-none"
        aria-label="Toggle menu"
        aria-expanded="false"
        aria-controls="mobile-menu">
        <span class="block w-8 h-0.5 bg-[var(--color-pink-light)] rounded transition-transform duration-300 origin-center"></span>
        <span class="block w-8 h-0.5 bg-[var(--color-pink-light)] rounded transition-opacity duration-300"></span>
        <span class="block w-8 h-0.5 bg-[var(--color-pink-light)] rounded transition-transform duration-300 origin-center"></span>
      </button>
    </header>