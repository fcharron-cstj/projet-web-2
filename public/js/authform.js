let btn_register = document.querySelector("#no-account");

btn_register.addEventListener("click", (e) => {
    e.preventDefault;
    document.querySelector(".login").style.display = "none";
    document.querySelector(".register").style.display = "flex";
});

let btn_login = document.querySelector("#has-account");
btn_login.addEventListener("click", (e) => {
    e.preventDefault;
    document.querySelector(".register").style.display = "none";
    document.querySelector(".login").style.display = "flex";
});
