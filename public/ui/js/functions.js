$( document ).ready(function() {
    $('#play_button').on("click", function(){
        $("#modal").fadeIn(200);
    });
    $('#cancel_button').on("click", function(){
        $("#modal").fadeOut(200);
    });
});