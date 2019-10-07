var btn1_press;
var btn2_press;
var btn3_press;
var btn4_press;
var search_segments = Array();
var segments_class = ['segment10','segment2','segment11','segment3','segment7','segment9','segment8','segment4','segment5','segment1','segment6'];
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
        if(!(entry.closest(".form").classList.contains('hide1'))){
            filter_entry.push(entry);
        }
    });
    return filter_entry;
}
var sum_green = 0;
var sum_yellow = 0;
var sum_gray = 0;
var sum_red = 0;


function sum_status(){
    Array.from(entrys).forEach(function(entry){
        if(entry.classList.contains('green')){
            sum_green++;
        }
        if(entry.classList.contains('yellow')){
            sum_yellow++;
        }
        if(entry.classList.contains('gray')){
            sum_gray++;
        }
        if(entry.classList.contains('red')){
            sum_red++;
        }
        btn1.textContent = 'Работаем '+sum_green;
        btn2.textContent = 'Переговоры '+sum_yellow;
        btn3.textContent = 'Холодный клиент '+sum_red;
        btn4.textContent = 'Не работаем '+sum_gray;
    });

}
sum_status();

function filter(){
    hide1Entrys();
    if(btn1_press){
        Array.from(entrys).forEach(function(entry){
            if(entry.classList.contains('green')){
                entry.closest(".form").classList.remove('hide1');
            }
        });
    }

    if(btn2_press){
        Array.from(entrys).forEach(function(entry){
            if(entry.classList.contains('yellow')){
                entry.closest(".form").classList.remove('hide1');
            }
        });
    }

    if(btn3_press){
        Array.from(entrys).forEach(function(entry){
            if(entry.classList.contains('red')){
                entry.closest(".form").classList.remove('hide1');
            }
        });
    }

    if(btn4_press){
        Array.from(entrys).forEach(function(entry){
            if(entry.classList.contains('gray')){
                entry.closest(".form").classList.remove('hide1');
            }
        });
    }
    if(!btn1_press && !btn2_press && !btn3_press && !btn4_press ) {
        show1Entys();
    }
}

function show1Entys(){
    Array.from(entrys).forEach(function(entry){
        entry.closest(".form").classList.remove('hide1');
    });
}

function hide1Entrys(){
    Array.from(entrys).forEach(function(entry){
        entry.closest(".form").classList.add('hide1');
        entry.closest(".form").querySelector('.sms_checkbox').checked = false;
        add_number();
    });
}

function show2Entys(){
    Array.from(entrys).forEach(function(entry){
        entry.closest(".form").classList.remove('hide2');
    });
}

function hide2Entrys(){
    Array.from(entrys).forEach(function(entry){
        entry.closest(".form").classList.add('hide2');
        entry.closest(".form").querySelector('.sms_checkbox').checked = false;
        add_number();
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
                    segment.closest(".form").classList.remove('hide2');
                }
        });
    }
}

btn1.addEventListener("click",function(){
    if(btn1.classList.contains('green_filter')){
        btn1.classList.remove('green_filter');
        btn1_press = 0;
    }else {
        btn1.classList.add('green_filter');
        btn1_press = 1;
    }
    filter();
});

btn2.addEventListener("click",function(){
    if(btn2.classList.contains('yellow_filter')){
        btn2.classList.remove('yellow_filter');
        btn2_press = 0;
    }else {
        btn2.classList.add('yellow_filter');
        btn2_press = 1;
    }
    filter();
});

btn3.addEventListener("click",function(){
    if(btn3.classList.contains('red_filter')){
        btn3.classList.remove('red_filter');
        btn3_press = 0;
    }else {
        btn3.classList.add('red_filter');
        btn3_press = 1;
    }
    filter();
});

btn4.addEventListener("click",function(){
    if(btn4.classList.contains('gray_filter')){
        btn4.classList.remove('gray_filter');
        btn4_press = 0;
    }else {
        btn4.classList.add('gray_filter');
        btn4_press = 1;
    }
    filter();
});

var sms_text = document.getElementById("sms_text");
var sms_btn = document.getElementById("sms_btn"); 
var sms_checkboxes = document.getElementsByClassName("sms_checkbox");
var select_all = document.getElementById("select_all");
var entry = document.getElementsByClassName("form");
var number = document.getElementById("number"); 

sms_text.addEventListener('keydown',function(){
	sms_btn.classList.remove('btn_off');
	sms_btn.removeAttribute('disabled');
})

function add_number(){
    while (number.firstChild) {
        number.removeChild(number.firstChild);
    }
   
    Array.from(sms_checkboxes).forEach(function(checkbox){
        if(checkbox.checked){
            let phone = checkbox.closest('.form').querySelector('.button').querySelector('.contact').textContent;
            let number_text = document.createElement('input');
            number_text.setAttribute("value",phone);
            number_text.setAttribute("style",'display:none;');
            number_text.setAttribute("name",'phones[]');
            number.append(number_text);
        }
    });
}

Array.from(sms_checkboxes).forEach(function(checkbox){
    checkbox.addEventListener("change",function(){
        add_number();
    });
});
var select = false;
select_all.addEventListener("click",function(){
    Array.from(entry).forEach(function(entry){
        if(!(entry.classList.contains('hide1')||entry.classList.contains('hide2')||entry.classList.contains('hide'))){
            if(select){
                entry.querySelector('.sms_checkbox').checked = false;
            }else{
                entry.querySelector('.sms_checkbox').checked = true;
            }
        }
    });
    if(select){
        select=false
    }else{
        select=true;
    }
        add_number();
});