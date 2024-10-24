// Initialize total price, extra price, and ticket counts
let totalprice = 0
let extraprice = 0
let totaltickets = [0, 0, 0]

// Define ticket options with name, index, and price
let options = {
    1: ["General entry", 0, 25],
    2: ["Da Vinci", 1, 40],
    3: ["VIP", 2, 190],
}

// Wait for the DOM to load before executing
addEventListener("DOMContentLoaded", (event) => {
    // Add click event to each day element that is not disabled
    document.querySelectorAll(".day").forEach(function (element) {
        if (!element.classList.contains("disabled")) {
            element.addEventListener("click", function () {
                // Delay to allow date inputs to be populated
                setTimeout(function () {
                    // Get arrival and leave dates
                    let arrival = document.querySelector(".arrival").value;
                    let leave = document.querySelector(".leave").value;
                    const date1 = new Date(arrival)
                    const date2 = new Date(leave)

                    // Calculate difference in days
                    const diffTime = Math.abs(date2 - date1)
                    const diffDays = Math.floor(
                        diffTime / (1000 * 60 * 60 * 24)
                    )

                    // Update extra price based on additional days
                    extraprice = 20 * diffDays;

                    // Update the total and extra price displays
                    document.querySelector(".total-price").innerHTML =
                        totalprice + extraprice + " $";

                    document.querySelector(".extra-price").innerHTML =
                        "days extra : " +
                        extraprice *
                            (totaltickets[0] +
                                totaltickets[1] +
                                totaltickets[2]) +
                        " $"
                }, 100)
            })
        }
    })
})

// Add click event for each ticket add/remove button
document.querySelectorAll(".ticket-add").forEach(function (add) {
    add.addEventListener("click", function (event) {
        event.preventDefault()

        // Get the option ID and button text (+ or -)
        let optionId = parseInt(event.target.getAttribute("data-option"))
        let btn = event.target.innerHTML

        // Update the cart based on the button clicked
        if (btn === "+") {
            updateCart(options[optionId], optionId)
        } else if (btn === "-") {
            updateCart(options[optionId], optionId, false)
        }
    })
})

// Add click event to each day element to handle arrival and leave dates
document.querySelectorAll(".day").forEach(function (element) {
    element.addEventListener("click", function () {
        let arrival = document.querySelector(".arrival").value
        let leave = document.querySelector(".leave").value
    })
})

//Updates the ticket cart based on the option selected.
function updateCart(option, id, add = true) {
    // Check if there are tickets to remove
    if (totaltickets[option[1]] === 0 && !add) {
        return
    }

    // Update total price and ticket counts
    add ? (totalprice += option[2]) : (totalprice -= option[2])
    add ? totaltickets[option[1]]++ : totaltickets[option[1]]--

    // Update base price display
    document.querySelector(".base-price").innerHTML =
        "Tickets cost : " + totalprice + " $"

    // Update extra price display
    document.querySelector(".extra-price").innerHTML =
        "Extra days : " +
        extraprice * (totaltickets[0] + totaltickets[1] + totaltickets[2]) +
        " $"

    // Update total price display
    document.querySelector(".total-price").innerHTML =
        totalprice +
        extraprice * (totaltickets[0] + totaltickets[1] + totaltickets[2]) +
        " $"

    // Update ticket input value
    document.querySelector("#bought-tickets-" + id).value =
        totaltickets[option[1]]

    // Update the ticket count displayed between the + and - buttons
    document.querySelector(
        `.ticket-count[data-option="${option[1] + 1}"]`
    ).innerHTML = totaltickets[option[1]]

    // Show/hide ticket form based on ticket count
    let form = document.querySelector("#form-tickets")
    totaltickets[0] == 0 && totaltickets[1] == 0 && totaltickets[2] == 0
        ? (form.style.display = "none")
        : (form.style.display = "block")

    // Show/hide total ticket count display based on ticket count
    let total = document.querySelector("#ticket-total")
    totaltickets[0] == 0 && totaltickets[1] == 0 && totaltickets[2] == 0
        ? (total.style.display = "none")
        : (total.style.display = "flex")
}
