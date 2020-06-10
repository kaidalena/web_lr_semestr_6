function submenu(parNode) {
    var list = parNode.getElementsByTagName("ul");
    if (list[0].style.display == "none") {
        list[0].style.display = "block";
    } else {
        list[0].style.display = "none";
    }
}