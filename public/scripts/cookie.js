function setCookie(name) {
    var date = new Date(new Date().getTime() + 1800 * 1000);
    var expires = "; expires="+date.toUTCString();
    var value = getValue(name);
    if (value == ""){
        document.cookie = name+"=1"+expires+"; path=/";
    } else {
        value++;
        document.cookie = name+"="+value+expires+"; path=/";
    }
}

function getCookie( name) {
    var ca = document.cookie.split("; ");
    var c;
    for (var i = 0; i<ca.length; i++) {
        c = ca[i].split("=");
        if (c[0] == name){
            document.write(c[1]);
        }
    }
}

function getValue(name) {
    var ca = document.cookie.split("; ");
    var c;
    for (var i = 0; i<ca.length; i++) {
        c = ca[i].split("=");
        if (c[0] == name){
            return c[1];
        }
    }
    return "";
}

//--------local storage-------

function setLS(name) {
    var value = sessionStorage.getItem(name);
    if (value == null) {
        sessionStorage.setItem(name, 1);
    } else {
        value++;
        sessionStorage.setItem(name, value);
    }
}

function getLS(name) {
    var col = sessionStorage.getItem(name);
    if (col == null) col = 0;
    document.write(col);
}

function setLL(name) {
    var value = localStorage.getItem(name);
    if (value == null) {
        localStorage.setItem(name, 1);
    } else {
        value++;
        localStorage.setItem(name, value);
    }
}

function getLL(name) {
    var col = localStorage.getItem(name);
    if (col == null) col = 0;
    document.write(col);
}