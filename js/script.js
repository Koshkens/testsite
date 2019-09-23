function entry_amount_function(){
    let entrys = document.getElementsByClassName('entry');
    entry_amount = document.getElementById('entry_amount');
    entry_amount.innerHTML = "Кол-во записей: "+ entrys.length;
}
if (window.addEventListener)
	window.addEventListener("load", entry_amount_function, false);
else if (window.attachEvent)
	window.attachEvent("onload", entry_amount_function);