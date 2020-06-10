var path = "public/assets/img/";
fotos = new Array(
    path+"1.jpg",   path+"2.jpg",   path+"3.jpg",
    path+"4.jpg",   path+"5.jpg",   path+"6.jpg",
    path+"7.jpg",   path+"8.jpg",   path+"9.jpg",
    path+"10.jpg",   path+"11.jpg",   path+"12.jpg",
    path+"13.jpg",   path+"14.jpg",   path+"15.jpg"
);
titles = new Array("Кролик","Лисенок","Еноты","Совенок","Одуванчик","Белка","Птицы",
    "Лиса","Кошка","Енот","Сова","Собака","Панда","Такса","Айсберг");

    // function fotoTable (n, m){       //i-номер элемента, с которого начнется отображение; n-количество элементов для отображения 
    //     i=0;
    //     for (j=0; j<n; j++){
    //         document.write("<tr>");
    //         for (k=0; k<m; k++, i++)
    //             document.write("<td> <img id=\"" + i + "\" class=\"inTable\" src=" + fotos[i] + " alt=" + titles[i] + " title=" + titles[i] + " onClick=\"bigFotoDiv(this)\"><figcaption>" + titles[i] + "</figcaption> </td>");
    //         document.write("</tr>");
    //     }
    // }

    function maxImg(obj) {
        console.log("max");
            var newDiv = $('<div>').attr({
                id: "fotoDiv",
                class: "fotoMax"
            })
            newDiv.css('display', 'block');
            var picture = $("<img>").attr({
                id: 'image',
                src: obj.src,
                title: obj.title,
                alt: obj.alt
            })
            var closingDiv = $('<div>').attr({
                class: "closingDiv",
            }).css('margin-left', '85%');
                
            closingDiv.click(function(){close()});

            function close(){
                picture.remove();
                closingDiv.remove();
                newDiv.remove();
            }

            var width = screen.width, height=screen.height;
            picture = proportionsPicture(picture);

            var nextDiv = $('<div>').attr({
                id: "next",
                class: "nextDiv"
            }).css('margin-left', '88%').append('>');
            var backDiv = $('<div>').attr({
                id: "back",
                class: "backDiv"
            }).css('margin-left', '10%').append('<');

            newDiv.append(picture);
            newDiv.append(closingDiv);
            newDiv.append(nextDiv);
            newDiv.append(backDiv);
            newDiv.appendTo($('body')); 
    }

    function proportionsPicture(picture){
        picture.load(function(){
        var mainHeight = screen.height, mainWidth = screen.width, height=picture.height()-0, width=picture.width()-0;
        var proportion = 
            (width*100/mainWidth < height*100/mainHeight) ? 
            height*100/mainHeight : width*100/mainWidth;       //коэффициент размера относительно окна
        proportion -= 1;
        picture.css('width', (width*70)/proportion);      // уменьшаем изображение до 70% от размера экрана
        picture.css('height', (height*70)/proportion);
        });
        return picture;
    }

    function bigFotoDiv(obj){
        console.log("big");
        var path = "public/assets/img/";
        var index;
        $(document).ready(function() {
                maxImg(obj),
                index = obj.id;
            $('#back').click(function(){
                if(index == 0)
                    index = 14;
                else{
                    index--;
                }
                $('#image').attr({
                    src: path+(index+1)+'.jpg',
                    alt: titles[index],
                    title: titles[index]});
            })
            $('#next').click(function(){
                if(index == 14)
                    index = 0;
                else{
                    index++;
                }
                $('#image').attr({
                    src: path+(index+1)+'.jpg',
                    alt: titles[index],
                    title: titles[index]});
            })
        })
    }