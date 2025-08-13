document.querySelector(".arrow-left").addEventListener("click", () => {
  document.querySelector(".steps").scrollBy({
    left: -300,
    behavior: "smooth",
  });
});
document.querySelector(".arrow-right").addEventListener("click", () => {
  document.querySelector(".steps").scrollBy({
    left: 300,
    behavior: "smooth",
  });
});
