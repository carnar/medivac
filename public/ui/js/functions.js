//jquery timer  * http://jchavannes.com/jquery-timer
(function($){$.timer=function(func,time,autostart){this.set=function(func,time,autostart){this.init=true;if(typeof func=="object"){var paramList=["autostart","time"];for(var arg in paramList){if(func[paramList[arg]]!=undefined){eval(paramList[arg]+" = func[paramList[arg]]")}}func=func.action}if(typeof func=="function"){this.action=func}if(!isNaN(time)){this.intervalTime=time}if(autostart&&!this.isActive){this.isActive=true;this.setTimer()}return this};this.once=function(e){var t=this;if(isNaN(e)){e=0}window.setTimeout(function(){t.action()},e);return this};this.play=function(e){if(!this.isActive){if(e){this.setTimer()}else{this.setTimer(this.remaining)}this.isActive=true}return this};this.pause=function(){if(this.isActive){this.isActive=false;this.remaining-=new Date-this.last;this.clearTimer()}return this};this.stop=function(){this.isActive=false;this.remaining=this.intervalTime;this.clearTimer();return this};this.toggle=function(e){if(this.isActive){this.pause()}else if(e){this.play(true)}else{this.play()}return this};this.reset=function(){this.isActive=false;this.play(true);return this};this.clearTimer=function(){window.clearTimeout(this.timeoutObject)};this.setTimer=function(e){var t=this;if(typeof this.action!="function"){return}if(isNaN(e)){e=this.intervalTime}this.remaining=e;this.last=new Date;this.clearTimer();this.timeoutObject=window.setTimeout(function(){t.go()},e)};this.go=function(){if(this.isActive){this.action();this.setTimer()}};if(this.init){return new $.timer(func,time,autostart)}else{this.set(func,time,autostart);return this}}})(jQuery)

$( document ).ready(function() {

    if (window.location.href.indexOf('#_=_') > 0) {
        window.location = window.location.href.replace(/#.*/, '');
    }
    
    $('#play_button').on("click", function(){
        $("#modal").fadeIn(200);
    });
    $('#cancel_button').on("click", function(){
        $("#modal").fadeOut(200);
    });
    //on resize for small user trail
    $(window).resize(function(){
        $("#positions_table li").each(function(){
            if($(this).width() < 320){
                $(this).addClass("small");
            }
            else{
                $(this).removeClass("small");
            }
        });
    });
    //move to position
    var userHash = window.location.hash.substr(1)
    var user = $("#" + userHash);
    var totalUsers = user.length;
    var userIndex = 0;
    if(userHash){
        var position = user.offset().top - 200;
        user.addClass("selected");
        $("html, body").animate({scrollTop: position}, 45 * user.index(), "linear");
    }
    var userShow = $.timer(function(){
        $("#positions_table li:eq("+ userIndex +")").animate({opacity: 1}, 200);
        userIndex++;
    });
    userShow.set({time: 20, autostart: true});
});