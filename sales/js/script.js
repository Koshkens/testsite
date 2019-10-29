function entry_amount_function(){
    var entrys = document.getElementsByClassName('form');
    var entry_amount = document.getElementById('entry_amount');
    var checkboxes = document.getElementsByClassName('sms_checkbox');
    var amount =0;
    var checkeds =0;
    
    Array.from(entrys).forEach(function(entry){
        if(!(entry.classList.contains('hide1'))&&!(entry.classList.contains('hide2'))&&!(entry.classList.contains('hide'))){
            amount++;
        }
    });

    Array.from(checkboxes).forEach(function(checkbox){
        if(checkbox.checked){
            checkeds++;
        }
    })

    entry_amount.innerHTML = "Записей: "+ amount+"     "+"Выбрано: "+ checkeds;
    setTimeout(entry_amount_function,100);
}

// var buttons = document.getElementsByClassName("button");
// var entrys = document.getElementsByClassName("entry");

// Array.from(buttons).forEach(function(button){
//     button.addEventListener("click",function(){
//         Array.from(entrys).forEach(function(entry){
//             entry.classList.remove("select");
//         });
//         button.querySelector(".entry").classList.add("select");
//     });
// });

if (window.addEventListener)
	window.addEventListener("load", entry_amount_function, false);
else if (window.attachEvent)
	window.attachEvent("onload", entry_amount_function);