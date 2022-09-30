// search ajax
const btnSearch = document.querySelector('.btn-search');
const keyword = document.querySelector('.keyword');
const content = document.querySelector('.content');

//hide btn search
btnSearch.style.display = 'none';
//event ketika nulis

keyword.addEventListener('keyup', function(){
    fetch('ajax/ajax_search.php?keyword='+keyword.value)
    .then((response) => response.text())
    .then((response) => (content.innerHTML = response));
})