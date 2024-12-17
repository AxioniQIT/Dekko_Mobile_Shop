const sidebarToggle = document.getElementById("sidebarToggle");
const sidebar = document.getElementById("sidebar");
const mainContent = document.getElementById("mainContent");

sidebarToggle.addEventListener("click", () => {
    sidebar.classList.toggle("active");
    mainContent.classList.toggle("active");
});
