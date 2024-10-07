let totalprice = 0;
let extraprice = 0;
let totaltickets = [0, 0, 0];
let options = {
    1: ["General entry", 0, 25],
    2: ["Da Vinci", 1, 40],
    3: ["VIP", 2, 190],
};
addEventListener("DOMContentLoaded", (event) => {
    document.querySelectorAll(".day").forEach(function (element) {
        if (!element.classList.contains("disabled")) {
            element.addEventListener("click", function () {
                setTimeout(function () {
                    let arrival = document.querySelector(".arrival").value;
                    let leave = document.querySelector(".leave").value;
                    const date1 = new Date(arrival);
                    const date2 = new Date(leave);
                    const diffTime = Math.abs(date2 - date1);
                    const diffDays = Math.floor(
                        diffTime / (1000 * 60 * 60 * 24)
                    );

                    extraprice = 20 * diffDays;
                    document.querySelector(".total-price").innerHTML =
                        totalprice + extraprice + " $";

                    document.querySelector(".extra-price").innerHTML =
                        "days extra : " +
                        extraprice *
                            (totaltickets[0] +
                                totaltickets[1] +
                                totaltickets[2]) +
                        " $";
                    document;
                }, 100);
            });
        }
    });
});

document.querySelectorAll(".ticket-add").forEach(function (add) {
    add.addEventListener("click", function (event) {
        event.preventDefault();

        let optionId = parseInt(event.target.getAttribute("data-option"));
        let btn = event.target.innerHTML;

        if (btn === "+") {
            updateCart(options[optionId], optionId);
        } else if (btn === "-") {
            updateCart(options[optionId], optionId, false);
        }
    });
});

console.document.querySelectorAll(".day").forEach(function (element) {
    element.addEventListener("click", function () {
        let arrival = document.querySelector(".arrival").value;
        let leave = document.querySelector(".leave").value;
    });
});

function updateCart(option, id, add = true) {
    if (totaltickets[option[1]] === 0 && !add) {
        return;
    }

    add ? (totalprice += option[2]) : (totalprice -= option[2]);
    add ? totaltickets[option[1]]++ : totaltickets[option[1]]--;

    document.querySelector(".base-price").innerHTML =
        "Tickets cost : " + totalprice + " $";

    document.querySelector(".extra-price").innerHTML =
        "days extra : " +
        extraprice * (totaltickets[0] + totaltickets[1] + totaltickets[2]) +
        " $";
    document;

    document.querySelector(".total-price").innerHTML =
        totalprice +
        extraprice * (totaltickets[0] + totaltickets[1] + totaltickets[2]) +
        " $";

    document.querySelector("#bought-tickets-" + id).value =
        totaltickets[option[1]];

    // Update the ticket count displayed between the + and - buttons
    document.querySelector(
        `.ticket-count[data-option="${option[1] + 1}"]`
    ).innerHTML = totaltickets[option[1]];

    let a = document.querySelector("#form-tickets");
    totaltickets[0] == 0 && totaltickets[1] == 0 && totaltickets[2] == 0
        ? (a.style.display = "none")
        : (a.style.display = "block");
}
