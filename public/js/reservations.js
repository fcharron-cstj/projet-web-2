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

    document.querySelector(".total-price").innerHTML = totalprice + " $";

    // Update the ticket count displayed between the + and - buttons
    document.querySelector(`.ticket-count[data-option="${option[1] + 1}"]`).innerHTML = totaltickets[option[1]];
}
