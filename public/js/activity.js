let left_arrow = document.querySelector("#left-arrow");
let right_arrow = document.querySelector("#right-arrow");
let days = document.querySelectorAll(".day-information");
let day_id = 1;
const activityItems = document.querySelectorAll('.activity-item');

// Function to check if an element is in the viewport
const isElementInViewport = (el) => {
    const rect = el.getBoundingClientRect();
    return (
        rect.top >= 0 &&
        rect.left >= 0 &&
        rect.bottom <= (window.innerHeight || document.documentElement.clientHeight) &&
        rect.right <= (window.innerWidth || document.documentElement.clientWidth)
    );
};

// Function to handle scroll effect
const handleScroll = () => {
    activityItems.forEach((item) => {
        if (isElementInViewport(item)) {
            item.classList.add('visible');
        }
    });
};

// Function to show a specific day with smooth transition
function showDay(dayIndex) {
    if (dayIndex > days.length) {
        day_id = 1;
    }

    if (dayIndex < 1) {
        day_id = days.length;
    }

    // Hide all days with a fade out effect
    days.forEach((day) => {
        day.style.opacity = '0';
        setTimeout(() => {
            day.style.display = "none"; // Hide after fade out
        }, 500); // Match the transition duration
    });

    // Show the selected day with a fade in effect
    days[day_id - 1].style.display = "flex";
    setTimeout(() => {
        days[day_id - 1].style.opacity = '1'; // Fade in
    }, 50); // Slight delay to allow display change
}

// Event listeners for arrow clicks
left_arrow.addEventListener("click", () => showDay(--day_id));
right_arrow.addEventListener("click", () => showDay(++day_id));

// Resize event to handle responsive display of days
window.addEventListener("resize", () => {
    if (window.outerWidth >= 768) {
        days.forEach((day) => {
            day.style.display = "flex";
            day.style.opacity = '1'; // Ensure visible on large screens
        });
    } else {
        days.forEach((day) => {
            day.style.display = "none";
            day.style.opacity = '0'; // Hide on small screens
        });
        days[day_id - 1].style.display = "flex";
        days[day_id - 1].style.opacity = '1'; // Show current day
    }
});

// Initial setup: Hide days on small screens and show the first day
if (window.outerWidth < 768) {
    days.forEach((day) => {
        day.style.display = "none";
        day.style.opacity = '0'; // Ensure hidden
    });
    days[day_id - 1].style.display = "flex";
    setTimeout(() => {
        days[day_id - 1].style.opacity = '1'; // Fade in first day
    }, 50);
}

// Throttle scroll handling for smoother performance
let lastScrollTime = 0;
const scrollThrottle = (callback) => {
    const now = Date.now();
    if (now - lastScrollTime >= 100) { // Adjust time for throttling
        callback();
        lastScrollTime = now;
    }
};

// Handle scroll on initial load and on scroll events
handleScroll();
window.addEventListener('scroll', () => scrollThrottle(handleScroll));
