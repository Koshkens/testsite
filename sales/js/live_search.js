document.querySelector('#elastic').oninput = function () {
    var val = this.value.trim();
    var elasticItems = document.getElementsByName("entry");
    val = val.toLowerCase();
    if (val != '') {
        elasticItems.forEach(function (elem) {
            if (elem.innerText.toLowerCase().search(val) == -1) {
                elem.closest('.form').classList.add('hide');
                //elem.innerHTML = elem.innerText;
            }
            else {
                elem.closest('.form').classList.remove('hide');
                //let str = elem.innerHTML;
                //elem.innerHTML = insertMark(str, elem.innerHTML.search(val), val.length);
            }
        });
    }
    else {
         elasticItems.forEach(function (elem) {
            elem.closest('.form').classList.remove('hide');
            //elem.innerHTML = elem.innerText;
         });
   }
};

// function insertMark(string, pos, len) {
//     // hello world
//     // hello <mark>wo</mark>rld
//     // hello+<mark>+wo+</mark>+rld
//   return string.slice(0, pos) + '<mark>' + string.slice(pos, pos + len) + '</mark>' + string.slice(pos + len);
//}