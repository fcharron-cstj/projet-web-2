const letters = "ABCDEFGHIJKLMNOPQRSTUVWXYZ"

let interval = null

function doSomething() {
    let event = document.querySelector("h1")

    let iteration = 5

    clearInterval(interval)

    interval = setInterval(() => {
        event.innerText = event.innerText
            .split("")
            .map((letter, index) => {
                if (index < iteration) {
                    return event.dataset.value[index]
                }

                return letters[Math.floor(Math.random() * 26)]
            })
            .join("")

        if (iteration >= event.dataset.value.length) {
            clearInterval(interval)
        }

        iteration += 1 / 3;
    }, 15);
}

(function loop() {
    var rand = Math.round(Math.random() * (3000 - 1000)) + 500
    setTimeout(function () {
        doSomething()
        loop()
    }, rand)
}())


