var id_blog;

function newComment(elem){
    $('#modalWindow').fadeIn();
    $('#modalWindow').css("display", "flex");
    id_blog = elem;
}

function commentExit(){
    $('#modalWindow').fadeOut();
}

function responsAddComment(){
    data;
    var dv_Respons = document.getElementById('respons');
    if (status == 1){
        dv_Respons.className = "saveOK";
        document.getElementById('text').value = "";

        var div = document.createElement('div');
        var h4 = document.createElement('h4');
        var h5 = document.createElement('h5');
        var p = document.createElement('p');
        div.className = "comment";
        h4.innerHTML = data[2];
        h5.innerHTML = data[4];
        p.innerHTML = data[3];div.append(h4, h5, p);
        var td = $("[value=" + id_blog + "]").parent().parent().parent().next().children()[1];
        if (td.childElementCount == 0){
            var title = document.createElement('p');
            title.innerHTML = "Комментарии";
            td.append(title);   
        }
        td.append(div);
    }else{
        dv_Respons.className = "saveNO";
    }
    dv_Respons.innerHTML = respons;
}

function create_script() {
    var elScript = document.createElement( 'script' );
    var text = document.getElementById('text');
    elScript.src='/comment/create?comment=' + text.value + "&blog=" + id_blog;
    document.getElementsByTagName("body")[0].appendChild( elScript );
}

function editRecord(elem){
    newComment(elem);
    
    $("#topic")[0].value = $("[value=" + elem + "]").parent().find("h3")[0].innerHTML;
    $("#text")[0].value = $("[value=" + elem + "]").parent().find("p")[0].innerHTML;
}

async function saveFetch(){
    var data = {
        id: id_blog,
        topic: $("#topic")[0].value,
        message: $("#text")[0].value
    };
    var jsonString = JSON.stringify(data);

    let res = await fetch("/blog/edit", {
        method: 'post',
        headers: {"Content-type": "text/json"},
        body: jsonString
    }).then(response => response.text())
      .then(body => {
          var respons;
          var status;
          var data = JSON.parse(body),
            status = data.status;
          var dv_Respons = document.getElementById('respons');
            if (status == 1){
                dv_Respons.className = "saveOK";
                respons = "Запись была сохранена";

                $("[value=" + id_blog + "]").parent().find("h3")[0].innerHTML = $("#topic")[0].value;
                $("[value=" + id_blog + "]").parent().find("p")[0].innerHTML = $("#text")[0].value;
            }else{
                dv_Respons.className = "saveNO";
                respons = "Ошибка сохранения записи";
            }
            dv_Respons.innerHTML = respons;
      })
}