// Get references to the menu button, close button, and menu overlay elements
const menuBtn = document.getElementById("menu-btn");
const closeBtn = document.getElementById("close-btn");
const menuOverlay = document.getElementById("menu-overlay");

// Show the menu overlay when the menu button is clicked
menuBtn.addEventListener("click", () => {
    menuOverlay.classList.remove("hidden"); // Make overlay visible
    menuOverlay.classList.add("flex");      // Apply flex display
});

// Hide the menu overlay when the close button is clicked
closeBtn.addEventListener("click", () => {
    menuOverlay.classList.add("hidden");    // Hide overlay
    menuOverlay.classList.remove("flex");   // Remove flex display
});






