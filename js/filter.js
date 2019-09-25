var btn1_press;
var btn2_press;
var btn3_press;
var btn4_press;
var search_segments = Array();
var segments_class = ['segment1','segment2','segment3','segment4','segment5','segment6','segment7','segment8','segment9','segment10','segment11'];
var entrys = document.getElementsByClassName('entry');
var segments_box = document.getElementsByClassName('filter__segment_box');
var segments = document.getElementsByClassName('segment_span');
var btn1 = document.querySelector('#btn1');
var btn2 = document.querySelector('#btn2');
var btn3 = document.querySelector('#btn3');
var btn4 = document.querySelector('#btn4');
function filter_entry(){
    var filter_entry = Array();
    Array.from(entrys).forEach(function(entry){
        if(!(entry.closest(".button").classList.contains('hide1'))){
            filter_entry.push(entry);
        }
    });
    return filter_entry;
}

function filter(){
    hide1Entrys();
    if(btn1_press){
        Array.from(entrys).forEach(function(entry){
            if(entry.classList.contains('green')){
                entry.closest(".button").classList.remove('hide1');
            }
        });
    }

    if(btn2_press){
        Array.from(entrys).forEach(function(entry){
            if(entry.classList.contains('yellow')){
                entry.closest(".button").classList.remove('hide1');
            }
        });
    }

    if(btn3_press){
        Array.from(entrys).forEach(function(entry){
            if(entry.classList.contains('red')){
                entry.closest(".button").classList.remove('hide1');
            }
        });
    }

    if(btn4_press){
        Array.from(entrys).forEach(function(entry){
            if(entry.classList.contains('gray')){
                entry.closest(".button").classList.remove('hide1');
            }
        });
    }
    if(!btn1_press && !btn2_press && !btn3_press && !btn4_press ) {
        show1Entys();
    }
}

function show1Entys(){
    Array.from(entrys).forEach(function(entry){
        entry.closest(".button").classList.remove('hide1');
    });
}

function hide1Entrys(){
    Array.from(entrys).forEach(function(entry){
        entry.closest(".button").classList.add('hide1');
    });
}

function show2Entys(){
    Array.from(entrys).forEach(function(entry){
        entry.closest(".button").classList.remove('hide2');
    });
}

function hide2Entrys(){
    Array.from(entrys).forEach(function(entry){
        entry.closest(".button").classList.add('hide2');
    });
}

Array.from(segments_box).forEach(function(segment,i){
    segment.addEventListener("change",function(){
        
        if(search_segments.indexOf(segments_class[i])==-1){
            search_segments = search_segments.concat(segments_class[i]);
        }else{
            search_segments = search_segments.filter(segment => segment !== segments_class[i]);
        }
        filter_segment();
    });
});

function filter_segment(){
    console.log(search_segments);
    if(search_segments.length==0){
       show2Entys();
    }else{
        hide2Entrys();
        Array.from(segments).forEach(function(segment){
                var l = 0;
                Array.from(segment.children).forEach(function(segment_elem){
                    search_segments.forEach(function(search_segment){
                        if(segment_elem.classList.contains(search_segment)){
                            l++;
                        }
                    });
                });
                if(l==(search_segments.length)){
                    segment.closest(".button").classList.remove('hide2');
                }
        });
    }
}

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