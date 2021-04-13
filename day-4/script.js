let burgerMenu = document.getElementById("burger");
let nav = document.querySelector(".links");

burgerMenu.addEventListener("click", () => {
  event.preventDefault();
  nav.classList.toggle("active");
});

/*window.onscroll = function () {
  scrollFunction();
};

 function scrollFunction() {
  if (document.body.scrollTop > 50 || document.documentElement.scrollTop > 50) {
    document.getElementsByClassName("links").style.fontSize = "16px";
  } else {
    document.getElementsByClassName("links").style.fontSize = "24px";
  }
} */
