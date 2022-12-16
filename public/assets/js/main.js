window.addEventListener("scroll", () => {
    document.querySelector("nav").classList.toggle("window-scroll", window.scrollY > 100);
})

const nav = document.querySelector('.navbrand');
nav.addEventListener('click', () => {
    window.location.href = `http://localhost:3000/public/home`
})