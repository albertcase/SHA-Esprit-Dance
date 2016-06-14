<!DOCTYPE html>
<html>
<head>
	<title>ESPRIT</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<!--禁用手机号码链接(for iPhone)-->
	<meta name="format-detection" content="telephone=no">

	<!--自适应设备宽度-->
	<meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0,minimum-scale=1.0,maximum-scale=1.0,minimal-ui" />
	
	<!--控制全屏时顶部状态栏的外，默认白色-->
	<meta name="apple-mobile-web-app-status-bar-style" content="black">

	<!--是否启动webapp功能，会删除默认的苹果工具栏和菜单栏。-->
	<meta name="apple-mobile-web-app-capable" content="yes" />
	<meta name="Keywords" content="">
	<meta name="Description" content="...">

	<link rel="stylesheet" type="text/css" href="/src/style/reset.css">
	
	<script type="text/javascript">
		var vid = <?php echo $vid;?>,
			vsrc = "/files/<?php echo $url;?>",
			isSubmitForm = <?php echo $mobile;?>,
			ismy = <?php echo $ismy;?>;
		var shareArr = {
			"_title": '#DanceWithEsprit#', //分享标题
			"_desc": "我在中山公园龙之梦#DanceWithEsprit#，快来参加赢大奖！",    // 分享朋友圈的描述
			"_desc_friend": "以舞蹈演绎#ImPerfect#， 展现你与众不同的魅力！",    // 分享好友的描述
			"_link": window.location.href,    //分享的连接
			"_imgUrl": "http://" + window.location.host + "/src/img/share.jpg",   //分享的图片
			"_url": encodeURIComponent(window.location.href.split("#")[0]) //.replace('http%3A%2F%2F','')
		}

		<?php
			$area = "sh";
		?>
	</script>

	<script type="text/javascript" src="https://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
	<script data-main="/src/js/config" src="/src/js/require.js"></script>
	<script>
		var _hmt = _hmt || [];
		(function() {
		  var hm = document.createElement("script");
		  hm.src = "//hm.baidu.com/hm.js?6037e120cc56809030fea8bf93ebfd86";
		  var s = document.getElementsByTagName("script")[0]; 
		  s.parentNode.insertBefore(hm, s);
		})();
	</script>

</head>
<body>

<div class="shareTips"></div>

<div class="loading">
	<div class="cssload-loader">
		<div></div>
		<div></div>
		<div></div>
		<div></div>
		<div></div>
	</div>
</div>

