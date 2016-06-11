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
			"_desc": "#DanceWithEsprit#",    // 分享朋友圈的描述
			"_desc_friend": "以舞蹈演绎#ImPerfect#， 展现你与众不同的魅力！",    // 分享好友的描述
			"_link": window.location.href,    //分享的连接
			"_imgUrl": "http://" + window.location.host + "/vfile/img/share.jpg",   //分享的图片
			"_url": encodeURIComponent(window.location.href.split("#")[0]) //.replace('http%3A%2F%2F','')
		}

		<?php
			$area = "sh";
		?>
	</script>

	<script type="text/javascript" src="https://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
	<script data-main="/src/js/config" src="/src/js/require.js"></script>
	

</head>
<body>

<div class="shareTips"></div>

<!-- http://192.168.8.115:9201/video/d12349534fde6881200427840cf2d6fd -->

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
	    		<div class="vposter">
	    			<span></span>
	    			<img src="/src/img/poster.jpg" width="100%" />
	    		</div>
	    		<div id="vplay"></div>
	    	</div>
	    </div>

	    <div class="videoHotArea">
	    	<h3>
	    		<?php echo $ismy ? "你与IPhone 6s, Beats耳机等<br>丰厚奖品仅一步之遥<br>记得常来看看多少人赞了你哦" : "快帮好友点亮爱心<br>“赞”助TA的超值大礼<br><br>";?>	 
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
			<p>参与本活动无需以购买ESPRIT产品或服务为前提。购买我们的产品或服务并不会增加你在本次活动中的获胜机会。本次活动最终解释权归ESPRIT（上海）有限公司所有。</p>

			<p>1. 参与资格: 任何中国公民均有资格参与ESPRIT（以下简称本活动）。本次活动将严格遵守中华人民共和国的相关法律及法规。参与本活动表示你同意无条件完全遵守本活动细则以及活动主办方的相关决定。</p>

			<p>2. 活动主办方: ESPRIT（上海）有限公司</p>

			<p>3. 活动时间: 本活动日期由北京时间2016年6月16日至2016年6月19日，活动主办方的电脑时间为本次活动的官方时间标准。</p>

			<p>4. 怎样参与本次活动: 在活动期间，所有添加蔻驰官方微信账号的用户，根据账号内指引进行活动提交，主办方随机给到1元和5.2元不等的微信红包一份，并通过蔻驰官方微信账号通知用户领取红包。微信红包数量有限，先到先得，领完即止。活动主办方有义务在活动期间保证活动功能可被正常使用。</p>

			<p>5. 获奖者的认证: 所有的活动参与者都必须满足活动细则中的所有条款。获取奖品的先决条件是必须完成所有相关的任务。主办方不会接受截图或者其他的证据来验证获奖资格。在活动期间，如果在系统出现问题时产生的结果是不会被视作有效的。活动主办方在法律允许范围内负责制定、解释、修改并及时公布本次活动的规则，并最终确定获奖者。</p>

			<p>6. 奖品: 蔻驰提供的现金红包1元或5.2元现金红包。</p>

			<p>7. 活动信息公告: 在符合法律相关规定的情况下，获奖者必须同意活动主办方在媒体上披露获奖者的姓名，微信头像与信息，语音，意见，身份信息和居住城市，主办方并不需要为此再支付额外费用或另行通知。活动主办方有权依据相关法律法规或业务需要，中止或取消此次活动或者修改活动方案，经相关途径公告后生效。</p>

			<p>8. 一般性条款: 如果发现欺诈，或者技术事故，或者由超出活动主办方能力控制的影响活动公正性的情况发生，活动主办方保留单方面取消或者变更本活动的相关权利。如果发生类似情况，活动主办方保留随机发送奖品給予事故发生前活动参赛者的权利。活动主办方同时保留在参赛者违反公平性原则或者利用不当行为获利的情况下单方面取消参赛者资格的权利。活动主办方保留采取法律手段追诉对于蓄意破坏和攻击活动网站的人的权利并可能要求相关赔偿。</p>

			<p>9. 豁免条款: 参与本次活动的参赛者不得采用任何直接或者间接的方式沟通或者伤害任何蔻驰贸易（上海）有限公司及其合作伙伴及和本次活动有关的任何相关公司的雇员。</p>

			<p>10. 相关责任: 活动主办方不对以下情况负责：</p>
			<blockquote>
			1.由媒体提供的关于本次活动的任何不准确或者不精确的信息<br>
			2.任何形式的技术故障，包括软硬件的损坏或者网络问题<br>
			3.对于本次活动的人为的恶意破坏<br>
			4.技术或人为的监管问题<br>
			5.因为参加本次活动直接或间接而产生的人身伤害。<br>
			6.如果因为技术或者收到恶意攻击等原因导致实际获奖者总人数超过事先公布的人数，活动主办方保留从中按照事先公布的获奖总数从中随机抽取的权利。<br>
			7.由于技术问题包括但不仅限于微信软件系统问题而产生的现金红包无法使用的问题。<br>
			8.用户对于该金额的支配和使用而产生的相关问题。
			</blockquote>
			
		</div>
	</div>
</div>


<!-- popups-2 -->
<div class="popups" id="activeRulesLayer">
	<h2>活动规则 <a href="javascript:;" class="close"></a></h2>
	<div class="popups_con">
		<div class="rulecon">
			<p>
				活动时间：6月16日-6月19日<br>
				邀请好友进入活动页面点击视频下方爱心<br>
				惊喜大礼等着你！
			</p>
			<p>
				集满XX个爱心<br>
				即可获得三等奖XXXXXXXXXXX<br>
				集满XX个爱心<br>
				即可获得二等奖XXXXXXXXXXX<br>
				集满XX个爱心<br>
				即可获得一等奖XXXXXXXXXXX
			</p>
			<p>
				（例：获得大于等于XX个爱心可兑换<br>
				二等奖或三等奖产品。）
			</p>
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
