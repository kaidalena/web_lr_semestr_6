var pole;
function show(p){
  pole = p;
  console.log(pole.className);
  if (pole.className == "notFocus"){
    pole.className = "inFocus";
    var d = new Date;
    var monthA = ["Январь", "Февраль", "Март", "Апрель", "Май", "Июнь", "Июль", "Август", "Сентябрь", "Октябрь", "Ноябрь", "Декабрь"];
    var datapicker = document.createElement('div');
    datapicker.id = "dataDiv"
    datapicker.className = "data"
    datapicker.style.display = "table";
    var month = document.createElement('select');
    month.id = "month";
    month.onchange = setMonth;
    for (var i = 0; i < 12; i++){
        var option = document.createElement('option');
        option.text = monthA[i];
        option.value = i;
        month.appendChild(option);
    }
    var year = document.createElement('select');
    year.id = "year";
    year.onchange = setMonth;
    temp = d.getFullYear() - 1970;
    for (var i = 0; i <= temp; i++){
        var option = document.createElement('option');
        option.text = +(i+1970);
        option.value = i+1970;
        year.appendChild(option);
    }
    var days = document.createElement('table');
    days.id = "days";
    days.className = "data";
    createCalendar(days, 1970, 0);
    var cancelBtn = document.createElement('input');
    cancelBtn.type = "button";
    cancelBtn.value = "Закрыть";
    cancelBtn.onclick = hide;
    datapicker.appendChild(month);
    datapicker.appendChild(year);
    datapicker.appendChild(days);
    datapicker.appendChild(cancelBtn);
    var body = document.getElementById("calendar");
    body.appendChild(datapicker);
  }
}

function setMonth(){
    var year = document.getElementById("year").value;
    var month = document.getElementById("month").value;
    var elem = document.getElementById("days");
    createCalendar(elem, year, month);
}

function createCalendar(elem, year, month) {
      var mon = month;
      var d = new Date(year, mon);

      var table = "<tr><td> Пн </td class =\"first\"><td> Вт </td><td> Ср </td><td> Чт </td><td> Пт </td><td> Сб </td><td> Вс </td></tr><tr>";

      
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
    document.getElementById("data").value = birth;
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