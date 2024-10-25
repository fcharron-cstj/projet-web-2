let popup = document.querySelector(".alert")
let close_btn = document.querySelector(".close-popup")

close_btn?.addEventListener("click", function () { closePopup(popup) });

if (popup) {
    setTimeout(function () { closePopup(popup) }, 4000);
}
function closePopup(popup) {
    popup.style.animation = "none";
}
