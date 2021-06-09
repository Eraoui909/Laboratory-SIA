
let menuBtn = document.getElementById('menu-btn-icon');
let menuBar = document.getElementById('menuRespBar');
let presentation_li = document.querySelector("#menuRespBar ul li.presentation");
let presentation_drop = document.querySelectorAll("#menuRespBar ul li.presentation-drop-down");


/** menu (responsive navbar) **/

menuBtn.addEventListener('click', toggleMenu);
presentation_li.addEventListener('click', presentationDrop);

function toggleMenu()
{
    let height = menuBar.style.height;
    if (height === '' || height === '0px'){
        menuBar.style.height = "350px";
    }else{
        menuBar.style.height = '0';
    }
}

function presentationDrop(){
    presentation_drop.forEach((item)=>{

        if (!item.classList.contains('hidden')){
            menuBar.style.height = "350px";
        }else{
            menuBar.style.height = "512px";
        }
        item.classList.toggle('hidden');
    })

}