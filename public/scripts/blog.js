var id_blog;

function newComment(elem){
    $('#modalWindow').fadeIn();
    $('#modalWindow').css("display", "flex");
    id_blog = elem.querySelector('#id_blog').value;
}

function commentExit(){
    $('#modalWindow').fadeOut();
}

function responsAddComment(){
    var dv_Respons = document.getElementById('respons');
    if (status == 1){
        dv_Respons.className = "saveOK";
        document.getElementById('text').value = "";
    }else{
        dv_Respons.className = "saveNO";
    }
    dv_Respons.innerHTML = respons;
}

function create_script() {
    var elScript = document.createElement( 'script' );
    var text = document.getElementById('text');
    elScript.src='/addComment?comment=' + text.value + "&blog=" + id_blog;
    document.getElementsByTagName("body")[0].appendChild( elScript );
}