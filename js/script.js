// When the user scrolls the page, execute myFunction
window.onscroll = function () {
    myFunction()
};

// Get the navbar
var navbar = document.getElementById("navbar");

// Get the offset position of the navbar
var sticky = navbar.offsetTop;

// Add the sticky class to the navbar when you reach its scroll position. Remove "sticky" when you leave the scroll position
function myFunction() {
    if (window.scrollY >= sticky) {
        navbar.classList.add("fixed-top");
        document.getElementById("logo").style.height = "50px";
    } else {
        navbar.classList.remove("fixed-top");
        document.getElementById("logo").style.height = "100px";
    }
}