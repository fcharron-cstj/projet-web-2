// Select elements for the burger menu, mobile menu, and close button
const burgerMenu = document.getElementById("burger-menu");
const mobileMenu = document.getElementById("mobile-menu");
const closeMenu = document.getElementById("close-menu");

// Event listener for burger menu click
burgerMenu.addEventListener("click", () => {
    // Toggle the 'slidein' and 'active' classes for the mobile menu
    mobileMenu.classList.toggle("slidein");
    mobileMenu.classList.toggle("active");

    // Show or hide the burger menu based on the active state of the mobile menu
    burgerMenu.style.display = mobileMenu.classList.contains("active")
        ? "none" // Hide burger menu when mobile menu is active
        : "block"; // Show burger menu when mobile menu is not active
});

// Event listener for close menu button click
closeMenu.addEventListener("click", () => {
    // Remove 'slidein' and 'active' classes to close the mobile menu
    mobileMenu.classList.remove("slidein");
    mobileMenu.classList.remove("active");

    // Display the burger menu when the mobile menu is closed
    burgerMenu.style.display = "block";
});
