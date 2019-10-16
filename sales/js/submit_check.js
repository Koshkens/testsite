var status__buttons = document.getElementsByName("status[]");
var save__btn = document.querySelector("#save__btn");
var form = document.querySelector("#new_entry_form");

var value = false;


Array.from(status__buttons).forEach(function(status__button){
    status__button.addEventListener("click",function(){
        if(status__button.value = true) value = true;
    })
});

save__btn.onclick = function(){
    form.submit();
    console.log(f);
}


console.log(form);
