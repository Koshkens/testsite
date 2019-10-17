function Timer() {
    var dt=new Date();
    var month;
    switch (dt.getMonth()){
        case 0:
            month = ' Января';
            break;
        case 1:
            month = ' Февраля';
            break;
        case 2:
            month = ' Марта';
            break;
        case 3:
            month = ' Апреля';
            break;
        case 4:
            month = ' Мая';
            break;
        case 5:
            month = ' Июня';
            break;
        case 6:
            month = ' Июля';
            break;
        case 7:
            month = ' Августа';
            break;
        case 8:
            month = ' Сентября';
            break;
        case 9:
            month = ' Октября';
            break;
        case 10:
            month = ' Ноября';
            break;
        case 11:
            month = ' Декабря';
            break;
    }
    var hours = dt.getHours();
    if(hours<10)hours = "0"+hours;
    var minutes = dt.getMinutes();
    if(minutes<10)minutes="0"+minutes;
    var hours = dt.getHours();
    if(hours<10)hours = "0"+hours;
    var seconds = dt.getSeconds();
    if(seconds<10)seconds="0"+seconds;

    document.getElementById('datetime').innerHTML=dt.getDate()+" "+month+" "+hours+":"+minutes+":"+seconds;
    setTimeout("Timer()",1000);
 }
 Timer();
 