require.config({
    baseUrl:'../src',
    paths:{   // 单独js模块加载
    	'jquery': 'js/lib/jquery'
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

require(['jquery'], function() {
	$("#dreambox").css({"opacity": 1});
	$(document).on("touchmove", function(){
		return false
	})
    //console.log( $ ) // UNDEFINED!
});


// require(['jquery', 'event', 'selector'], function($, E, S) {
//     alert($);
// });