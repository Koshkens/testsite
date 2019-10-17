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
var id = document.getElementById('id');
var change = 0;

save__btn.setAttribute('disabled',true);
sms__btn.setAttribute('disabled',true);

// close__btn.onclick = function(){
// 	if (change){
// 		let res = confirm('Выйти без сохранения?');
// 		if (res){
// 			window.close();
// 			window.open(location, '_self', '');
// 			window.close();
// 		}
// 	}else{
// 		window.close(); 
// 		window.open(location, '_self', '');
// 		window.close(); 
// 	}
// }

back__btn.onclick = function(){
	if (change){
		let res = confirm('Выйти без сохранения?');
		if (res){
			window.location.href = "../index.php?select=" + id.innerText;
		}
	}else{
		window.location.href = "../index.php?select=" + id.innerText;
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


//маска телефона

var inp = document.getElementsByClassName("contact_text")[0];

inp.onclick = function() {
    inp.value = "+";
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