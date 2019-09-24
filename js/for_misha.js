let rad1 = document.getElementById('rad1');
let rad2 = document.getElementById('rad2');
let rad3 = document.getElementById('rad3');
let rad4 = document.getElementById('rad4');

rad1.addEventListener("change",function(){
    rad1.closest('span').classList.add('green');
    rad2.closest('span').classList.remove('yellow');
    rad3.closest('span').classList.remove('red');
    rad4.closest('span').classList.remove('gray');
});
rad2.addEventListener("change",function(){
    rad1.closest('span').classList.remove('green');
    rad2.closest('span').classList.add('yellow');
    rad3.closest('span').classList.remove('red');
    rad4.closest('span').classList.remove('gray');
});
rad3.addEventListener("change",function(){
    rad1.closest('span').classList.remove('green');
    rad2.closest('span').classList.remove('yellow');
    rad3.closest('span').classList.add('red');
    rad4.closest('span').classList.remove('gray');
});
rad4.addEventListener("change",function(){
    rad1.closest('span').classList.remove('green');
    rad2.closest('span').classList.remove('yellow');
    rad3.closest('span').classList.remove('red');
    rad4.closest('span').classList.add('gray');
});

if(rad1.checked){
    rad1.closest('span').classList.add('green');
}
if(rad2.checked){
    rad2.closest('span').classList.add('yellow');
}
if(rad3.checked){
    rad3.closest('span').classList.add('red');
}
if(rad4.checked){
    rad4.closest('span').classList.add('gray');
}
