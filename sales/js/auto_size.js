var checkboxes = document.getElementsByClassName('segment_checkbox');
var checkeds = 1;

Array.from(checkboxes).forEach(function(checkbox){
	checkbox.addEventListener("change",function(){
		if(checkbox.checked){
			checkeds++;
		}else{
			checkeds--;
		}
		if(checkeds<=0){
			checkbox.checked = true;
			checkeds = 1;
		}
	});
});

// var _txt = document.getElementsByClassName('auto_size'); // здесь comment - это идентификатор поля, которое будет растягиваться.
// var _minRows = 15; // минимальное количество строк (высота поля)

// Array.from(_txt).forEach(function(elm){
// 	elm.rows = _minRows;
// 	elm.addEventListener('keydown',function(elm){

// 	});
// });

// function flexibleTextarea() {
// 	for (let i = 0; i < _txt.length; i++)
// 		if (_txt[i]) {
// 			// функция расчета строк
// 			function setRows() {
// 				_txt[i].rows = _minRows; // минимальное количество строк
// 				// цикл проверки вместимости контента
// 				do {
// 					if (_txt[i].clientHeight != _txt[i].scrollHeight) _txt[i].rows += 1;
// 				} while (_txt[i].clientHeight < _txt[i].scrollHeight);
// 			}
// 			setRows();
// 			_txt[i].rows = _minRows;
// 			// пересчет строк в зависимости от набранного контента
// 			_txt[i].onkeyup = function () {
// 				setRows();
// 			};
// 		}
// }
