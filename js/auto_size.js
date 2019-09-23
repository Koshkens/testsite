function flexibleTextarea(){
	var _txt = document.getElementsByTagName('textarea'); // здесь comment - это идентификатор поля, которое будет растягиваться.
	var _minRows = 7; // минимальное количество строк (высота поля)
	
	for (let i = 0; i < _txt.length; i++)
	if (_txt[i]) {
		// функция расчета строк
		function setRows() {
			_txt[i].rows = _minRows; // минимальное количество строк
			// цикл проверки вместимости контента
			do {
				if (_txt[i].clientHeight != _txt[i].scrollHeight) _txt[i].rows += 1;
			} while (_txt[i].clientHeight < _txt[i].scrollHeight);
		}
		setRows();
		_txt[i].rows = _minRows;
		// пересчет строк в зависимости от набранного контента
		_txt[i].onkeyup = function(){
			setRows();
		}
	}
}
if (window.addEventListener)
	window.addEventListener("load", flexibleTextarea, false);
else if (window.attachEvent)
	window.attachEvent("onload", flexibleTextarea);
let alertSubmit = function(){
	alert('dw');
}
// var ele = document.getElementById("save");
// console.log(ele);
// if(ele.addEventListener){
// 	ele.addEventListener("submit",alertSubmit()  , false);
// }