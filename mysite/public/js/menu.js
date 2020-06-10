function printMenu(){
    document.write("<input type=\"checkbox\" id=\"nav-toggle\" hidden>");
    document.write("<nav class=\"nav\">");
    document.write("<label for=\"nav-toggle\" class=\"nav-toggle\" onclick></label>");
    document.write("<h2 class=\"logo\">"); 
    document.write("<a>Little_coon_</a>"); 
    document.write("</h2>");
    document.write("<ul><li><a href=\"indexHaml.html\">Главная</a>");
    document.write("<li><a href=\"aboutHaml.html\">Обо мне</a>");

    document.write("<li onclick=\"submenu(this)\"><a href=\"#\">Мои интересы</a>");
    document.write("<ul id=\"submenu\" style =\"display: none\"><li><a href=\"myInterest.html#book\">Любимая книга</a></li> ");
    document.write("<li><a href=\"myInterest.html#film\">Любимый фильм</a></li>");
    document.write("<li><a href=\"myInterest.html#sport\">Любимый вид спорта</a></li></ul>");

    document.write("<li><a href=\"studyHaml.html\">Учеба</a>");
    document.write("<li><a href=\"fotosHaml.html\">Фотоальбом</a>");
    document.write("<li><a href=\"test.html\">Тест</a>");
    document.write("<li><a href=\"contactsHaml.html\">Контакты</a>");
    document.write("<li><a href=\"history.html\">История посещений</a></ul>");
    
    document.write("<footer id=\"clock\" class=\"clock\">");
    document.write("<br/><br/><script src=\"script/clock.js\"></script></footer>");

    document.write("</nav>");
}