

  // Enhanced loading with delay and particles
  window.addEventListener('load', () => {
    setTimeout(() => {
      const popup = document.getElementById('top-popup');
      popup.classList.add('show');
      
      // Create particles
      createParticles(popup);
    }, 800);
  });

  // Premium close interaction
  document.querySelector('#top-popup .close-btn').addEventListener('click', (e) => {
    const popup = e.target.closest('#top-popup');
    popup.style.transform = 'translateX(-50%) translateY(-20px)';
    popup.style.opacity = '0';
    
    setTimeout(() => {
      popup.classList.remove('show');
      popup.style.transform = 'translateX(-50%)';
    }, 400);
  });

  // Scroll to hide functionality
  let lastScrollPosition = 0;
  let isPopupVisible = true;
  const popup = document.getElementById('top-popup');
  const scrollHideThreshold = 100; // pixels to scroll before hiding

  window.addEventListener('scroll', () => {
    const currentScrollPosition = window.pageYOffset || document.documentElement.scrollTop;
    
    if (currentScrollPosition > lastScrollPosition && currentScrollPosition > scrollHideThreshold) {
      // Scrolling down
      if (isPopupVisible && popup.classList.contains('show')) {
        popup.classList.add('hide-on-scroll');
        isPopupVisible = false;
      }
    } else {
      // Scrolling up
      if (!isPopupVisible && popup.classList.contains('show')) {
        popup.classList.remove('hide-on-scroll');
        isPopupVisible = true;
      }
    }
    
    lastScrollPosition = currentScrollPosition;
  });

  // Particle effect function
  function createParticles(container) {
    const particleCount = 15;
    
    for (let i = 0; i < particleCount; i++) {
      const particle = document.createElement('div');
      particle.classList.add('particle');
      
      // Random properties
      const size = Math.random() * 5 + 2;
      const posX = Math.random() * 100;
      const posY = Math.random() * 100;
      const opacity = Math.random() * 0.4 + 0.1;
      const animationDuration = Math.random() * 15 + 10;
      const delay = Math.random() * 5;
      
      particle.style.width = `${size}px`;
      particle.style.height = `${size}px`;
      particle.style.left = `${posX}%`;
      particle.style.top = `${posY}%`;
      particle.style.opacity = opacity;
      particle.style.animation = `floatParticle ${animationDuration}s ease-in-out ${delay}s infinite`;
      
      container.appendChild(particle);
    }
    
    // Add particle animation to styles
    const style = document.createElement('style');
    style.textContent = `
      @keyframes floatParticle {
        0%, 100% {
          transform: translate(0, 0);
        }
        25% {
          transform: translate(10px, -15px);
        }
        50% {
          transform: translate(-5px, 10px);
        }
        75% {
          transform: translate(15px, 5px);
        }
      }
    `;
    document.head.appendChild(style);
  }