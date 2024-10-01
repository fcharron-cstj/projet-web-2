let totalprice = 0;
let totaltickets = [0, 0, 0];
let options = {
    1: ["General entry", 0, 25],
    2: ["Da Vinci", 1, 40],
    3: ["VIP", 2, 190],
};

document.querySelectorAll(".ticket-add").forEach(function (add) {
    add.addEventListener("click", function (event) {
        event.preventDefault();
        let optionId = parseInt(event.target.getAttribute("data-option"));
        let btn = event.target.innerHTML;
        
        if (btn === "+") {
            updateCart(options[optionId]);
        } else if (btn === "-") {
            updateCart(options[optionId], false);
        }
    });
});

function updateCart(option, add = true) {
    if (totaltickets[option[1]] === 0 && !add) {
        return;
    }
    
    add ? totalprice += option[2] : totalprice -= option[2];
    add ? totaltickets[option[1]]++ : totaltickets[option[1]]--;

    document.querySelector(".tickets-total").children[option[1]].innerHTML =
        option[0] + " " + totaltickets[option[1]] + "x, ";
    document.querySelector(".total-price").innerHTML = totalprice + " $";
}

function scrollToElement(element) {
    element.scrollIntoView({ behavior: "smooth", block: "start" });
}

document.querySelector("#buy-tickets").addEventListener(
    "click",
    (e) => {
        e.preventDefault();
        scrollToElement(document.querySelector(e.target.getAttribute("href")));
    },
    true
);
