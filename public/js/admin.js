//TODO: add closing of sorting options
document.querySelector(".close").addEventListener("click", function (e) {
    document.querySelector(".sorting-options").classList.toggle("popout");
    document.querySelector(".close").style.display = "none";
});

// add click event to each nav item

let nav = document.querySelector(".header").children;
for (let i = 0; i < nav.length; i++) {
    nav[i].addEventListener("click", function (event) {
        event.preventDefault();
        clearSortingOptions();
        changeTab(nav[i]);
    });
}

// add click event to order button

let orderBtn = document.querySelector(".order");
orderBtn.addEventListener("click", function (e) {
    e.preventDefault();
    order(e);
});

// add click event to sort button

let sortBtn = document.querySelector(".sort");
sortBtn.addEventListener("click", function (e) {
    e.preventDefault();
    const sorting_options = document.querySelector(".sorting-options");
    const collapse_btn = document.querySelector(".close");

    let active_tab = document.querySelector(".active");
    let options = active_tab.children.item(1).children.item(0).dataset;

    clearSortingOptions();

    sorting_options.style.display = "flex";
    sorting_options.classList.toggle("popout");
    if (sorting_options.classList.contains("popout")) {
        collapse_btn.style.display = "block";
    } else {
        collapse_btn.style.display = "none";
    }

    for (let option in options) {
        let option_element = document.createElement("input");
        let option_label = document.createElement("label");
        option_label.innerText = option;
        option_label.style.width = "80%";
        option_element.type = "radio";
        option_element.name = "option";
        option_element.value = option;
        sorting_options.appendChild(option_element);
        sorting_options.appendChild(option_label);
    }

    let sorting_options_form = document.querySelectorAll(
        ".sorting-options input[type='radio']"
    );
    sorting_options_form.forEach((option) => {
        option.addEventListener("change", function (e) {
            if (option.checked === true) {
                let chosen_option = option.value;
                sort(
                    chosen_option,
                    document.querySelector(".active").children.item(1)
                );
            }
        });
    });
});

/**
 * Clears the sorting options from the DOM
 */
function clearSortingOptions() {
    const sorting_options = document.querySelector(".sorting-options");
    sorting_options.innerHTML = "";
    sorting_options.style.display = "none";
    sorting_options.classList.remove("popout");

    const collapse_btn = document.querySelector(".close");
    collapse_btn.style.display = "none";
}

/**
 *  Changes the display property of the tab using the name of the nav item clicked
 *
 * @param {HTMLElement}element
 */

function changeTab(element) {
    let tabs = document.querySelectorAll("section");
    tabs.forEach((tab) => {
        if (tab.classList.contains(element.innerText.toLowerCase())) {
            tab.style.display = "block";
            tab.classList.add("active");
        } else {
            tab.style.display = "none";
            tab.classList.remove("active");
        }
    });
}

/**
 *  Filters the content of the admin panel from the search input
 *
 */
function searchFilter() {
    let input = document.getElementById("search");
    let filter = input.value.toUpperCase();
    let containers = document.querySelectorAll(".content-container");

    [...containers].forEach((container) => {
        let elements = container.children;

        [...elements].forEach((node) => (node.style.display = "none"));

        let result = [...elements].filter((e) => {
            let resp = false;

            for (d in e.dataset) {
                if (e.dataset[d].toUpperCase().indexOf(filter) > -1)
                    resp = e.dataset[d].toUpperCase().indexOf(filter) > -1;
            }
            return resp;
        });

        result.forEach((node) => (node.style.display = "block"));
    });
}

/**
 *  Sorts the content of the admin panel in alphabetic or numerical order from a chosen property
 *
 * @param {string} option
 * @param {HTMLElement} active_tab
 */
function sort(option, active_tab, order = true) {
    [...active_tab.children]
        .sort((a, b) => (eval(a.dataset[option] > b.dataset[option]) ? 1 : -1))
        .forEach((node) => active_tab.appendChild(node));
}

/**
 *  Changes the order of the content of the admin panel from grid to list
 *
 * @param {HTMLElement} element
 */
function order(element) {
    const lists = document.querySelectorAll(".content-container");
    lists.forEach((list) => {
        list.classList.contains("list")
            ? (element.target.src = "/medias/list-icon.png")
            : (element.target.src = "/medias/grid-icon.png");
        list.classList.toggle("list");
    });
}
