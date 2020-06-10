'use strict';

var options1 = {
    day: "2-digit",
    month: "2-digit",
    year: "2-digit"
}

var options2 = {
    weekday: "long",
    hour: "2-digit",
    minute: "2-digit",
    second: "2-digit"
}

function clock() {
    var date = new Date();
    document.getElementById("clock").innerHTML = date.toLocaleString("ru-Ru", options1) +" " + date.toLocaleString("ru-Ru", options2);
    // document.getElementById("clock").innerHTML = date.toLocaleString("ru-Ru", options2);
    setTimeout("clock()", 1000);
}

clock();