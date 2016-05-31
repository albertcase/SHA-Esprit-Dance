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

	<link rel="stylesheet" type="text/css" href="src/style/reset.css">
	<script data-main="src/js/config" src="src/js/require.js"></script>
	

</head>
<body>

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
	<img src="src/img/logo.png" width="100%" class="logo" />

	<div class="section" id="home">
		<div class="kv">
			<img src="src/img/kv.jpg" width="100%" />
		</div>

		<div class="form">
			<ul>
				<li>
					<div class="inputTextStyle phone w60">
						<input type="tel" maxlength="11" placeholder="手机号码">
					</div>
					<a href="javascript:;" class="btn w27"><i>获取验证码</i></a>
				</li>
				<li>
					<div class="inputTextStyle lock">
						<input type="text" placeholder="验证码">
					</div>
				</li>
			</ul>
		</div>
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
