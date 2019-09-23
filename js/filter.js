let entrys = document.getElementsByClassName('entry');
let btn1 = document.querySelector('#btn1');
let btn2 = document.querySelector('#btn2');
let btn3 = document.querySelector('#btn3');
let btn4 = document.querySelector('#btn4');

function filter(){
    hideEntrys();
    if(btn1_press){
        Array.from(entrys).forEach(function(entry){
            if(entry.classList.contains('green')){
                entry.closest(".button").classList.remove('hide');
            };
        });
    }

    if(btn2_press){
        Array.from(entrys).forEach(function(entry){
            if(entry.classList.contains('yellow')){
                entry.closest(".button").classList.remove('hide');
            };
        });
    }

    if(btn3_press){
        Array.from(entrys).forEach(function(entry){
            if(entry.classList.contains('red')){
                entry.closest(".button").classList.remove('hide');
            };
        });
    }

    if(btn4_press){
        Array.from(entrys).forEach(function(entry){
            if(entry.classList.contains('gray')){
                entry.closest(".button").classList.remove('hide');
            };
        });
    }
    if(!btn1_press && !btn2_press && !btn3_press && !btn4_press) {
        showEntys();
    }
    console.log('Click');
}

function showEntys(){
    Array.from(entrys).forEach(function(entry){
        entry.closest(".button").classList.remove('hide');
    });
}

function hideEntrys(){
    Array.from(entrys).forEach(function(entry){
        entry.closest(".button").classList.add('hide');
    });
}

var btn1_press;
btn1.addEventListener("click",function(){
    if(btn1.classList.contains('green')){
        btn1.classList.remove('green');
        btn1_press = 0;
    }else {
        btn1.classList.add('green');
        btn1_press = 1;
    }
    filter();
});

var btn2_press;
btn2.addEventListener("click",function(){
    if(btn2.classList.contains('yellow')){
        btn2.classList.remove('yellow');
        btn2_press = 0;
    }else {
        btn2.classList.add('yellow');
        btn2_press = 1;
    }
    filter();
});

var btn3_press;
btn3.addEventListener("click",function(){
    if(btn3.classList.contains('red')){
        btn3.classList.remove('red');
        btn3_press = 0;
    }else {
        btn3.classList.add('red');
        btn3_press = 1;
    }
    filter();
});

var btn4_press;
btn4.addEventListener("click",function(){
    if(btn4.classList.contains('gray')){
        btn4.classList.remove('gray');
        btn4_press = 0;
    }else {
        btn4.classList.add('gray');
        btn4_press = 1;
    }
    filter();
});