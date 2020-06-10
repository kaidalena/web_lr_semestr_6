function validate(elem){
    
    if ( elem.value === ""){
        elem.className = "no";
    }  
}

function checkSubmit(){
    var elem = Array(document.getElementById("FIO").className,
                    document.getElementById("mail").className,
                    document.getElementById("mobile").className,
                    // document.getElementById("data").className,
                    document.getElementById("message").className);
    var sub = document.getElementById('submit');
    sub.disabled = false; 
    sub.style.backgroundColor = "#16a085"
    for (i=0; i<5; i++){
        if (elem[i] != "yes") {
            console.log(i);
            sub.disabled = true;
            sub.style.backgroundColor = "#939394";
            break;
        }
    }
}
    
    