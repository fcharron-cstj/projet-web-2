let date = new Date("4-4-2025")
let today = new Date()
let diff = Math.abs(date - today)

// separate timer into days, hours, minutes, seconds

function calcTimer() {
    let today = new Date()
    let diff = Math.abs(date - today)
    let diffDays = ("0" + Math.floor(diff / (1000 * 60 * 60 * 24))).slice(-3)
    let diffHours = (
        "0" + Math.floor((diff % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60))
    ).slice(-2)
    let diffMinutes = (
        "0" + Math.floor((diff % (1000 * 60 * 60)) / (1000 * 60))
    ).slice(-2)
    let diffSeconds = ("0" + Math.floor((diff % (1000 * 60)) / 1000)).slice(-2)
    return "" + diffDays + diffHours + diffMinutes + diffSeconds
}
let digits = calcTimer().split("")
let tracks = document.querySelectorAll(".num-track")

for (let i = 0; i < digits.length; i++) {
    tracks[i].style.transitionDuration = "0s"
    tracks[i].style.translate = `0 ${-(digits[i] * 64 + 18 * digits[i])}px`
}

setInterval(() => {
    digits = calcTimer().split("")

    for (let i = 0; i < digits.length; i++) {
        tracks[i].style.transitionDuration = "1500ms"
        tracks[i].style.translate = `0 ${-(digits[i] * 64 + 18 * digits[i])}px`
    }
}, 1000)
