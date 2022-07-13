let x , y , k ;
x = document.querySelector(".angle-1");
k = document.querySelector(".angle-01");
x.onclick = function() {
    y = document.querySelector(".fltrs");
    y.classList.toggle("flt")
    x.classList.toggle("angle-2")
}
k.onclick = function() {
    y = document.querySelector(".all-fltrs");
    y.classList.toggle("hide-fltrs")
    k.classList.toggle("angle-02")
    document.querySelector(".side").classList.toggle("border-bottom")
}




