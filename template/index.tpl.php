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
			isSubmitForm = <?php echo $mobile;?>;
		var shareArr = {
			"_title": 'ESPRIT 测试标题', //分享标题
			"_desc": "ESPRIT 测试描述",    // 分享的描述
			"_link": window.location.href,    //分享的连接
			"_imgUrl": "http://" + window.location.host + "/vfile/img/share.jpg",   //分享的图片
			"_url": encodeURIComponent(window.location.href.split("#")[0]) //.replace('http%3A%2F%2F','')
		}
	</script>
	<script type="text/javascript" src="https://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
	<script data-main="/src/js/config" src="/src/js/require.js"></script>
	

</head>
<body>

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
	<img src="/src/img/logo.png" width="100%" class="logo" />

	<?php if($mobile) {
	?>
	<div class="tableLayer">
		<img src="/src/img/logo.png" width="100%" class="logo" />
		<div class="section active" id="home">
			<div class="kv">
				<img src="/src/img/kv.jpg" width="100%" />
			</div>

			<div class="form">
				<ul>
					<li>
						<div class="inputTextStyle phone w60">
							<input type="tel" maxlength="11" placeholder="手机号码">
						</div>
						<a href="javascript:;" class="btn w27" id="getCodes"><i>获取验证码</i></a>
					</li>
					<li>
						<div class="inputTextStyle lock">
							<input type="text" class="codesInput" maxlength="6" placeholder="验证码">
						</div>
					</li>
					<li>
						<a href="javascript:;" class="btn" id="submit_btn"><i>确 认</i></a>
					</li>
				</ul>
			</div>
		</div>
	</div>
	<?php
	}?>


	<div class="section" id="video">
		<h2>
			#Dance with Esprit# 
	    </h2>
	    <div class="videoArea">
	    	<div class="videoCon">
	    		<img src="/src/img/poster.jpg" width="100%" />
	    	</div>
	    	<div class="videoFoot">
	    		<a href="javascript:;" id="dznum"><?php echo $ballot;?></a>
	    	</div>
	    </div>
	    <?php if($ismy) {
	    ?>
	    <div class="videoHotArea">
	    	<h3>
	    		邀请好友点亮爱心<br>
				“赞”助我的超值大礼
	    	</h3>
	    	<a href="javascript:;" class="btn w50"><i>分 享</i></a>
	    </div>
	    <?php
	    } else {?>

	    <div class="videoHotArea">
	    	<h3>
	    		快帮好友点亮爱心<br>
				“赞”助TA的超值大礼
	    	</h3>
	    	<a href="javascript:;" class="btn w50" id="dianzan <?php echo $isballot ? "disable" : "";?>"><i>点 赞</i></a>
	    </div>
	    <?php
	    }?>
	</div>



</div>


<!-- 横屏代码 -->
<div id="orientLayer" class="mod-orient-layer">
    <div class="mod-orient-layer__content">
        <i class="icon mod-orient-layer__icon-orient"></i>
        <div class="mod-orient-layer__desc">为了更好的体验，请使用竖屏浏览</div>
    </div>
</div>


</body>
</html>
