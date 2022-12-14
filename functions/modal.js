var modal = document.getElementsByClassName('modal')[0];
var modal1 = document.getElementsByClassName('modal')[1];

var btn = document.getElementsByClassName("myBtn")[0];
var btn1 = document.getElementsByClassName("myBtn")[1];


var span = document.getElementsByClassName("close")[0];
var span1 = document.getElementsByClassName("close")[1];


btn.onclick = function() {
    modal.style.display = "block";
}
btn1.onclick = function() {
    modal1.style.display = "block";
}


span.onclick = function() {
    modal.style.display = "none";
}
span1.onclick = function() {
    modal1.style.display = "none";
}


window.onclick = function(event) {
    if (event.target == modal || event.target == modal1) {
        modal.style.display = "none";
        modal1.style.display = "none";
    }
}


