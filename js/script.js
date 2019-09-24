function entry_amount_function(){
    var entrys = document.getElementsByClassName('entry');
    entry_amount = document.getElementById('entry_amount');
    entry_amount.innerHTML = "Кол-во записей: "+ entrys.length;
    setTimeout(entry_amount_function,100);
}
if (window.addEventListener)
	window.addEventListener("load", entry_amount_function, false);
else if (window.attachEvent)
	window.attachEvent("onload", entry_amount_function);