<div id="dreambox">
	<div class="logo">
		<img src="/src/img/logo.png" width="100%" />
		<div class="slogan">
			<img src="/src/img/slogan.png" width="100%" />
		</div>
	</div>

	<?php if($mobile) {
	?>

	<?php $ismy = 1;?>

	<style type="text/css">
		#video{
		    display: none;
		}
	</style>

	<div class="tableLayer">
		<div class="logo">
			<img src="/src/img/logo.png" width="100%" />
		</div>
		<div class="section active" id="home">
			<div class="kv">
				<img src="/src/img/dance.png" width="100%" />
			</div>

			<div class="form">
				<h3>&nbsp;请正确填写联系方式，以便中奖后及时与您联系。</h3>
				<ul>
					<li>
						<div class="inputTextStyle phone">
							<input type="tel" maxlength="11" placeholder="手机号码">
						</div>
					</li>
					<li class="pact">
						<span><input type="checkbox" checked name="read" id="read" ></span><label for="read">我已阅读并同意相关</label><a href="javascript:;" class="rulesLink">活动与细则</a>
					</li>
					<li>
						<a href="javascript:;" class="btn" id="submit_btn"><i>提交</i></a>
					</li>
				</ul>
			</div>
		</div>
	</div>
	<?php
	}?>

	<div class="section" id="video">
	    <div class="videoArea">
	    	<div class="videoCon">
	    		<!-- <div class="vposter" style="opacity:0;">
	    			<span></span>
	    			<img src="/src/img/poster.jpg" width="100%" />
	    		</div> -->
	    		<div id="vplay"></div>
	    		<img src="/src/img/poster.jpg" width="100%" style="opacity:0;" />
	    	</div>
	    </div>

	    <div class="videoHotArea">
	    	<h3>
	    		<?php echo $ismy ? "6月16日至19日 上海中山公园龙之梦<br>你与iPhone 6s, Bests Solo2 无线蓝牙耳机等<br>丰厚奖品仅一步之遥<br>记得常来看看多少人赞了你哦" : "快帮好友点亮爱心<br>“赞”助TA的超值大礼<br><br>";?>	 
	    	</h3>
	    	
	    </div>

	    <div class="videoFoot">
    		<a href="javascript:;" class="<?php echo $ismy ? "hover" : "";?> <?php echo $isballot ? "disable" : "";?>" <?php echo $ismy ? "" : "id='dianzan'";?> ></a>
    		<span id="dznum">" <i><?php echo $ballot;?></i> "</span>
    	</div>

    	<div class="btnArea">
    		<?php if($ismy) {
	    	?>
    			<a href="javascript:;" class="btn w42" id="shareBtn"><i>分享</i></a>
    			<?php if($area == "nb") {
    				?>
    					<a href="javascript:;" class="btn w42" id="couponBtn"><i>查看优惠券</i></a>
	    			<?php
			    }?>
    		<?php
	    	} else {?>
    			<a href="javascript:;" class="btn opa0"><i>点赞</i></a>
	    	<?php
		    }?>
    	</div>

    	<a href="javascript:;" class="activeRules"><i>活动规则</i></a>

	</div>

</div>




<!-- popups-1 -->
<div class="popups" id="rules">
	<h2>活动与细则 <a href="javascript:;" class="close"></a></h2>
	<div class="popups_con">
		<div class="rulecon">
			<p>1. 本次活动由思环贸易（上海）有限公司（以下简称“ESPRIT”）于2016年6月16日至6月19日在上海中山公园龙之梦商场举行。</p>
			<p>2. 本次活动不要求参与者购买任何产品或支付额外费用。 </p>
			<p>3. 活动规则：</p>
			<blockquote>
			1)	在活动期间内，前往龙之梦商场中庭ESPRIT活动区，参与跳舞活动。<br>
			2)	参与者可以获得一张折扣券，仅可在当天于ESPRIT中山公园龙之梦门店内使用。<br>
			3)	参与者跳完舞蹈，用微信扫描活动区内的二维码，获得自己的跳舞片段。<br>
			4)	参与者分享跳舞片段至微信朋友圈，召集好友点赞，有机会获得奖品。
			</blockquote>
			<p>4. 活动参与者在扫描活动区域二维码并提供手机号码后，即表示已阅读并同意以下声明：</p>
			<blockquote>
			1)	如你未满13岁，请在18岁或以上成人的陪同下参与活动并领奖。<br>
			2)	详细奖品产生机制将会保密，并不得异议。<br>
			3)	知悉奖品种类后你可放弃领奖，但不能更换其他奖品及不予任何补偿。<br>
			4)	奖品设置可能随时被调整，ESPRIT保留最终决定权。<br>
			5)	奖品数量有限，先到先得，换完即止。 若所有奖品已全部兑换完毕，你将不另获补偿。<br>
			6)	所有奖品不可兑换现金或换成其他任何替代物品。<br>
			7)	ESPRIT 有权编辑、删除、复制、分享、展出和使用你的全部或部份舞蹈影片制造衍生作品, 用于市场推广, 刊登广告, 和宣传, 而无需提供任何金钱或其他赔偿。
			</blockquote>
			<p>5. 在参与游戏时, 你不应使用诽谤或暴力的言语, 或使用任何冒犯或淫亵的动作或对象。</p>
			<p>6. 在参与游戏前, 你应对自己的健康状况作出评估, 如你在参与游戏中途感到头晕或呼吸困难, 应停止跳舞。  Esprit 不会向你或第三者就参与游戏所引致的死亡, 或对人身或财物产生的伤害, 负责相关损失。</p>
			<p>7. 对于参与者因参加活动而遭遇的任何损害或损失，ESPRIT均不承担责任。同时，ESPRIT亦不负责因其他原因(如网络，电话，计算机，服务器等设备故障)而导致的无法参与、无法链接或无法查找到资料（无论是否与比赛有关）等后果的责任。</p>
			<p>8. ESPRIT将致力确保个人信息安全，所有Esprit收集的个人信息, 将予以保密及只作宣传之用，有关隐私政策，请参阅[<a href="http://www.ESPRIT.cn" target="_blank">www.ESPRIT.cn]</a>。</p>
			<p>9. 本活动中采用的跳舞游戏素材版权归Ubisoft所有。</p>
			<p>10. 本活动最终解释权由ESPRIT所有。</p>
			<h3>获奖规则</h3>
			<p>1. 本活动奖品根据用户分享至朋友圈的跳舞片段的点赞数排名来决定，出现并列排名的，将把最先达到排名的用户视为奖品获得者，点赞统计截止时间为2016年6月20日23点59分。</p>
			<p>2. ESPRIT拥有对于获奖者的最终决定权。</p>
			<p>3. 奖品设置</p>
			<blockquote>
			一等奖（共2名）：iPhone 6s 16G一部<br>
			二等奖（共2名）：Beats Solo2 无线蓝牙耳机一台<br>
			三等奖（共4名）：ESPRIT 腕表一块<br>
			四等奖（共21名）：ESPRIT GOODIE BAG（包含#ImPerfect手提袋、T恤、USB）<br>
			五等奖（共21名）：ESPRIT GOODIE BAG（包含#ImPerfect手提袋、旅行包、毛巾）<br>
			</blockquote>
			<p>4. 获奖者将由ESPRIT专员联络并安排奖品领取事宜。</p>
			<p>5. 若受货源或者其他不可抗力影响，领奖时间可能会相应推后，ESPRIT将会根据实际情况相应通知中奖者。</p>
		</div>
	</div>
