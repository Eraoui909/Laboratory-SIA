$(".ha-drop-down").on("click",function (){
    //$(".ha-event-drop-down").hide();
    var parentSection = $(this).parent().parent();
    parentSection.find(".ha-event-drop-down").slideToggle("slow");
});