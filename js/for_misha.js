let rad1 = document.getElementById('rad1');
let rad2 = document.getElementById('rad2');
let rad3 = document.getElementById('rad3');
let rad4 = document.getElementById('rad4');

rad1.addEventListener("change",function(){
    rad1.classList.add('green');
    rad2.classList.remove('yellow');
    rad3.classList.remove('red');
    rad4.classList.remove('gray');
});
rad2.addEventListener("change",function(){
    rad1.classList.remove('green');
    rad2.classList.add('yellow');
    rad3.classList.remove('red');
    rad4.classList.remove('gray');
});
rad3.addEventListener("change",function(){
    rad1.classList.remove('green');
    rad2.classList.remove('yellow');
    rad3.classList.add('red');
    rad4.classList.remove('gray');
});
rad4.addEventListener("change",function(){
    rad1.classList.remove('green');
    rad2.classList.remove('yellow');
    rad3.classList.remove('red');
    rad4.classList.add('gray');
});