</div>


<!-- popups-2 -->
<div class="popups" id="activeRulesLayer">
	<h2>活动规则 <a href="javascript:;" class="close"></a></h2>
	<div class="popups_con">
		<div class="rulecon">
			<p>
				分享跳舞片段至微信朋友圈，召集好友点赞，按照点赞数排名先后，即有机会获得丰厚奖品！
			</p>
			<h3>奖品设置</h3>
			<p>一等奖（共2名）：<br>iPhone 6s 16G一部</p>
			<p>二等奖（共2名）：<br>Beats Solo2 无线蓝牙耳机一台</p>
			<p>三等奖（共4名）：<br>ESPRIT 腕表一块</p>
			<p>四等奖（共21名）：<br>ESPRIT GOODIE BAG<br>（包含#ImPerfect手提袋、T恤、USB）</p>
			<p>五等奖（共21名）：<br>ESPRIT GOODIE BAG<br>（包含#ImPerfect手提袋、旅行包、毛巾）</p>
		</div>
	</div>
</div>



<?php if($area == "nb") {
	?>
		<!-- popups-3 -->
		<div class="popups" id="clayer">
			<h2>官网优惠券 <a href="javascript:;" class="close"></a></h2>
			<div class="popups_con">
				<div class="rulecon">
					<p>
						获得100元现金优惠礼券<br>
						asjhdfjajshdj<br>
						赶快前往ESPRIT官网选购初夏之礼吧！
					</p>
				</div>
			</div>
		</div>
	<?php
}?>



<!-- 横屏代码 -->
<div id="orientLayer" class="mod-orient-layer">
    <div class="mod-orient-layer__content">
        <i class="icon mod-orient-layer__icon-orient"></i>
        <div class="mod-orient-layer__desc">为了更好的体验，请使用竖屏浏览</div>
    </div>
</div>


</body>
</html>
