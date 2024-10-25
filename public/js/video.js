// Select the video player, play/pause button, and play/pause icon elements
const videoPlayer = document.getElementById("videoPlayer")

// Add event listener to toggle play/pause on button click
videoPlayer.addEventListener("click", () => {
    // Play the video if paused, otherwise pause it
    if (videoPlayer.paused) {
        videoPlayer.play()
    } else {
        videoPlayer.pause()
    }
    // Update the button icon accordingly
    updateButtonIcon()
})