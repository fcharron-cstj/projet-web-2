const burgerMenu = document.getElementById('burger-menu')
const mobileMenu = document.getElementById('mobile-menu')
const closeMenu = document.getElementById('close-menu')

burgerMenu.addEventListener('click', () => {
    mobileMenu.classList.toggle('active')
    burgerMenu.style.display = mobileMenu.classList.contains('active') ? 'none' : 'block'
})

closeMenu.addEventListener('click', () => {
    mobileMenu.classList.remove('active')
    burgerMenu.style.display = 'block'
})