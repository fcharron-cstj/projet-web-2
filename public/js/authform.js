// Select the 'No account' button for switching to the registration form
let btn_register = document.querySelector("#no-account");

// Event listener to switch from login to registration form on click
btn_register.addEventListener("click", (e) => {
    e.preventDefault(); // Prevent default link behavior
    document.querySelector(".login").style.display = "none"; // Hide login form
    document.querySelector(".register").style.display = "flex"; // Show registration form
});

// Select the 'Has account' button for switching to the login form
let btn_login = document.querySelector("#has-account");

// Event listener to switch from registration to login form on click
btn_login.addEventListener("click", (e) => {
    e.preventDefault(); // Prevent default link behavior
    document.querySelector(".register").style.display = "none"; // Hide registration form
    document.querySelector(".login").style.display = "flex"; // Show login form
});
