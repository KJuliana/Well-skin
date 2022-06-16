var burger = document.getElementById('burger');
var nav = document.getElementById('nav');

burger.addEventListener("click", ()=>{
    burger.classList.toggle('active');
    nav.classList.toggle('active');
});