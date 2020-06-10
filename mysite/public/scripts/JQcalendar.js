$(document).ready(function() {

  var pole;

  $("#birthDate").focus(function(){show()});

  function show(p){  
    console.log("show");
    pole = $("#birthDate");
    console.log(pole.attr('class'));
    if (pole.attr('class') == "notFocus"){
      pole.attr({class: "inFocus"});
      var d = new Date;
      var monthA = ["Январь", "Февраль", "Март", "Апрель", "Май", "Июнь", "Июль", "Август", "Сентябрь", "Октябрь", "Ноябрь", "Декабрь"];
      // var datapicker = $('<div>', {
      //     id: "dataDiv",
      //     class: "data",
      //     style: 'display: "table"'}).appendTo($('#calendar'));
      //     console.log($('#dataDiv'));
          console.log($('#calendar'));
          $('#calendar').append($('<div>'));
          console.log($('#dataDiv'));

      var month = $('<select>', {
          id: 'month',
          onchange: setMonth});
          // console.log($('#calendar'));
          // console.log(datapicker[0]);

      for (var i = 0; i < 12; i++){
          var option = $('<option>', {
            text: monthA[i],
            value: i}).appendTo(month);
      }
      var year = $('<select>', {
        id: 'year',
        onchange: setMonth});
      temp = d.getFullYear() - 1970;
      for (var i = 0; i <= temp; i++){
          var option = $('<option>',{
            text: +(i+1970),
            value: i+1970}).appendTo(year);
      }
      var days = $('<table>', {
        id: "days",
        className: "data"});
      createCalendar(days, 1970, 0);
      var cancelBtn = $('<input>', {
        type: "button",
        value: "Закрыть",
        onclick: hide});

        $('#calendar').append($('#dataDiv'));
        $('#dataDiv').append($('#month'));
        $('#dataDiv').append($('#year'));
        $('#dataDiv').append($('#days'));
      // datapicker.append(month);
      // datapicker.append(year);
      // datapicker.append(days);
      // datapicker.append(cancelBtn);
    }
  }

  function setMonth(){
      createCalendar($("#days"), $("#year").val(),  $("#month").val())
  }

  function createCalendar(elem, year, month) {
        var mon = month;
        var d = new Date(year, mon);

        var table = "<tr><td> Пн </td class ='first'><td> Вт </td><td> Ср </td><td> Чт </td><td> Пт </td><td> Сб </td><td> Вс </td></tr><tr>";

        
        for (var i = 0; i < getDay(d); i++) {         //прописываем пустые клетки перед началом дат в месяце
          table += "<td></td>";
        }

        while (d.getMonth() == mon) {     //заполняем днями
          table += "<td class='numb' onclick=getDate(this) >" + d.getDate() + "</td>";

          if (getDay(d) % 7 == 6) {     //переход на новую неделю
            table += "</tr><tr>";
          }

          d.setDate(d.getDate() + 1);   //следующий день
        }

        if (getDay(d) != 0) {           //прописываем пустые клетки в конце месяца
          for (var i = getDay(d); i < 7; i++) {
            table += "<td></td>";
          }
        }

        table += "</tr>";

        elem.innerHTML = table;
  }

  function getDay(date) {     //проиндексируем дни недели по русски
      var day = date.getDay();
      if (day == 0) day = 7;
      return day - 1;
  }

  function getDate(tbElem){
      tbElem.className = "selectDay";
      var day = tbElem.innerHTML;
      if (day < 10) day = "0" + day;
      var year = document.getElementById("year").value;
      var month = document.getElementById("month").value - 0 ;
      month += 1;
      if (month < 10) month = "0" + month;
      var birth =   month+ "/" + day + "/" + year;
      document.getElementById("birthDate").value = birth;
      changeTD(tbElem, "selectDay");
  }

  function hide(){
      pole.className = "notFocus";
      var elem = document.getElementById("dataDiv");
      document.getElementById("calendar").removeChild(elem);
  }

  function writeDate(){
    var date = document.getElementById("birthDate").value;
    var arr = date.split("/");
    if (arr.length == 3){
      createCalendar(document.getElementById("days"), arr[2], (arr[0]-1));
      document.getElementById("month").options[arr[0]-1].selected = true;
      document.getElementById("year").options[arr[2]-1970].selected = true;
    }
  }

  function changeTD(td, name){
    var arr = document.getElementsByTagName('td');
    for (var i=0; i<arr.length; i++){
            arr[i].className = "numb";
            if (arr[i] === td) arr[i].className = name;
    }
    td.className = name;
  }

})