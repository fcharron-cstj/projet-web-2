const videoPlayer = document.getElementById("videoPlayer");
const playPauseBtn = document.getElementById("playPauseBtn");
const playPauseIcon = document.getElementById("playPauseIcon");

function updateButtonIcon() {
    if (videoPlayer.paused) {
        playPauseIcon.classList.remove("bi-pause");
        playPauseIcon.classList.add("bi-play");
    } else {
        playPauseIcon.classList.remove("bi-play");
        playPauseIcon.classList.add("bi-pause");
    }
}
playPauseBtn.addEventListener("click", () => {
    if (videoPlayer.paused) {
        videoPlayer.play();
    } else {
        videoPlayer.pause();
    }
    updateButtonIcon();
});

updateButtonIcon();
