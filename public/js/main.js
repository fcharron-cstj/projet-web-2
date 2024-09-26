const burgerMenu = document.getElementById('burger-menu')
const mobileMenu = document.getElementById('mobile-menu')

burgerMenu.addEventListener('click', () => {
    mobileMenu.classList.toggle('active')
})