// Select the video player, play/pause button, and play/pause icon elements
const videoPlayer = document.getElementById("videoPlayer")
const playPauseBtn = document.getElementById("playPauseBtn")
const playPauseIcon = document.getElementById("playPauseIcon")

/**
 * Updates the play/pause button icon based on the video player state.
 */
function updateButtonIcon() {
    if (videoPlayer.paused || videoPlayer.ended) {
        // If video is paused or ended, show play icon
        playPauseIcon.classList.remove("bi-pause")
        playPauseIcon.classList.add("bi-play")
    } else {
        // If video is playing, show pause icon
        playPauseIcon.classList.remove("bi-play")
        playPauseIcon.classList.add("bi-pause")
    }
}

// Add event listener to toggle play/pause on button click
playPauseBtn.addEventListener("click", () => {
    // Play the video if paused, otherwise pause it
    if (videoPlayer.paused) {
        videoPlayer.play()
    } else {
        videoPlayer.pause()
    }
    // Update the button icon accordingly
    updateButtonIcon()
})

// Update the play/pause button icon when the video starts playing
videoPlayer.addEventListener("play", updateButtonIcon)

// Update the play/pause button icon when the video is paused
videoPlayer.addEventListener("pause", updateButtonIcon)

// Set the initial state of the play/pause icon
document.addEventListener("DOMContentLoaded", updateButtonIcon)
