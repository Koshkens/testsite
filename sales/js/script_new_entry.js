var checkboxes = document.getElementsByClassName('segment_checkbox');
var checkeds = 0;
//проверка на ходтя бы 1 чекбокс
var label_checkboxes = document.querySelectorAll(".segment_first_click");
function remove_first_class(){
	Array.from(label_checkboxes).forEach(function(label_checkbox){
		label_checkbox.classList.remove("segment_first_click");
		label_checkbox.classList.add("segment_label");
	})
}

Array.from(checkboxes).forEach(function (checkbox) {
	checkbox.addEventListener("change", function () {
		remove_first_class();
		if (checkbox.checked) {
			checkeds++;
		} else {
			checkeds--;
		}
		if (checkeds <= 0) {
			checkbox.checked = true;
			checkeds = 1;
		}
	});
});



var save__btn = document.getElementById('save__btn');
var back__btn = document.getElementById('back__btn');
var status__buttons = document.getElementsByName('status[]');
var segment_buttons = document.getElementsByName('segment[]');
var click_status = false;
var click_segment = false;
//активация кнопки отправки только при нажатии на статус и сегмент
save__btn.setAttribute('disabled', true);

function change_button() {
	if (click_status && click_segment) {
		save__btn.classList.remove('btn_off');
		save__btn.removeAttribute('disabled');
	}
}

Array.from(status__buttons).forEach(function (status__button) {
	status__button.addEventListener("click", function () {
		click_status = true;
		change_button()
	});
});

Array.from(segment_buttons).forEach(function (segment__button) {
	segment__button.addEventListener("click", function () {
		click_segment = true;
		change_button()
	});
});
//проверка выхода
back__btn.onclick = function () {
	let res = confirm('Выйти без сохранения?');
	if (res) {
		window.location.href = "../index.php";
	}
}
//маска телефона 
var inp = document.getElementsByClassName("contact_text")[0];

inp.onclick = function() {
    if(inp.value=="")inp.value = "+7";
}

var old = 0;

inp.onkeydown = function() {
    var curLen = inp.value.length;
    
    if (curLen < old){
      old--;
      return;
      }
    
    if (curLen == 2) 
    	inp.value = inp.value + "(";
      
    if (curLen == 6)
    	inp.value = inp.value + ")-";
      
     if (curLen == 11)
    	inp.value = inp.value + "-"; 
      
     if (curLen == 14)
    	inp.value = inp.value + "-";  
      
     if (curLen > 16)
    	inp.value = inp.value.substring(0, inp.value.length - 1);
      
     old++;
}