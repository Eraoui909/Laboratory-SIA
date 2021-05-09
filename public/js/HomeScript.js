const sliders = document.querySelectorAll('.slider');
const pagination_disks = document.querySelectorAll('.pagination ul li');
let index = 0;



let timer = setInterval(slide, 8000);
//menuBtn.addEventListener('click', toggleMenu);

function slide(){
    if(index == (sliders.length - 1))
        index = 0;
    else
        index++;
    for(let i=0; i < sliders.length; i++){
        sliders[i].classList.remove('active');
        pagination_disks[i].classList.remove('active');
    }

    pagination_disks[index].classList.add('active');
    sliders[index].classList.add('active');


}


pagination_disks.forEach(function(element, key){
    element.addEventListener('click', function(){
        clearInterval(timer);
        for(let j=0; j < sliders.length; j++){
            sliders[j].classList.remove('active');
            pagination_disks[j].classList.remove('active');
        }

        pagination_disks[key].classList.add('active');
        sliders[key].classList.add('active');
    });
});

/** marquee tag **/

let options = {
    property: 'value',
    duration: 40000,
    padding: 10,
    marquee_class: '.marquee',
    container_class: '.simple-marquee-container',
    sibling_class: 0,
    hover: true,
    velocity: 0.1,
}

$('.simple-marquee-container').SimpleMarquee(options);

$(".marquee-1").trigger('mouseenter');
$(".marquee-1").trigger('mouseleave');