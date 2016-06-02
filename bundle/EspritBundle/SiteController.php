<?php
namespace EspritBundle;

use Core\Controller;


class SiteController extends Controller {

	public function indexAction($id) {
		$DatabaseAPI = new \Lib\DatabaseAPI();
		$video = $DatabaseAPI->findVideoById($id);
		$file = $DatabaseAPI->findFileByFid($video->fid);

		$this->render('index', array('url' => $file->filename, 'vid' => $video->vid , 'ismy' => 1));
		exit;
	}

	public function videoAction($id) {
		$UserAPI = new \Lib\UserAPI();
		$user = $UserAPI->userLoad(true);
		if (!$user) {
			$parameterAry = $_GET;
			if(count($parameterAry)>0)
				$url = "/video/". $id . "?" . http_build_query($parameterAry);
			else
				$url = "/video/". $id;
			$_SESSION['redirect_url'] = $url;
			$this->redirect("http://espritdance.samesamechina.com/wechat/ws/oauth2?redirect_uri=http://espritdance.samesamechina.com/callback&scope=snsapi_base");
			exit;
		}
		$DatabaseAPI = new \Lib\DatabaseAPI();
		$video = $DatabaseAPI->findVideoById($id);
		$file = $DatabaseAPI->findFileByFid($video->fid);
		$this->render('video', array('url' => $file->filename, 'vid' => $video->vid));
		exit;
	}

	public function callbackAction() {	
		$request = $this->Request();
		$fields = array(
			'openid' => array('notnull', '110'),
		);
		$request->validation($fields);
		echo $openid = $request->query->get('openid');exit;
		$DatabaseAPI = new \Lib\DatabaseAPI();
		$param['redirect_uri'] = $redirect_uri;
		exit;
	}

}
