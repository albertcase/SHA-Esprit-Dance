define(["_public"],function(_p) {
  return {
    init: function(){
        var self = this;

        $("#dreambox").on("touchmove", function(){
          return false
        })

        self.dowcFun(); //分享默认执行

        // 视频输出事件
        // $(".vposter").on("touchstart", function(){
        //     self.video("#vplay", vsrc, "../src/img/poster.jpg");
        // });

        self.video("#vplay", vsrc, "../src/img/poster.jpg");
        
        // checkbox 
        self.checkedFun("read");

        // checkbox事件监测
        $("#read").change(function(){
            self.checkedFun("read");
        })
        
        // 活动与细则
        $(".rulesLink").on("touchstart", function(){
            self.ruleFun("rules", "close");
        })

        // 活动规则
        $(".activeRules").on("touchstart", function(){
            self.ruleFun("activeRulesLayer", "close");
        })

        // 优惠券
        $("#couponBtn").on("touchstart", function(){
            self.ruleFun("clayer", "close");
        })

        // 弹窗关闭
        $(".close").on("touchstart", function(){
            $(this).parents(".popups").fadeOut("100", function(){
                $(".popupsNode").hide();
            }); 
            return false;
        })

        // 分享提示层
        $("#shareBtn").on("touchstart", function(){
            self.shareTips();
        })

        // 分享点击关闭提示层
        $(".shareTips").on("touchstart", function(){
            $(this).fadeOut("100");
            return false;
        })

        //点赞事件
        $("#dianzan").on("touchstart", function(){
            if($(this).hasClass("disable")) {
                _p.formErrorTips("你已经点过赞了！");
            }else{
              self.dianzan("#dznum i");
              $(this).addClass("disable");
            }
        })

        $(".loading").fadeOut("100");

    },
    checkedFun: function(obj){
        var self = this;
        if($("#" + obj).is(':checked')){
          $(".pact span").removeClass("nocheck");
        }else{
          $(".pact span").addClass("nocheck");
        }  
    },
  	getCodes: function(obj, cb){  //发送验证码
  		if(!_p.isPhoneNum(obj.val())){
  			_p.formErrorTips("手机号码输入有误！");
  		}else{
  			_p.setTime(obj, cb);
		  }
  	},
    check: function(t, c, s) {  //提交表单函数 

      // else if(c.val() == ""){
      //   _p.formErrorTips("验证码不能为空！");
      //   s.removeClass("disable");
      // }else if(c.val().length != 6){
      //   _p.formErrorTips("验证码输入有误！");
      //   s.removeClass("disable");
      // }

      var readVal = $("#read").is(':checked');

      if(!_p.isPhoneNum(t.val())){
  			_p.formErrorTips("手机号码输入有误！");
  			s.removeClass("disable");
  		}else if(!readVal){
        _p.formErrorTips("请阅读并同意相关活动与细则！");
        s.removeClass("disable"); 
      }else{

        _p.ajaxfun("POST", "/api/submit", {"mobile": t.val()}, "json", function(data){
            _p.formErrorTips(data.msg);
            if(data.status == 1){
                $(".tableLayer").fadeOut("100", function(){
                    $("#video").show();
                });
            }  

            s.removeClass("disable");
        });
	
  		}
    },
    video: function(a, b, c){  //视频函数
    	var videoWidth = $("#vplay").css("width"), 
    		  videoHeight = $("#vplay").css("height"),
          _video = document.createElement("VIDEO");

      		_video.setAttribute("width", videoWidth);
      		_video.setAttribute("height", videoHeight);
      		_video.setAttribute("controls", "controls");
      		_video.setAttribute("src", b);
      		_video.setAttribute("poster", c);
          _video.setAttribute("webkit-playsinline", "webkit-playsinline");
      		
          $(a).html(_video);

          //$.when($(a).html(_video)).done(function() {
              //_video.play();

              _p.eventTester(_video, "play");
              //_p.eventTester(_video, "pause");
              _p.eventTester(_video, "ended");
              //_p.eventTester(_video, "error");
          //})
	},
	dianzan: function(a){  //点赞函数
		var znum = $(a).html();
		
    _p.ajaxfun("POST", "/api/ballot", {"id": vid}, "json", function(data){
        _p.formErrorTips(data.msg);
        if(data.status == 1){
            znum++;
            $(a).html(znum);
        }
    });
	},
  dowcFun: function(){ //分享执行函数
      _p.ajaxfun("GET", "http://espritdance.samesamechina.com/wechat/ws/jssdk/config/webservice", {"url": shareArr["_url"]}, "json", function(msg){
          if(msg.status == 1){
              _p.wechatFun(msg.data.appId, msg.data.timestamp, msg.data.nonceStr, msg.data.signature);
          }
      });
  },
  ruleFun: function(obj, _close){
      
      $.when(_p.popups()).done(function() {
          $(".popupsNode").fadeIn("60", function(){
              $("#"+obj).fadeIn("100");
          })          
      });
  },
  shareTips: function(){
      $(".shareTips").fadeIn("100");
  },
  resultFun: function(){
      $("#video").hide();
      $("#result").show();
      $("#dreambox").addClass("resultbg");
  }

  }
});






