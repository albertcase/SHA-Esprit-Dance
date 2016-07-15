require.config({
    baseUrl:'../src',
    map: {
      '*': {
        'css': 'js/css.min'
      }
    },
    paths:{   // 单独js模块加载
    	'jquery': 'js/lib/jquery',
    	"_public": 'js/model/public',
    	"form": 'js/model/form',	
    },
    //urlArgs: "v=" + (new Date()).getTime()
});

require(['css!style/style', 'jquery', 'form'], function (_css, $, f) {
	//console.log('Styles have loaded');
	// 样式导入

	f.init();

	//获取验证码事件
	// $("#getCodes").click(function(){
	// 	if($(this).hasClass("disable")) return false;
	// 	var telInput = $("input[type='tel']");
	// 	f.getCodes(telInput, $(this));
	// })

	//提交表单事件
	$("#submit_btn").click(function(){
		if($(this).hasClass("disable")) return false;
		var telInput = $("input[type='tel']");
		var codesInput = $(".codesInput");
		$(this).addClass("disable");
		f.check(telInput, codesInput, $(this));
	})
});


//http://espritdance.samesamechina.com/video/d12349534fde6881200427840cf2d6fd
//http://espritdance.samesamechina.com/callback?openid=xxx



