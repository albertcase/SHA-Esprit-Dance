define(["_public"],function(_p) {
  return {
  	getCodes: function(obj, cb){
  		if(!_p.isPhoneNum(obj.val())){
  			_p.formErrorTips("手机号码输入有误！");
  		}else{
  			_p.setTime(obj, cb);
		}
  	},
    check: function(t, c, s) {
      	if(!_p.isPhoneNum(t.val())){
  			_p.formErrorTips("手机号码输入有误！");
  			s.removeClass("disable");
  		}else if(c.val() == ""){
  			_p.formErrorTips("验证码不能为空！");
  			s.removeClass("disable");
  		}else if(c.val().length != 6){
  			_p.formErrorTips("验证码输入有误！");
  			s.removeClass("disable");
  		}else{
  			console.log("提交成功！");
  			s.removeClass("disable");

  			_p.pageChange("video");
  		}
    },
    video: function(a, b, c){
    	var videoWidth = document.body.clientWidth, 
    		videoHeight = videoWidth * (1080 / 1920) * 0.827;
    	var _video = document.createElement("VIDEO"),
    		_poster = document.createElement("div");

    	_poster.setAttribute("class", "vposter");

		_video.setAttribute("width", "100%");
		_video.setAttribute("height", videoHeight);
		_video.setAttribute("controls", "controls");
		_video.setAttribute("src", b);
		_video.setAttribute("poster", c);
		
		$(a).html(_video).append(_poster);;

		$(".vposter").css({
    		"background": "#fff url("+ c +") center no-repeat",
    		"background-size": "auto 100%"
    	}).html("<span></span>").on("click", function(){
    		_video.play();
    	});

    	_p.eventTester(_video, "play");
    	_p.eventTester(_video, "pause");
    	_p.eventTester(_video, "ended");
	},
	dianzan: function(a){
		var znum = $(a).html();
		znum++;
		$(a).html(znum);
	}


  }
});