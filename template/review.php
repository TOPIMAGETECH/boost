<section class="reviews-section max-w-6xl mx-auto px-6 py-12">
  <div class="section-header flex flex-col sm:flex-row justify-between items-center mb-8">
    <h2 class="text-3xl font-bold text-white-800">Customer Reviews</h2>
    <button id="openReviewForm" class="mt-4 sm:mt-0 px-6 py-2 bg-pink-600 hover:bg-pink-700 text-white rounded-lg shadow-md transition">
      Write a Review
    </button>
  </div>

  <!-- Reviews Display -->
  <div id="reviewsContainer" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
    <!-- Reviews from DB will appear here -->
  </div>
</section>

<!-- Review Popup -->
<div id="reviewPopup" class="fixed inset-0 bg-black bg-opacity-50 hidden justify-center items-center z-50">
  <div class="bg-white p-8 rounded-xl shadow-lg max-w-lg w-full relative">
    <button id="closeReviewPopup" class="absolute top-4 right-4 text-gray-500 hover:text-gray-800">&times;</button>
    <h3 class="text-xl font-semibold text-gray-800 mb-6">Share Your Experience</h3>

    <form id="reviewForm" enctype="multipart/form-data" class="space-y-5">
      <input type="text" id="userName" name="userName" placeholder="Your Name" required
        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-pink-500">
      
      <div>
        <label class="block text-gray-700 mb-2">Your Rating</label>
        <div class="star-rating flex space-x-1 text-2xl text-gray-400 cursor-pointer">
          <span data-value="1">☆</span>
          <span data-value="2">☆</span>
          <span data-value="3">☆</span>
          <span data-value="4">☆</span>
          <span data-value="5">☆</span>
          <input type="hidden" id="userRating" name="userRating" required>
        </div>
      </div>

      <textarea id="reviewText" name="reviewText" placeholder="Your review..." required
        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-pink-500"></textarea>

      <input type="file" id="reviewMedia" name="reviewMedia" accept="image/*,video/*"
        class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:bg-pink-50 file:text-pink-600 hover:file:bg-pink-100">

      <button type="submit" class="w-full bg-pink-600 hover:bg-pink-700 text-white py-2 rounded-lg shadow-md transition">
        Submit Review
      </button>
    </form>
  </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', () => {
  const openForm = document.getElementById('openReviewForm');
  const closeForm = document.getElementById('closeReviewPopup');
  const reviewPopup = document.getElementById('reviewPopup');
  const reviewForm = document.getElementById('reviewForm');
  const reviewsContainer = document.getElementById('reviewsContainer');

  // Open/close popup
  openForm.addEventListener('click', () => reviewPopup.classList.remove('hidden'));
  closeForm.addEventListener('click', () => reviewPopup.classList.add('hidden'));

  // Fetch and display reviews
  async function loadReviews() {
    const res = await fetch('/api/reviews');
    const reviews = await res.json();
    reviewsContainer.innerHTML = reviews.map(r => `
      <div class="border rounded-lg p-4 shadow bg-white">
        <div class="flex items-center mb-2">
          <span class="font-semibold">${r.userName}</span>
          <span class="ml-2 text-yellow-400">${'★'.repeat(r.userRating)}</span>
        </div>
        <p class="text-gray-700">${r.reviewText}</p>
        ${r.mediaUrl ? `<div class="mt-3">${r.mediaType.startsWith('image') ? 
          `<img src="${r.mediaUrl}" class="rounded-lg">` : 
          `<video controls class="rounded-lg"><source src="${r.mediaUrl}"></video>`}</div>` : ''}
      </div>
    `).join('');
  }
  loadReviews();

  // Handle form submit with 1-per-day limit
  reviewForm.addEventListener('submit', async (e) => {
    e.preventDefault();

    // Check localStorage for last submission
    const lastReviewDate = localStorage.getItem('lastReviewDate');
    const today = new Date().toDateString();
    if (lastReviewDate === today) {
      alert('You can only submit one review per day.');
      return;
    }

    const formData = new FormData(reviewForm);
    const res = await fetch('/api/reviews', { method: 'POST', body: formData });
    if (res.ok) {
      localStorage.setItem('lastReviewDate', today);
      reviewPopup.classList.add('hidden');
      reviewForm.reset();
      loadReviews();
    }
  });
});
</script>
