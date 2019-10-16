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

var allInputs = document.getElementsByTagName('input');
var textArea = document.getElementById('textArea');
var save__btn = document.getElementById('save__btn');
var back__btn = document.getElementById('back__btn');
var close__btn = document.getElementById('close__btn');
var sms__btn = document.getElementById('sms__btn');
var sms__text = document.getElementById('sms__text');
var change = 0;

save__btn.setAttribute('disabled',true);
sms__btn.setAttribute('disabled',true);

close__btn.onclick = function(){
	if (change){
		let res = confirm('Выйти без сохранения?');
		if (res){
			window.close();
			window.open(location, '_self', '');
			window.close();
		}
	}else{
		window.close(); 
		window.open(location, '_self', '');
		window.close(); 
	}
}

back__btn.onclick = function(){
	if (change){
		let res = confirm('Выйти без сохранения?');
		if (res){
			window.location.href = "../index.php";
		}
	}else{
		window.location.href = "../index.php";
	}
}

function change_button(){
	save__btn.classList.remove('btn_off');
	save__btn.removeAttribute('disabled');	
	change = 1;
}

Array.from(allInputs).forEach(function(Input){
	Input.addEventListener("keydown",function(){
		change_button();
	});
	Input.addEventListener("change",function(){
		change_button();
	});
});
textArea.addEventListener('keydown',function(){
	change_button();
})
sms__text.addEventListener('keydown',function(){
	sms__btn.classList.remove('btn_off');
	sms__btn.removeAttribute('disabled');
})