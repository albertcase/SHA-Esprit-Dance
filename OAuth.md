# 2.2 网页授权调用文档
---
## 授权流程

####1. 第三方应用向iBlue授权地址统一带参数请求，参数内容包括：
#####授权完成后的调转地址redirect_uri（需要将redirect_uri后的参数进行UrlEncode,微信中打开有效）、网页授权类型scope（base或者userinfo）

API 接口: 

URL: http://domain.com/wechat/ws/oauth2

HTTP Methods: GET

Param:

	{
		redirect_uri
		scope
	}
	
示例：

	http://domain.com/wechat/ws/oauth2?redirect_uri=http%3A%2F%2Fwww.redirect.com%2Ftest%2F%3Fid%3D100%26cc%3D123&scope=snsapi_userinfo
		####2. iBlue调用成功后
#####如果scope=snsapi_base调用成功后会将参数openid=OPENID重定向至回调页面
#####如果scope=snsapi_userinfo调用成功后会将参数openid=OPENID,access_token=ACCESS_TOKEN重定向至回调页面

示例：scope=snsapi_base
 
	redirect_url:
	
	http://www.redirect.com/test/?openid=OPENID&id=100&cc=123

示例：scope=snsapi_userinfo
 
	redirect_url:
	
	http://www.redirect.com/test/?openid=OPENID&access_token=ACCESS_TOKEN&id=100&cc=123

error code: 	{
		0 //failed		101 //the url is invalid	}

###获取用户信息请求方法

API 接口: 

URL: https://api.weixin.qq.com/sns/userinfo

HTTP Methods: GET

Param:

	{
		access_token //网页授权接口调用凭证
		openid //用户的唯一标识
		lang //返回国家地区语言版本，zh_CN 简体，zh_TW 繁体，en 英语
	}
	
示例：

	https://api.weixin.qq.com/sns/userinfo?access_token=ACCESS_TOKEN&openid=OPENID&lang=zh_CN

Return JSON:

	{
	   "openid":" OPENID",
	   "nickname": NICKNAME,
	   "sex":"1",
	   "province":"PROVINCE"
	   "city":"CITY",
	   "country":"COUNTRY",
	   "headimgurl":"http://wx.qlogo.cn/mmopen/g3MonUZtNHkdmzicIlibx6iaFqAc56vxLSUfpb6n5WKSYVY0ChQKkiaJSgQ1dZuTOgvLLrhJbERQQ4eMsv84eavHiaiceqxibJxCfHe/46", 
	   "privilege":[
	   "PRIVILEGE1"
	   "PRIVILEGE2"
	   ]
	}
error:

	{"errcode":40003,"errmsg":" invalid openid "}##	验证
需要第三方提供授权域名在iBlue方进行安全验证
示例：

	www.redirect.com