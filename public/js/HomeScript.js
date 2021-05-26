let globalDIR = window.location.href;

if(globalDIR.includes('public'))
{
    globalDIR = "/public";
}else{
    globalDIR = "";
}


//6---------
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

/**
 ***********************************************************************************************************************
 ***********************************************************************************************************************
 ************************************** inscription in news letter *****************************************************
 ***********************************************************************************************************************
 ***********************************************************************************************************************
 **/
let c = new CokiesHandler();

//c.setCookie("newsletter_registered","false",30);
console.log(c.getCookie("newsletter_registered"));
if(c.getCookie("newsletter_registered") == "false") {
    $(document).on("click",".ha-global-popup-newsletter", function () {
        $(this).addClass("ha-global-popup-newsletter-active");
        $(".ha-newletter-container")
            .fadeOut(1000);
        setTimeout(function () {
            $(".ha-newletter-container").addClass("ha-global-popup-newsletter-active");
        }, 1100);
    })

    $(window).on("load", function () {

        setTimeout(function () {

            $(".ha-global-popup-newsletter").removeClass("ha-global-popup-newsletter-active");
            $(".ha-newletter-container").removeClass("ha-global-popup-newsletter-active");

        }, 10000);

    });
}

$(document).on("click",".ha-abonner-newsletter",function (e) {
    e.preventDefault();
    let emaill = $('.newsletter-email').val().split();
    if(emaill == "")
    {
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Email is required!',
        });
    }else{
        $.ajax({
            method: "post",
            url: globalDIR+"/newsletter/inscription",
            data:"email="+emaill,
            datatype: "json",
            success:function (data){
                if(data == '"empty"')
                {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Email is required!',
                    });
                }else if(data == '"success"'){
                    Swal.fire(
                        'Good job!',
                        'You have successfully registered',
                        'success'
                    );
                    c.setCookie("newsletter_registered","true",30);
                    setTimeout(function (){
                        window.location.replace(globalDIR+"/");
                    },1000);
                }else if(data == '"repeat"'){
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'This email already registered',
                    });
                    c.setCookie("newsletter_registered","true",30);
                    setTimeout(function (){
                        window.location.replace(globalDIR+"/");
                    },1000);
                }
            }
        })
    }
})


/********************************************************************************************************************/
/********************************************************************************************************************/
/**************************************** acceeil style 13-05-2021         ******************************************/
/********************************************************************************************************************/
/********************************************************************************************************************/

$(window).on("load",function (e) {
   setTimeout(function (){
       $(".ha-teams-dropdown").slideToggle("slow");
   },1500) ;
});

$(document).on("click",".ha-toggle-teams-table" , function (e) {
    e.preventDefault();
    $(".ha-teams-dropdown").slideToggle("slow");
})


/********************************************************************************************************************/
/********************************************************************************************************************/
/**********************************     show article pop up 25-05-2021     ******************************************/
/********************************************************************************************************************/
/********************************************************************************************************************/


$('#exampleModal').on('show.bs.modal', function (event) {
    let button = $(event.relatedTarget)
    let title  = button.data('title');
    let abstract  = button.data('abstract');
    let journal  = button.data('journal');
    let researchers  = button.data('researchers');
    let date  = button.data('date');
    let doi  = button.data('doi');


     let modal = $(this)
    console.log(title);
    modal.find('.ha-modal-title').text(title);
    modal.find('.ha-modal-journal').text(journal);
    modal.find('.ha-modal-abstract').text(abstract);
    modal.find('.ha-modal-researchers').text(researchers);
    modal.find('.ha-modal-doi').text("doi : "+doi);
    modal.find('.ha-modal-date').html("<span style='padding: 8px' class='badge badge-info'>"+date+"<span>");
})