define(function(require, exports, module) {
  return {
    countdown: 30,
    isPhoneNum:function(v){ //手机验证正则
        return /^0|^((\+?86 )|(\(\+86 \)))?(13[0-9]|15[012356789]|18[012356789]|14[57])[0-9]{8}$/.test(v);
    },
    formErrorTips: function(alertNodeContext){  //错误提示弹层
        var alertInt;
        clearTimeout(alertInt);
        if($(".alertNode").length > 0){
            $(".alertNode").html(alertNodeContext);
        }else{
            var alertNode = document.createElement("div");
                alertNode.setAttribute("class","alertNode");
                alertNode.innerHTML = alertNodeContext;
                document.body.appendChild(alertNode);

        }
        alertInt = setTimeout(function(){
            $(".alertNode").remove();
        },3000);
    },
    setTime: function(obj, cb){  //30s倒计时
        var _self = this;
        if (this.countdown == 0) { 
            obj.removeAttr("readonly"); 
            cb.removeClass("disable").find("i").text("获取验证码"); 
            this.countdown = 30; 
            return;
        }else{ 
            console.log(_self.countdown);
            obj.attr("readonly", "readonly"); 
            cb.addClass("disable").find("i").text("重新发送(" + this.countdown + "s)"); 

            setTimeout(function(){ 
                _self.setTime(obj, cb);
                _self.countdown--; 
            },1000) 
        }   
    },
    eventTester: function(m, e){  //视频事件
        var self = this;
        m.addEventListener(e, function(){  
            if(e === "play"){
                // $("#vplay").css({"visibility":"visible"});
                // $(".vposter").css({"visibility":"hidden"});
            }else{
                // $(".vposter").css({"visibility":"visible"});
                // $("#vplay").css({"visibility":"hidden"});

                if(e === "error"){
                    self.formErrorTips("视频加载出错");
                    $("#vplay").html("");
                }
            }
        });  
    },
    ajaxfun: function(ajaxType, ajaxUrl, ajaxData, ajaxDataType, ajaxCallback){  //接口函数
        $.ajax({
            type: ajaxType,
            url: ajaxUrl,
            data: ajaxData,
            dataType: ajaxDataType
        }).done(function(data){
            ajaxCallback(data)
        })
    },
    wechatFun: function(_appId, _timestamp, _nonceStr, _signature){  //分享函数
        wx.config({
            debug: false,
            appId: _appId,
            timestamp: _timestamp,
            nonceStr: _nonceStr,
            signature: _signature,
            jsApiList: [
                // 所有要调用的 API 都要加到这个列表中
                'checkJsApi',
                'onMenuShareTimeline',
                'onMenuShareAppMessage',
                'onMenuShareQQ',
                'onMenuShareWeibo',
                'hideMenuItems',
                'showMenuItems',
                'hideAllNonBaseMenuItem',
                'showAllNonBaseMenuItem',
                'getNetworkType',
                'openLocation',
                'getLocation',
                'hideOptionMenu',
                'showOptionMenu',
                'closeWindow'
            ]
        });

        this.wxshareFun();
    },
    wxshareFun: function(){  //分享信息重置函数
        var self = this;
        wx.ready(function () {
            // 在这里调用 API
            // 2. 分享接口
            // 2.1 监听“分享给朋友”，按钮点击、自定义分享内容及分享结果接口
            wx.onMenuShareAppMessage({
                title: shareArr._title,
                desc: shareArr._desc_friend,
                link: shareArr._link,
                imgUrl: shareArr._imgUrl,
                trigger: function (res) {
                    //  alert('用户点击发送给朋友');
                },
                success: function (res) {
                    _hmt.push(['_trackEvent', 'share', 'ShareAppMessage']);

                    self.ajaxfun("POST", "/api/share", {"id": vid}, "json", function(data){
                        console.log(data);
                    });

                    setTimeout(function(){
                        shareArr["_callback"]();     //跳转在延迟200ms后执行
                    }, 100)
                    //  alert('已分享');
                },
                cancel: function (res) {
                    //  alert('已取消');
                },
                fail: function (res) {
                    //  alert(JSON.stringify(res));
                }
            });


            // 2.2 监听“分享到朋友圈”按钮点击、自定义分享内容及分享结果接口

            wx.onMenuShareTimeline({
                title: shareArr._desc,
                link: shareArr._link,
                imgUrl: shareArr._imgUrl,
                trigger: function (res) {
                    //   alert('用户点击分享到朋友圈');
                },
                success: function (res) {
                    _hmt.push(['_trackEvent', 'share', 'ShareTimeline']);

                    self.ajaxfun("POST", "/api/share", {"id": vid}, "json", function(data){
                        console.log(data);
                    });

                    setTimeout(function(){
                        shareArr["_callback"]();     //跳转在延迟200ms后执行
                    }, 100)
                    
                    // alert('已分享');
                },
                cancel: function (res) {
                    //  alert('已取消');
                },
                fail: function (res) {
                    //   alert(JSON.stringify(res));
                }
            });
        }); //end of wx.ready
    },
    popups: function(){
        if($(".popupsNode").length <= 0){
            var popupsNode = document.createElement("div");
                popupsNode.setAttribute("class","popupsNode");
                document.body.appendChild(popupsNode);

            $(".popupsNode").on("touchmove", function(){
              return false
            })
        }
        
    }

  }
});






