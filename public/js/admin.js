//event dom loaded
document.addEventListener("DOMContentLoaded", function () {
    //get the active tab from session storage
    let activeTab = sessionStorage.getItem('activeTab');
    if (activeTab) {
        changeTab(document.querySelector(`a[href="#${activeTab}"]`));
    }
});

//sorting options
document.querySelector(".close").addEventListener("click", function (e) {
    document.querySelector(".sorting-options").classList.toggle("popout");
    document.querySelector(".close").style.display = "none";
});

// Add click event to each nav item
let nav = document.querySelector(".header").children;
for (let i = 0; i < nav.length; i++) {
    nav[i].addEventListener("click", function (event) {
        event.preventDefault();
        clearSortingOptions();
        //store the active tab in session storage
        sessionStorage.setItem('activeTab',  (event.target.href).split('#').pop());
        changeTab(nav[i]);
    });
}

// Add click event to the order button
let orderBtn = document.querySelector(".order");
orderBtn.addEventListener("click", function (e) {
    e.preventDefault();
    order(e);
});

// Add click event to the sort button
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

    // Toggle the display of the collapse button
    if (sorting_options.classList.contains("popout")) {
        collapse_btn.style.display = "block";
    } else {
        collapse_btn.style.display = "none";
    }

    // Add radio inputs for sorting options
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

    // Add event listeners for sorting options
    let sorting_options_form = document.querySelectorAll(
        ".sorting-options input[type='radio']"
    );
    sorting_options_form.forEach((option) => {
        option.addEventListener("change", function () {
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
 * Clears the sorting options from the DOM.
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
 * Changes the display property of the tab based on the nav item clicked.
 *
 * @param {HTMLElement} element
 */
function changeTab(element) {
    //add styling to nav for selected tab
    [...document.querySelector(".header").children].forEach(tab => tab.classList.remove('selected'));
    element.classList.add('selected');

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
 * Filters the content of the admin panel from the search input.
 */
function searchFilter() {
    let input = document.getElementById("search");
    let filter = input.value.toUpperCase();
    let containers = document.querySelectorAll(".content-container");

    // Hide all elements in each container
    containers.forEach((container) => {
        let elements = container.children;
        [...elements].forEach((node) => (node.style.display = "none"));

        // Filter elements based on dataset matching search input
        let result = [...elements].filter((e) => {
            let match = false;
            for (let d in e.dataset) {
                if (e.dataset[d].toUpperCase().indexOf(filter) > -1) {
                    match = true;
                }
            }
            return match;
        });

        // Show the matching elements
        result.forEach((node) => (node.style.display = "block"));
    });
}

/**
 * Sorts the content of the admin panel in alphabetic or numeric order from a chosen property.
 *
 * @param {string} option
 * @param {HTMLElement} active_tab
 * @param {boolean} [order=true]
 */
function sort(option, active_tab, order = true) {
    //TODO: add option to change sorting order (asc/desc)
    [...active_tab.children]
        .sort((a, b) => (a.dataset[option] > b.dataset[option] ? 1 : -1))
        .forEach((node) => active_tab.appendChild(node));
}

/**
 * Changes the display of the admin panel content between grid and list view.
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
