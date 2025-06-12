// Theme Toggle
const themeToggle = document.getElementById("themeToggle");
const themeIcon = document.getElementById("themeIcon");
const body = document.body;

themeToggle.addEventListener("click", () => {
    body.classList.toggle("dark");
    if (body.classList.contains("dark")) {
        themeIcon.className = "fas fa-sun";
        localStorage.setItem("theme", "dark");
    } else {
        themeIcon.className = "fas fa-moon";
        localStorage.setItem("theme", "light");
    }
});

// Load saved theme
const savedTheme = localStorage.getItem("theme");
if (savedTheme === "dark") {
    body.classList.add("dark");
    themeIcon.className = "fas fa-sun";
}

// Sidebar Toggle
const sidebarToggle = document.getElementById("sidebarToggle");
const sidebar = document.getElementById("sidebar");
const mainContent = document.getElementById("mainContent");
let sidebarOpen = true;

sidebarToggle.addEventListener("click", () => {
    sidebarOpen = !sidebarOpen;
    if (sidebarOpen) {
        sidebar.classList.remove("collapsed");
        mainContent.classList.remove("expanded");
        sidebarToggle.innerHTML = '<i class="fas fa-times"></i>';
    } else {
        sidebar.classList.add("collapsed");
        mainContent.classList.add("expanded");
        sidebarToggle.innerHTML = '<i class="fas fa-bars"></i>';
    }
});

// Navigation
const navLinks = document.querySelectorAll(".nav-link");
const dashboardContent = document.getElementById("dashboard-content");
const otherContent = document.getElementById("other-content");
const pageTitle = document.getElementById("page-title");
const placeholderTitle = document.getElementById("placeholder-title");
const placeholderDescription = document.getElementById(
    "placeholder-description"
);
const placeholderIcon = document.getElementById("placeholder-icon");

// Menu icons mapping
const menuIcons = {
    dashboard: "fas fa-home",
    users: "fas fa-users",
    products: "fas fa-box",
    orders: "fas fa-shopping-cart",
    payments: "fas fa-credit-card",
    coupons: "fas fa-gift",
    reviews: "fas fa-comment",
    reports: "fas fa-chart-bar",
    settings: "fas fa-cog",
};

navLinks.forEach((link) => {
    link.addEventListener("click", () => {
        // Remove active class from all links
        navLinks.forEach((l) => l.classList.remove("active"));

        // Add active class to clicked link
        link.classList.add("active");

        const menu = link.dataset.menu;

        // Handle submenu toggle
        const submenu = document.getElementById(menu + "-submenu");
        if (submenu) {
            // Close all other submenus
            document.querySelectorAll(".submenu").forEach((sm) => {
                if (sm !== submenu) {
                    sm.classList.remove("show");
                }
            });
            // Toggle current submenu
            submenu.classList.toggle("show");
        }

        // Show appropriate content
        if (menu === "dashboard") {
            dashboardContent.style.display = "block";
            otherContent.style.display = "none";
        } else {
            dashboardContent.style.display = "none";
            otherContent.style.display = "block";

            // Update placeholder content
            const menuName = menu.charAt(0).toUpperCase() + menu.slice(1);
            pageTitle.textContent = menuName + " Management";
            placeholderTitle.textContent = menuName + " Management";
            placeholderDescription.textContent = `This section will contain ${menu} management functionality including tables, forms, and data visualization.`;
            placeholderIcon.className = menuIcons[menu] || "fas fa-box";
        }
    });
});

// Mobile responsiveness
function handleResize() {
    if (window.innerWidth <= 768) {
        sidebar.classList.add("collapsed");
        mainContent.classList.add("expanded");
        sidebarToggle.innerHTML = '<i class="fas fa-bars"></i>';
        sidebarOpen = false;
    } else if (!sidebarOpen) {
        sidebar.classList.remove("collapsed");
        mainContent.classList.remove("expanded");
        sidebarToggle.innerHTML = '<i class="fas fa-times"></i>';
        sidebarOpen = true;
    }
}

window.addEventListener("resize", handleResize);
handleResize(); // Call on load

// Mobile sidebar toggle
sidebarToggle.addEventListener("click", () => {
    if (window.innerWidth <= 768) {
        sidebar.classList.toggle("show");
    }
});

// Close mobile sidebar when clicking outside
document.addEventListener("click", (e) => {
    if (
        window.innerWidth <= 768 &&
        !sidebar.contains(e.target) &&
        !sidebarToggle.contains(e.target) &&
        sidebar.classList.contains("show")
    ) {
        sidebar.classList.remove("show");
    }
});

// Search functionality placeholder
const searchInput = document.querySelector(".search-input");
searchInput.addEventListener("input", (e) => {
    console.log("Searching for:", e.target.value);
    // Add your search logic here
});

// Action buttons functionality
document.addEventListener("click", (e) => {
    if (e.target.closest(".action-btn")) {
        const btn = e.target.closest(".action-btn");
        const icon = btn.querySelector("i");

        if (icon.classList.contains("fa-eye")) {
            console.log("View action clicked");
            // Add view logic here
        } else if (icon.classList.contains("fa-edit")) {
            console.log("Edit action clicked");
            // Add edit logic here
        } else if (icon.classList.contains("fa-trash")) {
            console.log("Delete action clicked");
            // Add delete logic here
        }
    }
});

// Notification click handler
document.querySelector(".notification-btn").addEventListener("click", () => {
    console.log("Notifications clicked");
    // Add notification dropdown logic here
});

// Logout handler
document
    .querySelector(".header-right .header-btn:last-child")
    .addEventListener("click", () => {
        if (confirm("Are you sure you want to logout?")) {
            console.log("Logging out...");
            // Add logout logic here
        }
    });

// Add some animation effects
function addHoverEffects() {
    const cards = document.querySelectorAll(".stat-card, .content-card");
    cards.forEach((card) => {
        card.addEventListener("mouseenter", () => {
            card.style.transform = "translateY(-2px)";
            card.style.boxShadow = "0 4px 6px rgba(0, 0, 0, 0.1)";
        });

        card.addEventListener("mouseleave", () => {
            card.style.transform = "translateY(0)";
            card.style.boxShadow = "0 1px 3px rgba(0, 0, 0, 0.1)";
        });
    });
}

// Initialize hover effects
addHoverEffects();

// Simulate real-time updates (optional)
function simulateUpdates() {
    setInterval(() => {
        // Update notification badge randomly
        const badge = document.querySelector(".notification-badge");
        if (Math.random() > 0.7) {
            badge.style.display = "block";
        } else {
            badge.style.display = "none";
        }
    }, 5000);
}

// Start simulated updates
simulateUpdates();

console.log("Admin Dashboard initialized successfully!");
