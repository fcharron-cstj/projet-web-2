document.addEventListener('DOMContentLoaded', function() {
    // Array of images for desktop and mobile
    const images = [
        "medias/crowd-festival.webp",
        "medias/stage-purple-crowd.webp",
        "medias/fire-dancer.webp",
        "medias/graphiti_artist.jpg",
        "medias/show-orange-smoke.webp"
    ];

    let currentIndex = 0;

    // Function to change the image
    function changeImage() {
        // Desktop
        const desktopImg = document.querySelector('.changing-img-desktop');
        if (desktopImg) {
            desktopImg.src = images[currentIndex];
        }

        // Mobile
        const mobileImg = document.querySelector('.changing-img-mobile');
        if (mobileImg) {
            mobileImg.src = images[currentIndex];
        }

        // Update index
        currentIndex = (currentIndex + 1) % images.length;
    }

    // Change image every 3 seconds
    setInterval(changeImage, 2000);
});
