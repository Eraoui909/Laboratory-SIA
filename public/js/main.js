$("#load").hide();
document.onreadystatechange = function () {
    let state = document.readyState;
    if (state === 'interactive') {
        //$(".ha-global-popup-newsletter").removeClass("ha-global-popup-newsletter-active");
    } else if (state === 'complete') {
        $("#load").hide();
    }
}

//scrolling to top
setInterval(function (){
    if(window.pageYOffset < 500)
    {
        $(".to-top").hide();
    }else{
        $(".to-top").show();
    }
},300);
$(".to-top").on("click",function (e){
    e.preventDefault();
    setTimeout(function (){
        $('html,body').animate(
            {
                scrollTop:0
            },900);
    },200);
});

/********************************************************************************************************************/
/******************************     delete message before navbar  08-07-2021     ************************************/
/********************************************************************************************************************/

$(document).on('click','.ha-close-head',function (e) {
    e.preventDefault();
    $(this).parent().slideUp("slow");
})