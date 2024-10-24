// Select the 'No account' button for switching to the registration form
let btn_register = document.querySelector("#no-account")

// Event listener to switch from login to registration form on click
btn_register.addEventListener("click", (e) => {
    e.preventDefault()
    document.querySelector(".login").style.display = "none"
    document.querySelector(".register").style.display = "flex"
})

// Select the 'Has account' button for switching to the login form
let btn_login = document.querySelector("#has-account")

// Event listener to switch from registration to login form on click
btn_login.addEventListener("click", (e) => {
    e.preventDefault()
    document.querySelector(".register").style.display = "none"
    document.querySelector(".login").style.display = "flex"
})
