<style>
  /* Premium frosted glass popup with advanced effects */
  #top-popup {
    position: fixed;
    top: -400px; /* hidden initially */
    left: 50%;
    transform: translateX(-50%);
    width: 380px;
    min-height: 380px;
    background: linear-gradient(135deg, rgba(255,255,255,0.12) 0%, rgba(255,255,255,0.08) 100%);
    backdrop-filter: blur(20px) saturate(200%);
    -webkit-backdrop-filter: blur(20px) saturate(200%);
    border: 1px solid rgba(255, 126, 185, 0.6);
    border-radius: 20px;
    box-shadow:
      0 12px 40px 0 rgba(255, 126, 185, 0.3),
      inset 0 0 12px rgba(255, 255, 255, 0.1);
    color: #fff;
    padding: 2.5rem;
    font-weight: 600;
    font-family: 'Inter', 'Segoe UI', system-ui, sans-serif;
    font-size: 1.05rem;
    line-height: 1.6;
    transition: 
      top 0.8s cubic-bezier(0.34, 1.56, 0.64, 1),
      opacity 0.4s ease,
      transform 0.6s cubic-bezier(0.34, 1.56, 0.64, 1);
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    overflow: hidden;
    z-index: 9999;
    opacity: 0;
    transform-origin: top center;
    perspective: 1000px;
  }

  #top-popup::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: radial-gradient(circle at 20% 30%, rgba(255, 126, 185, 0.15) 0%, transparent 40%);
    border-radius: 20px;
    pointer-events: none;
    z-index: -1;
  }

  #top-popup.show {
    top: 40px;
    opacity: 1;
    animation: 
      pulseGlow 4s ease-in-out infinite alternate,
      float 8s ease-in-out infinite;
  }

  #top-popup.hide-on-scroll {
    transform: translateX(-50%) translateY(-150px);
    opacity: 0;
  }

  @keyframes pulseGlow {
    0% {
      box-shadow:
        0 0 20px 5px rgba(255, 126, 185, 0.4),
        0 0 40px 10px rgba(255, 126, 185, 0.2),
        inset 0 0 15px rgba(255, 255, 255, 0.1);
      border-color: rgba(255, 126, 185, 0.7);
    }
    50% {
      box-shadow:
        0 0 30px 8px rgba(255, 126, 185, 0.6),
        0 0 60px 15px rgba(255, 126, 185, 0.3),
        inset 0 0 20px rgba(255, 255, 255, 0.15);
      border-color: rgba(255, 126, 185, 0.9);
    }
    100% {
      box-shadow:
        0 0 40px 10px rgba(255, 126, 185, 0.8),
        0 0 80px 20px rgba(255, 126, 185, 0.4),
        inset 0 0 25px rgba(255, 255, 255, 0.2);
      border-color: rgba(255, 126, 185, 1);
    }
  }

  @keyframes float {
    0%, 100% {
      transform: translateX(-50%) translateY(0) rotateZ(0.5deg);
    }
    50% {
      transform: translateX(-50%) translateY(-8px) rotateZ(-0.5deg);
    }
  }

  /* Premium close button */
  #top-popup button.close-btn {
    position: absolute;
    top: 16px;
    right: 16px;
    background: rgba(255, 126, 185, 0.2);
    border: 1px solid rgba(255, 126, 185, 0.8);
    border-radius: 50%;
    width: 36px;
    height: 36px;
    color: #ff7eb9;
    font-size: 1.5rem;
    font-weight: 300;
    cursor: pointer;
    line-height: 1;
    transition: 
      all 0.3s cubic-bezier(0.68, -0.55, 0.265, 1.55),
      transform 0.2s ease;
    display: flex;
    align-items: center;
    justify-content: center;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
  }

  #top-popup button.close-btn:hover {
    background-color: rgba(255, 126, 185, 0.8);
    color: white;
    transform: rotate(90deg) scale(1.1);
    box-shadow: 0 4px 15px rgba(255, 126, 185, 0.4);
  }

  #top-popup button.close-btn:active {
    transform: rotate(90deg) scale(0.95);
  }

  /* Highlight the "IMPORTANT UPDATES" label */
  #top-popup strong {
    display: block;
    font-size: 1.5rem;
    margin-bottom: 1.5rem;
    text-transform: uppercase;
    letter-spacing: 3px;
    color: #ff7eb9;
    text-shadow: 0 0 8px rgba(255, 126, 185, 0.9);
    font-weight: 700;
    position: relative;
    padding-bottom: 0.5rem;
  }

  #top-popup strong::after {
    content: '';
    position: absolute;
    bottom: 0;
    left: 0;
    width: 100%;
    height: 2px;
    background: linear-gradient(90deg, rgba(255,126,185,0) 0%, rgba(255,126,185,0.8) 50%, rgba(255,126,185,0) 100%);
  }

  /* Text styling */
  #top-popup p {
    margin: 0.5rem 0;
    position: relative;
    padding-left: 1.2rem;
  }

  #top-popup p::before {
    content: '•';
    position: absolute;
    left: 0;
    color: #ff7eb9;
    font-size: 1.2rem;
    line-height: 1;
  }

  /* Content container */
  #top-popup .popup-content {
    animation: fadeInUp 0.8s ease-out 0.3s both;
  }

  @keyframes fadeInUp {
    from {
      opacity: 0;
      transform: translateY(10px);
    }
    to {
      opacity: 1;
      transform: translateY(0);
    }
  }

  /* Responsive adjustments */
  @media (max-width: 480px) {
    #top-popup {
      width: 90%;
      max-width: 340px;
      padding: 1.8rem;
    }
    
    #top-popup.show {
      top: 20px;
    }
  }

  /* Particle effects */
  .particle {
    position: absolute;
    background: rgba(255, 126, 185, 0.6);
    border-radius: 50%;
    pointer-events: none;
    z-index: -1;
  }
</style>

<div id="top-popup" role="alert" aria-live="assertive" aria-atomic="true">
  <button class="close-btn" aria-label="Close popup">&times;</button>
  <div class="popup-content">
    <strong>IMPORTANT UPDATES</strong>
    <p>Dear Valued Users,</p>
    <p>www.Boostrika.com is now a standalone platform with no browser extensions required</p>
    <p>Enhanced payment options now active: Mobile Money, PayPal, FlutterWave, Card Payments, Bitcoin, USDT, Payeer</p>
    <p>24/7 service availability (GMT)</p>
    <p>Full week coverage: Monday through Sunday</p>
    <p>Live Chat Support response time: 1-3 hours</p>
    <p>Thank you for your continued trust - Boostrika World Wide Smart Panel</p>
  </div>
</div>

<script>
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
</script>