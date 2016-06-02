<?php

$routers = array();
$routers['/webservice/upload'] = array('EspritBundle\WebService', 'uploadFile');
$routers['/wechat/ws/test/%/aa/%'] = array('WechatBundle\Api', 'test');
$routers['/wechat/ws/oauth2'] = array('WechatBundle\WebService', 'oauth');
$routers['/wechat/ws/callback'] = array('WechatBundle\WebService', 'callback');
$routers['/wechat/ws/jssdk/config/webservice'] = array('WechatBundle\WebService', 'jssdkConfigWebService');
$routers['/wechat/ws/jssdk/config/js'] = array('WechatBundle\WebService', 'jssdkConfigJs');
$routers['/video/%'] = array('EspritBundle\Site', 'index');
$routers['/callback'] = array('EspritBundle\Site', 'callback');
$routers['/api/submit'] = array('EspritBundle\Api', 'submit');
$routers['/api/ballot'] = array('EspritBundle\Api', 'ballot');
//$routers['/'] = array('EspritBundle\Site', 'index');