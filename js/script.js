function entry_amount_function(){
    var entrys = document.getElementsByClassName('button');
    var entry_amount = document.getElementById('entry_amount');
    var amount=0;
    Array.from(entrys).forEach(function(entry){
        if(!(entry.classList.contains('hide1'))&&!(entry.classList.contains('hide2'))){
            amount++;
        }
    });
    entry_amount.innerHTML = "Кол-во записей: "+ amount;
    setTimeout(entry_amount_function,100);
}



if (window.addEventListener)
	window.addEventListener("load", entry_amount_function, false);
else if (window.attachEvent)
	window.attachEvent("onload", entry_amount_function);