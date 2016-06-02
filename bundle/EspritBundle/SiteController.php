<?php
namespace EspritBundle;

use Core\Controller;


class SiteController extends Controller {

	public function indexAction($id) {
		$DatabaseAPI = new \Lib\DatabaseAPI();
		$user = $DatabaseAPI->userLoad();
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
		$video = $DatabaseAPI->findVideoById($id);
		$file = $DatabaseAPI->findFileByFid($video->fid);

		$this->render('index', array('url' => $file->filename, 'vid' => $video->vid , 'ismy' => 1));
		exit;
	}

	public function videoAction($id) {

		$this->render('video', array('url' => $file->filename, 'vid' => $video->vid));
		exit;
	}

	public function callbackAction() {	
		$request = $this->Request();
		$fields = array(
			'openid' => array('notnull', '110'),
		);
		echo $openid;exit;
		$request->validation($fields);
		$DatabaseAPI = new \Lib\DatabaseAPI();
		$DatabaseAPI->insertUser($openid);
		if (!isset($_SESSION['redirect_url'])) {
			$this->redirect('/');
			exit;
		}
		$this->redirect($_SESSION['redirect_url']);
		exit;
	}

}
