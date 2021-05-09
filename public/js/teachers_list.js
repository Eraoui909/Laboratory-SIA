let moreBtn = document.querySelectorAll('span.more');
let content = document.querySelectorAll('.description');
let showBtn = document.querySelectorAll('span.show-cv');

moreBtn.forEach((item, index)=>{

    item.addEventListener('click', ()=>{


        if (content[index].style.height === '160px') {

            item.innerHTML = 'more <i class="fas fa-chevron-circle-down"></i>';
            content[index].style.height = '0px';
            return;
        }
        item.innerHTML = 'more <i class="fas fa-chevron-circle-up"></i>';
        content[index].style.height = '160px';
    });
})