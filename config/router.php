<?php

$routers = array();
$routers['/api'] = array('EspritBundle\Api', 'api');
$routers['/webservice/upload'] = array('EspritBundle\WebService', 'uploadFile');
$routers['/wechat/ws/test/%/aa/%'] = array('WechatBundle\Api', 'test');
$routers['/wechat/ws/oauth2'] = array('WechatBundle\WebService', 'oauth');
$routers['/wechat/ws/callback'] = array('WechatBundle\WebService', 'callback');
$routers['/wechat/ws/jssdk/config/webservice'] = array('WechatBundle\WebService', 'jssdkConfigWebService');
$routers['/wechat/ws/jssdk/config/js'] = array('WechatBundle\WebService', 'jssdkConfigJs');
$routers['/api/check'] = array('EspritBundle\Api', 'check');
$routers['/video/%'] = array('EspritBundle\Site', 'video');
$routers['/'] = array('EspritBundle\Site', 'index');