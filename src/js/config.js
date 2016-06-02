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

require(['css!style/style'], function () {
	//console.log('Styles have loaded');
	// 样式导入
});

require(['jquery', 'form'], function($, f) {
	$("#dreambox").css({"opacity": 1});
	$(document).on("touchmove", function(){
		return false
	})

	//分享默认执行
	f.dowcFun();


	//获取验证码事件
	$("#getCodes").click(function(){
		if($(this).hasClass("disable")) return false;
		var telInput = $("input[type='tel']");
		f.getCodes(telInput, $(this));
	})

	//提交表单事件
	$("#submit_btn").click(function(){
		if($(this).hasClass("disable")) return false;
		var telInput = $("input[type='tel']");
		var codesInput = $(".codesInput");
		$(this).addClass("disable");
		f.check(telInput, codesInput, $(this));
	})

	//视频输出事件
	f.video(".videoCon", vsrc, "/src/img/poster.jpg");

	//点赞事件
	$("#dianzan").on("click", function(){
		if($(this).hasClass("disable")) return false;
		f.dianzan("#dznum");
		$(this).addClass("disable");
	})

});










//http://espritdance.samesamechina.com/video/d12349534fde6881200427840cf2d6fd
//http://espritdance.samesamechina.com/callback?openid=xxx



