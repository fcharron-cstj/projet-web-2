const burgerMenu = document.getElementById('burger-menu')
const mobileMenu = document.getElementById('mobile-menu')
const closeMenu = document.getElementById('close-menu')

burgerMenu.addEventListener('click', () => {
    mobileMenu.classList.toggle('active')
    burgerMenu.style.display = mobileMenu.classList.contains('active') ? 'none' : 'block'
})

closeMenu.addEventListener('click', () => {
    mobileMenu.classList.remove('active')
    burgerMenu.style.display = 'block'
})


const videoPlayer = document.getElementById('videoPlayer');
const playPauseBtn = document.getElementById('playPauseBtn');
const playPauseIcon = document.getElementById('playPauseIcon');

function updateButtonIcon() {
    if (videoPlayer.paused) {
        playPauseIcon.classList.remove('bi-pause');
        playPauseIcon.classList.add('bi-play');
    } else {
        playPauseIcon.classList.remove('bi-play');
        playPauseIcon.classList.add('bi-pause');
    }
}

playPauseBtn.addEventListener('click', () => {
    if (videoPlayer.paused) {
        videoPlayer.play();
    } else {
        videoPlayer.pause();
    }
    updateButtonIcon();
});

updateButtonIcon();
