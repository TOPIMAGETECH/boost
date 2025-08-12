<style>
  :root {
    --color-gray-900: #121212;
    --color-white: #fff;
    --color-pink-light: #ff7eb9;
    --color-pink-dark: #ff65a3;
  }

  /* Hero styles */
  .hero {
    position: relative; /* to position rain absolutely inside */
    overflow: hidden;   /* hide overflow of raindrops */
    background-color: var(--color-gray-900);
    min-height: 100vh;
    padding-top: 10rem;
    padding-bottom: 10rem;
    padding-left: 1.5rem;
    padding-right: 1.5rem;
    display: flex;
    flex-direction: column;
    gap: 3rem;
    justify-content: space-between;
    align-items: center;
  }

  @media (min-width: 1024px) {
    .hero {
      flex-direction: row;
      padding-left: 3rem;
      padding-right: 3rem;
      gap: 3rem;
      justify-content: space-between;
      align-items: center;
    }
  }

  .hero-inner {
    text-align: center;
    max-width: 42rem;
    z-index: 10; /* above rain */
  }

  @media (min-width: 1024px) {
    .hero-inner {
      text-align: left;
      margin-right: 3rem;
    }
  }

  h1 {
    font-weight: 700;
    margin-bottom: 1.5rem;
    font-size: 2.25rem;
    color: var(--color-white);
    letter-spacing: 0.05em;
  }

  @media (min-width: 640px) {
    h1 {
      font-size: 3rem;
    }
  }

  @media (min-width: 768px) {
    h1 {
      font-size: 3.75rem;
    }
  }

  h1 span {
    background: linear-gradient(to right, var(--color-pink-light), var(--color-pink-dark));
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
  }

  p {
    font-size: 1.125rem;
    color: #d1d5db; /* text-gray-300 */
    margin-bottom: 2.5rem;
    line-height: 1.6;
  }

  .shop-btn, .watch-videos {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    font-weight: 600;
    border-radius: 9999px;
    padding: 0.75rem 2rem;
    cursor: pointer;
    transition: all 0.3s ease;
  }

  .shop-btn {
    background: linear-gradient(to right, var(--color-pink-light), var(--color-pink-dark));
    color: var(--color-white);
  }

  .shop-btn:hover {
    filter: brightness(1.1);
    transform: translateY(-4px);
    box-shadow: 0 10px 15px -3px rgba(255,101,163,0.3);
  }

  .watch-videos {
    border: 2px solid var(--color-pink-light);
    color: var(--color-pink-light);
  }

  .watch-videos:hover {
    background-color: rgba(255,101,163,0.1);
    box-shadow: 0 10px 15px -3px rgba(255,101,163,0.2);
    transform: translateY(-4px);
  }

  .big-image {
    position: relative;
    z-index: 10; /* above rain */
    margin-top: 4rem;
  }

  @media (min-width: 1024px) {
    .big-image {
      margin-top: 0;
    }
  }

  .big-image img {
    width: 100%;
    max-width: 28rem;
    border-radius: 1rem;
    box-shadow: 0 25px 50px -12px rgba(0,0,0,0.75);
    border: 4px solid rgba(255,126,185,0.2);
    transition: transform 0.5s ease;
  }

  .big-image img:hover {
    transform: scale(1.05);
  }

  .big-image > div > .blur-bg {
    position: absolute;
    inset: -1rem;
    background: linear-gradient(to right, var(--color-pink-light), var(--color-pink-dark));
    border-radius: 1rem;
    filter: blur(40px);
    opacity: 0.2;
    z-index: -1;
  }


  /* Rain container */
  .rain {
    pointer-events: none;
    position: absolute;
    inset: 0;
    z-index: 0; /* behind content */
    overflow: hidden;
  }

  /* Single raindrop style */
  .raindrop {
    position: absolute;
    top: -100px;
    width: 1px;
    height: 70px;
    background: linear-gradient(to bottom, rgba(255,255,255,0.3), rgba(255,255,255,0));
    animation-name: drop;
    animation-timing-function: linear;
    animation-iteration-count: infinite;
    filter: drop-shadow(0 0 1px rgba(255,255,255,0.5));
    opacity: 0.3;
  }

  @keyframes drop {
    0% {
      top: -100px;
      opacity: 1;
    }
    100% {
      top: 100vh;
      opacity: 0;
    }
  }
</style>

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
        alt="Bismark Boost X"
        />
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

  for(let i = 0; i < 50; i++) {
    const drop = document.createElement('div');
    drop.classList.add('raindrop');

    drop.style.left = Math.random() * 100 + 'vw';  // random horizontal position
    drop.style.animationDelay = (Math.random() * 1) + 's'; // random delay up to 1s
    drop.style.animationDuration = (0.3 + Math.random() * 0.7) + 's'; // random duration 0.3-1s
    drop.style.height = (50 + Math.random() * 30) + 'px'; // random height 50-80px
    rainContainer.appendChild(drop);
  }
</script>
