var btn1_press;
var btn2_press;
var btn3_press;
var btn4_press;
var entrys = document.getElementsByClassName('entry');
var segments = document.getElementsByClassName('filter__segment_box');
var btn1 = document.querySelector('#btn1');
var btn2 = document.querySelector('#btn2');
var btn3 = document.querySelector('#btn3');
var btn4 = document.querySelector('#btn4');

function filter(){
    hideEntrys();
    if(btn1_press){
        Array.from(entrys).forEach(function(entry){
            if(entry.classList.contains('green')){
                entry.closest(".button").classList.remove('hide');
            }
        });
    }

    if(btn2_press){
        Array.from(entrys).forEach(function(entry){
            if(entry.classList.contains('yellow')){
                entry.closest(".button").classList.remove('hide');
            }
        });
    }

    if(btn3_press){
        Array.from(entrys).forEach(function(entry){
            if(entry.classList.contains('red')){
                entry.closest(".button").classList.remove('hide');
            }
        });
    }

    if(btn4_press){
        Array.from(entrys).forEach(function(entry){
            if(entry.classList.contains('gray')){
                entry.closest(".button").classList.remove('hide');
            }
        });
    }
    if(!btn1_press && !btn2_press && !btn3_press && !btn4_press ) {
        showEntys();
    }
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

Array.from(segments).forEach(function(segment){
    segment.addEventListener("change",function(){
        if(segment.checked){
            Array.from(entrys).forEach(function(entry){
        
            });
        }else{
            filter();
        }
    });
});

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