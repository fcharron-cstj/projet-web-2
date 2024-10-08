document.addEventListener("DOMContentLoaded", function (e) {
    let tabs = document.querySelectorAll("section");
    for (let i = 1; i < tabs.length; i++) {
        tabs[i].style.display = "none";
    }
});

let nav = document.querySelector(".header").children;
for (let i = 0; i < nav.length; i++) {
    nav[i].addEventListener("click", function (event) {
        event.preventDefault();
        changeTab(nav[i]);
    });
}
function changeTab(element) {
    let tabs = document.querySelectorAll("section");
    tabs.forEach((tab) => {
        if (tab.classList.contains(element.innerText.toLowerCase())) {
            tab.style.display = "block";
        } else {
            tab.style.display = "none";
        }
    });
}
