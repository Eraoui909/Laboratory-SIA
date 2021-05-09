
let menuBtn = document.getElementById('menu-btn-icon');
let menuBar = document.getElementById('menuRespBar');

/** menu (responsive navbar) **/

menuBtn.addEventListener('click', toggleMenu);
function toggleMenu()
{
    let height = menuBar.style.height;
    if (height === '' || height === '0px'){
        menuBar.style.height = "285px";
    }else{
        menuBar.style.height = '0';
    }
}