define(function(require, exports, module) {
  return {
    countdown: 30,
    isPhoneNum:function(v){
        return /^0|^((\+?86 )|(\(\+86 \)))?(13[0-9]|15[012356789]|18[012356789]|14[57])[0-9]{8}$/.test(v);
    },
    formErrorTips: function(alertNodeContext){
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
    setTime: function(obj, cb){
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
        m.addEventListener(e,function(){  
            if(e === "play"){
                $(".vposter").hide();
            }else if(e === "pause"){
                $(".vposter").show();
            }else if(e === "ended"){
                $(".vposter").show();
            }
        });  
    },
    pageChange: function(a){
        $(".section").removeClass("active");
        $("#"+a).addClass("active");
    }  

  }
});