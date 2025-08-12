<section class="features-benefits">
  <div class="section-header">
    <h2>Features & Benefits</h2>
  </div>

  <div class="scroll-wrapper">
    <button class="scroll-arrow left" onclick="scrollFeatures(-1)">&#10094;</button>

    <div class="scroll-container" id="featuresContainer">
      <!-- Features -->
      <div class="card feature">
        <div class="video-container">
          <video muted loop playsinline poster="videos/posters/automated-order.jpg">
            <source src="videos/automated-order.mp4" type="video/mp4">
          </video>
          <button class="play-pause" aria-label="Play/pause video">▶</button>
        </div>
        <h3>📦 Automated Order System</h3>
        <p>Place and process orders automatically without manual work.</p>
      </div>

      <div class="card feature">
        <div class="video-container">
          <video muted loop playsinline poster="videos/posters/real-time-tracking.jpg">
            <source src="videos/real-time-tracking.mp4" type="video/mp4">
          </video>
          <button class="play-pause" aria-label="Play/pause video">▶</button>
        </div>
        <h3>⏱ Real-Time Tracking</h3>
        <p>Monitor your orders from start to finish in real-time.</p>
      </div>

      <!-- Add other cards following the same pattern -->
      
    </div>

    <button class="scroll-arrow right" onclick="scrollFeatures(1)">&#10095;</button>
  </div>
</section>

<style>
:root {
  /* Colors */
  --color-gray-900: #1a202c;
  --color-white: #ffffff;
  --color-pink-light: #ff4081;
  --color-pink-dark: #e91e63;
  --color-video-overlay: rgba(0, 0, 0, 0.3);

  /* Font */
  --font-family: 'Poppins', sans-serif;

  /* Animation Speed */
  --animation-speed: 15s;
  
  /* Dimensions */
  --card-min-width: 280px;
  --video-height: 200px;
  --arrow-size: 40px;
}

.features-benefits {
  padding: 2.5rem 1.25rem;
  background: var(--color-gray-900);
  color: var(--color-white);
  font-family: var(--font-family);
}

.section-header {
  text-align: center;
  margin-bottom: 1.5rem;
}

.section-header h2 {
  font-size: 1.75rem;
  margin: 0;
}

.scroll-wrapper {
  position: relative;
  display: flex;
  align-items: center;
  max-width: 1200px;
  margin: 0 auto;
}

.scroll-container {
  display: flex;
  overflow-x: auto;
  scroll-behavior: smooth;
  gap: 1.25rem;
  padding: 0.625rem;
  scrollbar-width: none; /* Firefox */
  -ms-overflow-style: none; /* IE/Edge */
}

.scroll-container::-webkit-scrollbar {
  display: none; /* Chrome/Safari */
}

.card {
  min-width: var(--card-min-width);
  background: #2d3748;
  padding: 1.25rem;
  border-radius: 0.75rem;
  flex-shrink: 0;
  display: flex;
  flex-direction: column;
  transition: transform 0.3s ease;
}

.card:hover {
  transform: translateY(-5px);
}

.card h3 {
  margin: 1rem 0 0.625rem;
  color: var(--color-pink-light);
  font-size: 1.1rem;
}

.card p {
  margin: 0;
  font-size: 0.9rem;
  line-height: 1.4;
}

.video-container {
  width: 100%;
  height: var(--video-height);
  border-radius: 0.5rem;
  overflow: hidden;
  background: #000;
  position: relative;
}

.video-container video {
  width: 100%;
  height: 100%;
  object-fit: cover;
  transition: opacity 0.3s ease;
}

.play-pause {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  background: var(--color-video-overlay);
  color: var(--color-white);
  border: none;
  width: 2.5rem;
  height: 2.5rem;
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
  cursor: pointer;
  opacity: 0;
  transition: opacity 0.3s ease;
}

.video-container:hover .play-pause {
  opacity: 1;
}

.scroll-arrow {
  position: absolute;
  top: calc(50% - var(--arrow-size)/2);
  background: var(--color-pink-dark);
  color: var(--color-white);
  border: none;
  width: var(--arrow-size);
  height: var(--arrow-size);
  border-radius: 50%;
  cursor: pointer;
  z-index: 10;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 1.25rem;
  transition: transform 0.2s ease, background 0.2s ease;
}

.scroll-arrow:hover {
  background: var(--color-pink-light);
  transform: scale(1.1);
}

.scroll-arrow.left { left: -1.25rem; }
.scroll-arrow.right { right: -1.25rem; }

/* Responsive adjustments */
@media (max-width: 768px) {
  :root {
    --card-min-width: 240px;
    --video-height: 140px;
  }
  
  .scroll-arrow {
    width: 2rem;
    height: 2rem;
    font-size: 1rem;
  }
  
  .scroll-arrow.left { left: -0.5rem; }
  .scroll-arrow.right { right: -0.5rem; }
}
</style>

<script>
function scrollFeatures(direction) {
  const container = document.getElementById('featuresContainer');
  const scrollAmount = container.clientWidth * 0.8;
  container.scrollBy({ left: scrollAmount * direction, behavior: 'smooth' });
}

document.addEventListener('DOMContentLoaded', function() {
  const videoContainers = document.querySelectorAll('.video-container');
  
  videoContainers.forEach(container => {
    const video = container.querySelector('video');
    const playButton = container.querySelector('.play-pause');
    
    // Initialize video state
    video.pause();
    
    // Play/pause toggle
    playButton.addEventListener('click', () => {
      if (video.paused) {
        video.play();
        playButton.textContent = '❚❚';
      } else {
        video.pause();
        playButton.textContent = '▶';
      }
    });
    
    // Auto-play when visible
    const observer = new IntersectionObserver((entries) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          video.play();
          playButton.textContent = '❚❚';
        } else {
          video.pause();
          playButton.textContent = '▶';
        }
      });
    }, { threshold: 0.75 });
    
    observer.observe(container);
    
    // Update button when video ends (for non-looping)
    video.addEventListener('ended', () => {
      playButton.textContent = '▶';
    });
  });
});
</script>