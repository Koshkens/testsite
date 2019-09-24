function Timer() {
    var dt=new Date();
    var month;
    switch (dt.getMonth()){
        case 0:
            month = ' Янв.';
            break;
        case 1:
            month = ' Фев.';
            break;
        case 2:
            month = ' Март';
            break;
        case 3:
            month = ' Апр.';
            break;
        case 4:
            month = ' Май';
            break;
        case 5:
            month = ' Июнь';
            break;
        case 6:
            month = ' Июль';
            break;
        case 7:
            month = ' Авг.';
            break;
        case 8:
            month = ' Сент.';
            break;
        case 9:
            month = ' Окт.';
            break;
        case 10:
            month = ' Нояб.';
            break;
        case 11:
            month = ' Дек.';
            break;
    }
    document.getElementById('datetime').innerHTML=dt.getDate()+" "+month+"  "+dt.getHours()+":"+dt.getMinutes()+":"+dt.getSeconds();
    setTimeout("Timer()",1000);
 }
 Timer();
 