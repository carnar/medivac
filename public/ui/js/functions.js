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
    
    //search list
    $(function() {
        $('#search_input').fastLiveFilter('#positions_table');
    });
    
    //back to top
    $(window).scroll(function(){
        if($(this).scrollTop() > 200){
            $("#scrollTop").fadeIn();
        }else{
            $("#scrollTop").fadeOut();
        }
    });
    $("#scrollTop").on("click", function(){
        $("html, body").animate({scrollTop: 0}, 200);
    });
});
/**
 * fastLiveFilter jQuery plugin 1.0.3
 * 
 * Copyright (c) 2011, Anthony Bush
 * License: <http://www.opensource.org/licenses/bsd-license.php>
 * Project Website: http://anthonybush.com/projects/jquery_fast_live_filter/
 **/

jQuery.fn.fastLiveFilter = function(list, options) {
	// Options: input, list, timeout, callback
	options = options || {};
	list = jQuery(list);
	var input = this;
	var lastFilter = '';
	var timeout = options.timeout || 0;
	var callback = options.callback || function() {};
	
	var keyTimeout;
	
	// NOTE: because we cache lis & len here, users would need to re-init the plugin
	// if they modify the list in the DOM later.  This doesn't give us that much speed
	// boost, so perhaps it's not worth putting it here.
	var lis = list.children();
	var len = lis.length;
	var oldDisplay = len > 0 ? lis[0].style.display : "block";
	callback(len); // do a one-time callback on initialization to make sure everything's in sync
	
	input.change(function() {
		// var startTime = new Date().getTime();
		var filter = input.val().toLowerCase();
		var li, innerText;
		var numShown = 0;
		for (var i = 0; i < len; i++) {
			li = lis[i];
			innerText = !options.selector ? 
				(li.textContent || li.innerText || "") : 
				$(li).find(options.selector).text();
			
			if (innerText.toLowerCase().indexOf(filter) >= 0) {
				if (li.style.display == "none") {
					li.style.display = oldDisplay;
				}
				numShown++;
			} else {
				if (li.style.display != "none") {
					li.style.display = "none";
				}
			}
		}
		callback(numShown);
		// var endTime = new Date().getTime();
		// console.log('Search for ' + filter + ' took: ' + (endTime - startTime) + ' (' + numShown + ' results)');
		return false;
	}).keydown(function() {
		clearTimeout(keyTimeout);
		keyTimeout = setTimeout(function() {
			if( input.val() === lastFilter ) return;
			lastFilter = input.val();
			input.change();
		}, timeout);
	});
	return this; // maintain jQuery chainability
}