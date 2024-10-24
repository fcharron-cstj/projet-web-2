let popup = document.querySelector(".alert")
let close_btn = document.querySelector(".close-popup")

close_btn?.addEventListener("click", closePopup)

if (popup) setInterval(closePopup, 5000)

function closePopup() {
    popup.style.animation = "none"
}
