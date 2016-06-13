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
		$ballot = $DatabaseAPI->getballot($video->vid);
		$isballot = $DatabaseAPI->isballot($user->uid, $video->vid);
		$user_video = $DatabaseAPI->getUserVideo($video->vid);
		$mobile = 0;
		$ismy = 0;
		if ($user->mobile == '') {
			$mobile = 1;
		}
		if (!$user_video) {
			//未绑定 直接绑定
			$ismy = 1;
			$DatabaseAPI->bindVideo($user->uid, $video->vid);
			$this->render('index', array('url' => $file->filename, 'vid' => $video->vid , 'mobile' => $mobile, 'isballot' => $isballot, 'ballot' => $ballot, 'ismy' => $ismy));
			exit;
		}
		//已绑定
		if ($user->uid == $user_video) {
			$ismy = 1;	
		}
		$this->render('index', array('url' => $file->filename, 'vid' => $video->vid , 'mobile' => $mobile, 'isballot' => $isballot, 'ballot' => $ballot, 'ismy' => $ismy));
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
		$request->validation($fields);
		$openid = $request->query->get('openid');
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
