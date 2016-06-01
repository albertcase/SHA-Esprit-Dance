require.config({
    baseUrl:'../src',
    paths:{   // 单独js模块加载
    	'jquery': 'js/lib/jquery',
    	"_public": 'js/model/public',
    	"form": 'js/model/form',	
    },
    map: {
      '*': {
        'css': 'js/css.min'
      }
    },
    urlArgs: "v=" + (new Date()).getTime()
});

require([
	'css!style/style',
], function () {
	//console.log('Styles have loaded');
});

require(['jquery', 'form'], function($, f) {
	$("#dreambox").css({"opacity": 1});
	$(document).on("touchmove", function(){
		return false
	})


	$("#getCodes").click(function(){
		if($(this).hasClass("disable")) return false;
		var telInput = $("input[type='tel']");
		f.getCodes(telInput, $(this));
	})

	$("#submit_btn").click(function(){
		if($(this).hasClass("disable")) return false;
		var telInput = $("input[type='tel']");
		var codesInput = $(".codesInput");
		$(this).addClass("disable");
		f.check(telInput, codesInput, $(this));
	})

	f.video(".videoCon", "http://espritdance.samesamechina.com/files/1464579297.mp4", "src/img/poster.jpg");


	$("#dianzan").on("click", function(){
		if($(this).hasClass("disable")) return false;
		f.dianzan("#dznum");
		$(this).addClass("disable");
	})
    //console.log( $ ) // UNDEFINED!
});


// require(['jquery', 'event', 'selector'], function($, E, S) {
//     alert($);
// });