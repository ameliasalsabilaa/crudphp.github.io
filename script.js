// navbar
var nav = document.querySelector("nav");

window.addEventListener("scroll", function () {
  if (window.scrollY > 700) {
    nav.classList.add("bg-dark", "shadow");
  } else {
    navbar.classList.remove("bg-dark", "shadow");
  }
});
