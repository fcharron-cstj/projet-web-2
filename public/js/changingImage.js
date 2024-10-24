// Wait for the DOM to fully load before executing
document.addEventListener('DOMContentLoaded', function() {
    // Array of images for desktop and mobile
    const images = [
        "medias/crowd-festival.webp",
        "medias/stage-purple-crowd.webp",
        "medias/fire-dancer.webp",
        "medias/graphiti_artist.jpg",
        "medias/show-orange-smoke.webp"
    ]

    // Initial index for the image array
    let currentIndex = 0

    // Function to change the image
    function changeImage() {
        // Select the desktop image element and update its source
        const desktopImg = document.querySelector('.changing-img-desktop')
        if (desktopImg) {
            desktopImg.src = images[currentIndex]
        }

        // Select the mobile image element and update its source
        const mobileImg = document.querySelector('.changing-img-mobile')
        if (mobileImg) {
            mobileImg.src = images[currentIndex]
        }

        // Update index to cycle through images
        currentIndex = (currentIndex + 1) % images.length
    }

    // Change image every 2 seconds
    setInterval(changeImage, 2000)
})
