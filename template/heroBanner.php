<link rel="stylesheet" href="./CSS/hero.css">

<div class="hero">
  <div class="rain"></div>

  <!-- Hero Content -->
  <div class="hero-inner">
    <!-- Hero Title -->
    <h1>
      <span>Welcome to Boostrika</span>
    </h1>

    <!-- Hero Description -->
    <p>
      Where our program is designed to enhance your brand, and our advanced algorithm boosts online sales by connecting you with your ideal customers.
    </p>

    <!-- Action Buttons -->
    <div style="display:flex; flex-wrap: wrap; gap:1rem; justify-content: center;">
      <!-- Depot Button -->
      <a href="loginSystem/register_form.php"
        class="shop-btn"
        style="display:inline-flex; align-items:center; justify-content:center;">
        <ion-icon name="cart" class="mr-2" style="font-size:1.25rem; margin-right:0.5rem;"></ion-icon>
        Get Started
      </a>

      <!-- Watch Videos Button -->
      <a href="https://www.youtube.com/@bismarkiqtech"
        target="_blank"
        class="watch-videos"
        style="display:inline-flex; align-items:center; justify-content:center;">
        <ion-icon name="play-circle" class="mr-2" style="font-size:1.25rem; margin-right:0.5rem;"></ion-icon>
        Watch Demo
      </a>
    </div>
  </div>

  <!-- Profile Image -->
  <div class="big-image">
    <div style="position: relative;">
      <img src="https://i.postimg.cc/jjrqfb71/profile-pic.png"
        alt="Bismark Boost X" />
      <div class="blur-bg"></div>
    </div>
  </div>
</div>

<!-- Ionicons -->
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

<script>
  // Create 50 raindrops with random positions, delays, and durations
  const rainContainer = document.querySelector('.rain');
  const viewportHeight = window.innerHeight;

  for (let i = 0; i < 50; i++) {
    const drop = document.createElement('div');
    drop.classList.add('raindrop');

    drop.style.left = Math.random() * 100 + 'vw'; // random horizontal position
    drop.style.animationDelay = (Math.random() * 1) + 's'; // random delay up to 1s
    drop.style.animationDuration = (0.3 + Math.random() * 0.7) + 's'; // random duration 0.3-1s
    drop.style.height = (50 + Math.random() * 30) + 'px'; // random height 50-80px
    rainContainer.appendChild(drop);
  }
</script>