<!-- template/header.php -->
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Boostrika</title>

  <!-- Tailwind CSS -->
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            primary: '#ec4899',
            secondary: '#8b5cf6',
            accent: '#f43f5e',
            dark: '#0f172a',
          },
          animation: {
            'gradient': 'gradient 8s ease infinite',
            'pulse-slow': 'pulse 6s ease infinite',
            'float': 'float 5s ease-in-out infinite',
          },
          keyframes: {
            'gradient': {
              '0%, 100%': {
                'background-position': '0% 50%'
              },
              '50%': {
                'background-position': '100% 50%'
              }
            },
            'float': {
              '0%, 100%': { transform: 'translateY(0)' },
              '50%': { transform: 'translateY(-12px)' },
            }
          }
        }
      }
    }
  </script>

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">

  <!-- Custom Styles -->
  <style>
    .glass-card {
      background: rgba(15, 23, 42, 0.7);
      backdrop-filter: blur(12px);
      -webkit-backdrop-filter: blur(12px);
      border: 1px solid rgba(255, 255, 255, 0.08);
    }
    
    .gradient-text {
      background: linear-gradient(90deg, #ec4899, #8b5cf6, #f43f5e);
      -webkit-background-clip: text;
      background-clip: text;
      color: transparent;
      background-size: 300% 300%;
      animation: gradient 6s ease infinite;
    }
    
    .nav-link {
      position: relative;
      transition: all 0.3s ease;
    }
    
    .nav-link::after {
      content: '';
      position: absolute;
      bottom: -2px;
      left: 0;
      width: 0;
      height: 2px;
      background: linear-gradient(90deg, #ec4899, #8b5cf6);
      transition: width 0.3s ease;
    }
    
    .nav-link:hover::after {
      width: 100%;
    }
    
    .dropdown-menu {
      opacity: 0;
      visibility: hidden;
      transform: translateY(10px);
      transition: all 0.3s ease;
    }
    
    .dropdown:hover .dropdown-menu {
      opacity: 1;
      visibility: visible;
      transform: translateY(0);
    }
    
    .mobile-menu {
      transform: translateX(100%);
      transition: transform 0.3s ease;
    }
    
    .mobile-menu.open {
      transform: translateX(0);
    }
    
    .hamburger span {
      transition: all 0.3s ease;
    }
    
    .hamburger.active span:nth-child(1) {
      transform: rotate(45deg) translate(5px, 5px);
    }
    
    .hamburger.active span:nth-child(2) {
      opacity: 0;
    }
    
    .hamburger.active span:nth-child(3) {
      transform: rotate(-45deg) translate(7px, -6px);
    }
  </style>
</head>

<body class="font-poppins bg-dark text-white">

  <!-- Header -->
  <header class="fixed w-full z-50">
    <div class="glass-card border-b border-gray-800/50">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-20">
          
          <!-- Logo -->
          <div class="flex items-center space-x-3">
            <div class="relative">
              <div class="absolute -inset-1 bg-gradient-to-r from-primary to-secondary rounded-full blur opacity-75 animate-pulse-slow"></div>
              <img src="https://i.postimg.cc/RFg6RS9r/passcohub.png" 
                   alt="Boostrika Logo" 
                   class="relative w-12 h-12 rounded-full border-2 border-white/10 hover:border-transparent transition-all duration-300">
            </div>
            <span class="text-2xl font-bold gradient-text">Boostrika</span>
          </div>

          <!-- Desktop Navigation -->
          <nav class="hidden md:flex items-center space-x-8">
            <a href="index.php" class="nav-link flex items-center space-x-2 text-gray-300 hover:text-white">
              <i class="fas fa-home"></i>
              <span>Home</span>
            </a>
            
            <div class="dropdown relative">
              <button class="nav-link flex items-center space-x-2 text-gray-300 hover:text-white">
                <i class="fas fa-rocket"></i>
                <span>Services</span>
                <i class="fas fa-chevron-down text-xs"></i>
              </button>
              <div class="dropdown-menu absolute left-0 mt-2 w-56 bg-dark/95 border border-gray-800 rounded-lg shadow-xl py-2 z-50">
                <a href="#" class="flex items-center px-4 py-3 text-sm hover:bg-gray-800/50 transition-colors">
                  <i class="fab fa-instagram mr-3 text-primary"></i>
                  Instagram Growth
                </a>
                <a href="#" class="flex items-center px-4 py-3 text-sm hover:bg-gray-800/50 transition-colors">
                  <i class="fab fa-tiktok mr-3 text-primary"></i>
                  TikTok Views
                </a>
                <a href="#" class="flex items-center px-4 py-3 text-sm hover:bg-gray-800/50 transition-colors">
                  <i class="fab fa-youtube mr-3 text-primary"></i>
                  YouTube Subscribers
                </a>
              </div>
            </div>
            
            <a href="#" class="nav-link flex items-center space-x-2 text-gray-300 hover:text-white">
              <i class="fas fa-tags"></i>
              <span>Pricing</span>
            </a>
            
            <a href="#" class="nav-link flex items-center space-x-2 text-gray-300 hover:text-white">
              <i class="fas fa-info-circle"></i>
              <span>About</span>
            </a>
            
            <div class="flex items-center space-x-4 ml-6">
              <a href="#" class="px-4 py-2 text-sm font-medium bg-gradient-to-r from-primary to-secondary rounded-full hover:shadow-lg hover:shadow-primary/30 transition-all">
                Get Started
              </a>
              <a href="#" class="px-4 py-2 text-sm font-medium border border-gray-700 rounded-full hover:bg-gray-800/50 transition-colors">
                <i class="fas fa-sign-in-alt mr-2"></i>
                Login
              </a>
            </div>
          </nav>

          <!-- Mobile Menu Button -->
          <button id="mobile-menu-button" class="md:hidden hamburger flex flex-col w-10 h-10 justify-center items-center group">
            <span class="block w-6 h-0.5 bg-white mb-1.5"></span>
            <span class="block w-6 h-0.5 bg-white mb-1.5"></span>
            <span class="block w-6 h-0.5 bg-white"></span>
          </button>
        </div>
      </div>
    </div>
  </header>

  <!-- Mobile Menu -->
  <div id="mobile-menu" class="mobile-menu fixed inset-0 z-40 pt-20 bg-dark/95 backdrop-blur-lg overflow-y-auto">
    <div class="container px-4 py-6">
      <div class="flex flex-col space-y-6">
        <a href="index.php" class="flex items-center space-x-3 px-4 py-3 rounded-lg hover:bg-gray-800/50 transition-colors">
          <i class="fas fa-home w-5 text-center"></i>
          <span class="text-lg">Home</span>
        </a>
        
        <div class="mobile-dropdown">
          <button class="mobile-dropdown-btn flex items-center justify-between w-full px-4 py-3 rounded-lg hover:bg-gray-800/50 transition-colors">
            <div class="flex items-center space-x-3">
              <i class="fas fa-rocket w-5 text-center"></i>
              <span class="text-lg">Services</span>
            </div>
            <i class="fas fa-chevron-down transition-transform duration-200"></i>
          </button>
          <div class="mobile-dropdown-content hidden pl-12 mt-2 space-y-3">
            <a href="#" class="block px-4 py-2 rounded-lg hover:bg-gray-800/50 transition-colors">
              <i class="fab fa-instagram mr-3 text-primary"></i>
              Instagram Growth
            </a>
            <a href="#" class="block px-4 py-2 rounded-lg hover:bg-gray-800/50 transition-colors">
              <i class="fab fa-tiktok mr-3 text-primary"></i>
              TikTok Views
            </a>
            <a href="#" class="block px-4 py-2 rounded-lg hover:bg-gray-800/50 transition-colors">
              <i class="fab fa-youtube mr-3 text-primary"></i>
              YouTube Subscribers
            </a>
          </div>
        </div>
        
        <a href="#" class="flex items-center space-x-3 px-4 py-3 rounded-lg hover:bg-gray-800/50 transition-colors">
          <i class="fas fa-tags w-5 text-center"></i>
          <span class="text-lg">Pricing</span>
        </a>
        
        <a href="#" class="flex items-center space-x-3 px-4 py-3 rounded-lg hover:bg-gray-800/50 transition-colors">
          <i class="fas fa-info-circle w-5 text-center"></i>
          <span class="text-lg">About</span>
        </a>
        
        <div class="pt-4 border-t border-gray-800/50 mt-4">
          <a href="#" class="block w-full px-4 py-3 text-center bg-gradient-to-r from-primary to-secondary rounded-lg mb-3">
            Get Started
          </a>
          <a href="#" class="block w-full px-4 py-3 text-center border border-gray-700 rounded-lg hover:bg-gray-800/50 transition-colors">
            <i class="fas fa-sign-in-alt mr-2"></i>
            Login
          </a>
        </div>
      </div>
    </div>
  </div>

  <script>
    document.addEventListener('DOMContentLoaded', function() {
      const mobileMenuButton = document.getElementById('mobile-menu-button');
      const mobileMenu = document.getElementById('mobile-menu');
      
      // Toggle mobile menu
      mobileMenuButton.addEventListener('click', function() {
        this.classList.toggle('active');
        mobileMenu.classList.toggle('open');
        document.body.classList.toggle('overflow-hidden');
      });
      
      // Mobile dropdown functionality
      document.querySelectorAll('.mobile-dropdown-btn').forEach(button => {
        button.addEventListener('click', function() {
          const dropdown = this.closest('.mobile-dropdown');
          const content = dropdown.querySelector('.mobile-dropdown-content');
          const icon = dropdown.querySelector('.fa-chevron-down');
          
          // Close other dropdowns
          document.querySelectorAll('.mobile-dropdown-content').forEach(item => {
            if (item !== content) {
              item.classList.add('hidden');
              item.previousElementSibling.querySelector('.fa-chevron-down').classList.remove('rotate-180');
            }
          });
          
          // Toggle current dropdown
          content.classList.toggle('hidden');
          icon.classList.toggle('rotate-180');
        });
      });
      
      // Close mobile menu when clicking a link
      document.querySelectorAll('#mobile-menu a').forEach(link => {
        link.addEventListener('click', function() {
          mobileMenuButton.classList.remove('active');
          mobileMenu.classList.remove('open');
          document.body.classList.remove('overflow-hidden');
        });
      });
    });
  </script>
