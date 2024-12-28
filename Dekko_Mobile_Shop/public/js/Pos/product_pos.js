// Print Button Functionality
document.querySelector(".print-btn").addEventListener("click", () => {
    window.print();
  });
  
  // Confirmation Alert
  document.querySelector(".confirm-btn").addEventListener("click", () => {
    alert("Order Confirmed!");
  });

  // Toggle Dark Mode
const darkModeToggle = document.getElementById("dark-mode-toggle");
darkModeToggle.addEventListener("click", () => {
  document.body.classList.toggle("dark-mode");

  // Change button icon
  if (document.body.classList.contains("dark-mode")) {
    darkModeToggle.textContent = "☀️"; // Sun icon for light mode
  } else {
    darkModeToggle.textContent = "🌙"; // Moon icon for dark mode
  }
});

  