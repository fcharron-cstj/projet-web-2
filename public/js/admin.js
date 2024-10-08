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

let orderBtn = document.querySelector(".order");
orderBtn.addEventListener("click", function (e) {
    e.preventDefault();
    order();
});

let sortBtn = document.querySelector(".sort");
sortBtn.addEventListener("click", function (e) {
    e.preventDefault();
    sort();
});

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
function searchFilter() {
    let input = document.getElementById("search");
    let filter = input.value.toUpperCase();
    let container = document.querySelector(".content-container");
    let elements = container.children;

    [...elements].forEach((node) => (node.style.display = "none"));

    let result = [...elements].filter((e) => {
        return (
            e.dataset.name.toUpperCase().indexOf(filter) > -1 ||
            e.dataset.email.toUpperCase().indexOf(filter) > -1
        );
    });

    result.forEach((node) => (node.style.display = "block"));
}

function sort() {
    const lists = document.querySelectorAll(".content-container");
    let list = lists[0];

    [...list.children]
        .sort((a, b) => (a.dataset.id > b.dataset.id ? 1 : -1))
        .forEach((node) => list.appendChild(node));
}
function order() {
    const lists = document.querySelectorAll(".content-container");
    lists.forEach((list) => {
        list.classList.toggle("list");
    });
}
