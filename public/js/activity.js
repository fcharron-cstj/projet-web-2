// Select arrows and day elements
let left_arrow = document.querySelector("#left-arrow")
let right_arrow = document.querySelector("#right-arrow")
let days = document.querySelectorAll(".day-information")
let day_id = 1

// Handle window resizing to display days based on screen size
window.addEventListener("resize", () => {
    if (window.outerWidth >= 768) {
        // Show all days for larger screens
        days.forEach((day) => {
            day.style.display = "flex"
        })
    } else {
        // Show only the current day for smaller screens
        days.forEach((day) => {
            day.style.display = "none"
        })
        days[day_id - 1].style.display = "flex"
    }
})

// Handle left and right arrow clicks to navigate days
left_arrow.addEventListener("click", () => showDay(--day_id))
right_arrow.addEventListener("click", () => showDay(++day_id))

// Function to display the appropriate day based on index
function showDay(dayIndex) {
    if (dayIndex > days.length) {
        day_id = 1 // Reset to the first day if exceeding the limit
    }
    if (dayIndex < 1) {
        day_id = days.length // Reset to the last day if below limit
    }

    // Hide all days
    for (let i = 0; i < days.length; i++) {
        days[i].style.display = "none"
    }

    // Show the current day
    days[day_id - 1].style.display = "flex"
}

// Select activity items for scroll behavior
const activityItems = document.querySelectorAll('.activity-item')

// Function to check if an element is visible in the viewport
const isElementInViewport = (el) => {
    const rect = el.getBoundingClientRect()
    const threshold = 90; // Control when items start to appear
    return (
        rect.top < (window.innerHeight - threshold) && // Top of the element is within viewport minus threshold
        rect.bottom > threshold 
    )
}

// Function to handle scroll effect for activity items
const handleScroll = () => {
    activityItems.forEach((item) => {
        if (isElementInViewport(item)) {
            item.classList.add('visible')
        }
    })
}

// Throttle scroll handling for better performance
let lastScrollTime = 0
const scrollThrottle = (callback) => {
    const now = Date.now()
    if (now - lastScrollTime >= 100) { // Adjust time for throttling
        callback()
        lastScrollTime = now
    }
}

// Run the scroll effect on initial load and on scroll events
handleScroll() // Initial check
window.addEventListener('scroll', () => scrollThrottle(handleScroll))
