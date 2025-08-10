<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Boostrika</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <header>
        <nav class="flex flex-wrap items-center justify-between px-4 py-4 bg-blue-600 text-white">
            <h1 class="text-2xl font-bold">Boostrika</h1>
            <button id="menu-btn" class="md:hidden block text-white focus:outline-none">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                </svg>
            </button>
            <ul id="menu" class="flex-col md:flex-row md:flex space-y-2 md:space-y-0 md:space-x-6 mt-4 md:mt-0 hidden md:flex">
                <li><a href="#" class="hover:text-blue-200 transition">Home</a></li>
                <li><a href="#" class="hover:text-blue-200 transition">Features</a></li>
                <li><a href="#" class="hover:text-blue-200 transition">Pricing</a></li>
                <li><a href="#" class="hover:text-blue-200 transition">Contact</a></li>
            </ul>
        </nav>
        <script>
            const btn = document.getElementById('menu-btn');
            const menu = document.getElementById('menu');
            btn.addEventListener('click', () => {
                menu.classList.toggle('hidden');
            });
        </script>
    </header>
    <main>
        <section id="hero" class="text-center py-16 px-4 bg-blue-50">
            <h2 class="text-3xl md:text-4xl font-semibold mb-4">Welcome to Boostrika</h2>
            <p class="mb-6 text-lg md:text-xl text-gray-700">Your platform to boost productivity and growth.</p>
            <a href="#" class="btn bg-blue-600 text-white px-6 py-2 rounded shadow hover:bg-blue-700 transition">Get Started</a>
        </section>
        <section id="features" class="py-12 px-4 md:px-16">
            <h3 class="text-2xl md:text-3xl font-bold mb-4">Features</h3>
            <ul class="list-disc list-inside space-y-2 text-gray-800">
                <li>Fast and Secure</li>
                <li>User Friendly Interface</li>
                <li>24/7 Support</li>
            </ul>
        </section>
        <section id="about" class="py-12 px-4 md:px-16 bg-gray-50">
            <h3 class="text-2xl md:text-3xl font-bold mb-4">About Us</h3>
            <p class="text-gray-700">Boostrika is dedicated to helping you achieve more with innovative tools and solutions.</p>
        </section>
    </main>
    <footer class="text-center py-6 bg-blue-600 text-white">
        <p>&copy; <?php echo date('Y'); ?> Boostrika. All rights reserved.</p>
    </footer>
</body>
</html>