var sms_text = document.getElementById("sms_text");
var sms_btn = document.getElementById("sms_btn"); 
var sms_checkboxes = document.getElementsByClassName("sms_checkbox");
var select_all = document.getElementById("select_all");
var entry = document.getElementsByClassName("form");
var number = document.getElementById("number"); 
var entrys_for_events = document.getElementById("entrys_for_events");

sms_text.addEventListener('keydown',function(){
	sms_btn.classList.remove('btn_off');
	sms_btn.removeAttribute('disabled');
})

function add_number(){
    while (number.firstChild) {
        number.removeChild(number.firstChild);
    }
    while (entrys_for_events.firstChild) {
        entrys_for_events.removeChild(entrys_for_events.firstChild);
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
    Array.from(sms_checkboxes).forEach(function(checkbox){
        if(checkbox.checked){
            let id = checkbox.closest('.form').querySelector('.button').querySelector('.id').textContent;
            let id_text = document.createElement('input');
            id_text.setAttribute("value",id);
            id_text.setAttribute("style",'display:none;');
            id_text.setAttribute("name",'id_for_sms_events[]');
            entrys_for_events.append(id_text);
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

sms_btn_for_events = document.getElementById("sms_btn_for_events");
sms_checkboxes_for_events = document.getElementsByName("sms_event_checked[]");

Array.from(sms_checkboxes_for_events).forEach(function(sms_checkbox){
    sms_checkbox.addEventListener("change",function(){
        sms_btn_for_events.classList.remove("btn_off");
    	sms_btn_for_events.removeAttribute('disabled');
    });
});

let a = [2,"fefr",5];

a.forEach(function(some){
    console.log(some);
});