let left_arrow = document.querySelector("#left-arrow")
let right_arrow = document.querySelector("#right-arrow")
let days = document.querySelectorAll(".day-information")
let day_id = 1

window.addEventListener("resize", () => {
    if (window.outerWidth >= 768) {

        days.forEach((day) => {
            day.style.display = "flex"

        })
    }
    else{
        days.forEach((day) => {
            day.style.display = "none"
        })
        days[day_id - 1].style.display = "flex"
    }
})

left_arrow.addEventListener("click", () => showDay(--day_id))
right_arrow.addEventListener("click", () => showDay(++day_id))

function showDay(dayIndex) {
    if (dayIndex > days.length) {
        day_id = 1
    }

    if (dayIndex < 1) {
        day_id = days.length
    }

    for (i = 0; i < days.length; i++) {
        days[i].style.display = "none"
    }

    days[day_id - 1].style.display = "flex"
}
