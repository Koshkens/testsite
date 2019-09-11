document.querySelector('#elastic').oninput = function () {
    let val = this.value.trim();
    let elasticItems = document.querySelectorAll('.elastic li');
    val = val.toLowerCase();
    if (val != '') {
        elasticItems.forEach(function (elem) {
            if (elem.innerText.toLowerCase().search(val) == -1) {
                elem.classList.add('hide');
                //elem.innerHTML = elem.innerText;
            }
            else {
                elem.classList.remove('hide');
                //let str = elem.innerHTML;
                //elem.innerHTML = insertMark(str, elem.innerHTML.search(val), val.length);
            }
        });
    }
    else {
         elasticItems.forEach(function (elem) {
            elem.classList.remove('hide');
            //elem.innerHTML = elem.innerText;
         });
   }
}

// function insertMark(string, pos, len) {
//     // hello world
//     // hello <mark>wo</mark>rld
//     // hello+<mark>+wo+</mark>+rld
//   return string.slice(0, pos) + '<mark>' + string.slice(pos, pos + len) + '</mark>' + string.slice(pos + len);
//}