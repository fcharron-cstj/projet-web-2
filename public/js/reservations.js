//Reservations
let totalprice = 0;
let totaltickets = { 0: 0, 1: 0, 2: 0 };
document.querySelectorAll(".ticket-add").forEach(function (add) {
    add.addEventListener("click", function (event) {
        event.preventDefault();
        let click = event.target.parentNode.classList;
        if (click.contains("1")) {
            updateCart("General entry", 0, 25);
        }
        if (click.contains("2")) {
            updateCart("Da Vinci", 1, 40);
        }
        if (click.contains("3")) {
            updateCart("VIP", 2, 190);
        }
    });
});

function updateCart(option, id, price) {
    totalprice += price;
    totaltickets[id] += 1;
    document.querySelector(".tickets-total").children[id].innerHTML =
        option + " " + totaltickets[id] + "x, ";
    document.querySelector(".total-price").innerHTML = totalprice + "$";

    document.querySelector("#bought-tickets-1").value = totaltickets[0];
    document.querySelector("#bought-tickets-2").value = totaltickets[1];
    document.querySelector("#bought-tickets-3").value = totaltickets[2];
}
