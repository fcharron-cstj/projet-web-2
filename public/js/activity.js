let left_arrow = document.querySelector("#left-arrow")
let right_arrow = document.querySelector("#right-arrow")
let days = document.querySelectorAll(".day-information")
let day_id = 1
 
window.addEventListener("resize", () => {
    if (window.outerWidth >= 768) {
 
        days.forEach((day) => {
            day.style.display = "flex"
 
        })
    }
    else{
        days.forEach((day) => {
            day.style.display = "none"
        })
        days[day_id - 1].style.display = "flex"
    }
})
 
left_arrow.addEventListener("click", () => showDay(--day_id))
right_arrow.addEventListener("click", () => showDay(++day_id))
 
function showDay(dayIndex) {
    if (dayIndex > days.length) {
        day_id = 1
    }
 
    if (dayIndex < 1) {
        day_id = days.length
    }
 
    for (i = 0; i < days.length; i++) {
        days[i].style.display = "none"
    }
 
    days[day_id - 1].style.display = "flex"
}


//Scroll behavior
const activityItems = document.querySelectorAll('.activity-item');

// Function to check if an element is in the viewport
const isElementInViewport = (el) => {
    const rect = el.getBoundingClientRect();
    const threshold = 90; // Adjust this to control when items start to appear
    return (
        rect.top < (window.innerHeight - threshold) && // Check if the top is within the viewport minus the threshold
        rect.bottom > threshold // Ensure the bottom is still in view
    );
}

// Function to handle scroll effect
const handleScroll = () => {
    activityItems.forEach((item) => {
        if (isElementInViewport(item)) {
            item.classList.add('visible'); // Add class to make the item visible
        }
    });
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
handleScroll(); // Initial check
window.addEventListener('scroll', () => scrollThrottle(handleScroll)); // Throttle the scroll event
