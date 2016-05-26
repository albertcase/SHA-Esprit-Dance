# 2.2 微信JS-SDK二次封装接口
---

##	webservice调用

API 接口: 

URL: http://domain.com/wechat/ws/jssdk/config/webservice

HTTP Methods: GET

Param:

	{
		url //（分享当前网页的URL，不包含#及其后面部分）
	}
	
示例：

	http://domain.com/wechat/ws/jssdk/config/webservice?url=http%3A%2F%2Fwww.share.com%2Ftest%2F%3Fid%3D100%26cc%3D123

Return JSON:

	{		"status": "1",		"data": {			"appId": "xxxxxxx",			"timestamp": "1421205886",			"nonceStr": "c9d9e558-87ad-451a-ae9f-9c02d53fef63",			"signature": "91F39B564ACB49838B355DEDAF3CE503E0294A93",		}	}error
	{
		"status": code
	}
code: 
	{
		0 //failed		101 //the url is invalid	}
	##	JS跨域调用

API 接口: 

URL: http://domain.com/wechat/ws/jssdk/config/js

HTTP Methods: GET

Param:

	{
		url //（分享当前网页的URL，不包含#及其后面部分）
	}

返回为一段JavaScript代码，代码如下：
	SignWeiXinJs(data);	data为json对象	
示例：

	var url = "http%3A%2F%2Fwww.share.com%2Ftest%2F%3Fid%3D100%26cc%3D123";//urlEncode后的参数
		$.getScript("http://domain.com/wechat/ws/jssdk/config/js?url=" + url);//异步加载
	function SignWeiXinJs(data){//回调函数		//将返回的json对象转成string输出		alert(JSON.stringify(data));	}
Return JSON:

	{		"status": "1",		"data": {			"appId": "xxxxxxx",			"timestamp": "1421205886",			"nonceStr": "c9d9e558-87ad-451a-ae9f-9c02d53fef63",			"signature": "91F39B564ACB49838B355DEDAF3CE503E0294A93"		}	}error
	{
		"status": code
	}
code: 
	{
		0 //failed		101 //the url is invalid	}

##	验证
需要第三方提供分享域名在iBlue方进行安全验证

示例：

	www.share.com