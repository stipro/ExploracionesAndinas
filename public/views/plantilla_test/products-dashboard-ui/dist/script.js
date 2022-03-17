document.addEventListener('DOMContentLoaded', e => {
    //* Modo dark
    if (modeSwitch.checked) {
        // console.log("Hemos pulsado en on");
        modeNavBar.classList.toggle('navbar-dark');
        document.documentElement.classList.toggle('light');
    }
    //* Modo light
    else {
        // console.log("Hemos pulsado en off");
        modeNavBar.classList.toggle('navbar-light');
        modeNavBar.classList.toggle('bg-light');
    }
});
document.querySelector(".jsFilter").addEventListener("click", function() {
    document.querySelector(".filter-menu").classList.toggle("active");
});

document.querySelector(".grid").addEventListener("click", function() {
    document.querySelector(".list").classList.remove("active");
    document.querySelector(".grid").classList.add("active");
    document.querySelector(".products-area-wrapper").classList.add("gridView");
    document
        .querySelector(".products-area-wrapper")
        .classList.remove("tableView");
});

document.querySelector(".list").addEventListener("click", function() {
    document.querySelector(".list").classList.add("active");
    document.querySelector(".grid").classList.remove("active");
    document.querySelector(".products-area-wrapper").classList.remove("gridView");
    document.querySelector(".products-area-wrapper").classList.add("tableView");
});

var modeSwitch = document.querySelector('#switch-mode');
var modeNavBar = document.querySelector('.navbar');
/**
 * Activa el modo Light/Dark
 * * Activa el modo Light/Dark
 */
modeSwitch.addEventListener('click', function(e) {
    //* Activa modo
    if (modeSwitch.checked) {
        document.documentElement.classList.toggle('light');
        modeNavBar.classList.toggle('navbar-light');
        modeNavBar.classList.toggle('bg-light');
        modeNavBar.classList.toggle('navbar-dark');
    } else {
        modeNavBar.classList.toggle('navbar-dark');
        modeNavBar.classList.toggle('navbar-light');
        modeNavBar.classList.toggle('bg-light');
        document.documentElement.classList.toggle('light');
    }
    modeSwitch.classList.toggle('active');

});
/* var modeSwitch = document.querySelector('#switch-mode');
selectCCostos.addEventListener('change', function() {

}); */

var list = document.querySelector(".sidebar-list");

function Alert() {
    console.log(this);
    this.classList.toggle('active')
}
console.log(list);
for (i = 0; i <= list.childElementCount - 1; i++) {
    list.children[i].addEventListener("click", Alert);
}