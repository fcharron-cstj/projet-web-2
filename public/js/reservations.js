//Reservations
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
        let click = event.target.parentNode.classList;

        for (let i = 0; i < 3; i++) {
            if (click.contains(i + 1)) {
                let btn = event.target.innerHTML;
                btn == "+" ? updateCart(options[i + 1]) : 0;
                btn == "-" ? updateCart(options[i + 1], false) : 0;
            }
        }
    });
});
function updateCart(option, add = true) {
    if (totaltickets[option[1]] == 0 && add == false) {
        return 0;
    }
    add ? (totalprice += option[2]) : (totalprice -= option[2]);
    add ? (totaltickets[option[1]] += 1) : (totaltickets[option[1]] -= 1);
    document.querySelector(".tickets-total").children[option[1]].innerHTML =
        option[0] + " " + totaltickets[option[1]] + "x, ";
    document.querySelector(".total-price").innerHTML = totalprice + " $";
    document.querySelector("#bought-tickets-1").value = totaltickets[0];
    document.querySelector("#bought-tickets-2").value = totaltickets[1];
    document.querySelector("#bought-tickets-3").value = totaltickets[2];
}

function scrollToElement(element) {
    element.scrollIntoView({ behavior: "smooth", block: "start" });
}

document.querySelector("#buy-tickets").addEventListener(
    "click",
    (e) => {
        e.preventDefault();
        console.log(e);
        scrollToElement(document.querySelector(e.target.getAttribute("href")));
    },
    true
);
