<?php
namespace EspritBundle;

use Core\Controller;


class SiteController extends Controller {

	public function indexAction($id) {
		// $DatabaseAPI = new \Lib\DatabaseAPI();
		// $user = $DatabaseAPI->userLoad();
		// if (!$user) {
		// 	$parameterAry = $_GET;
		// 	if(count($parameterAry)>0)
		// 		$url = "/video/". $id . "?" . http_build_query($parameterAry);
		// 	else
		// 		$url = "/video/". $id;
		// 	$_SESSION['redirect_url'] = $url;
		// 	$this->redirect("http://espritdance.samesamechina.com/wechat/ws/oauth2?redirect_uri=http://espritdance.samesamechina.com/callback&scope=snsapi_base");
		// 	exit;
		// }
		echo $id;exit;
		$DatabaseAPI = new \Lib\DatabaseAPI();
		$user = $DatabaseAPI->userLoad();
		$parameterAry = $_GET;
		if(count($parameterAry)>0)
			$url = "/video/". $id . "?" . http_build_query($parameterAry);
		else
			$url = "/video/". $id;
		if (!$user) {	
			//$_SESSION['redirect_url'] = $url;
			$this->redirect("/wechat/ws/oauth2?redirect_uri=".urlencode("http://espritdance.samesamechina.com/callback?callback=".$url). "&scope=snsapi_base");
		}
		$video = $DatabaseAPI->findVideoById($id);
		echo $rs = $DatabaseAPI->bindVideo($user->uid, $video->vid);exit;
		$this->redirect("/show/" . $rs);
		}

	public function showAction($id) {
		echo $id;exit;
		$file = $DatabaseAPI->findFileByFid($video->fid);
		$ballot = $video->ballot;
		$isballot = $DatabaseAPI->isballot($user->uid, $video->vid);
		$user_video = $DatabaseAPI->getUserVideo($video->vid);
		$mobile = 0;
		$info = $DatabaseAPI->findUserByOpenid($user->openid);
		if (!$user_video) {
			//未绑定 直接绑定
			$DatabaseAPI->bindVideo($user->uid, $video->vid);
			$ismy = 1;
			if ($info->mobile == '') {
				$mobile = 1;
			}
			$this->render('index', array('shareurl' => 'http://espritdance.samesamechina.com/show/'.$id, 'url' => $file->filename, 'vid' => $video->vid , 'mobile' => $mobile, 'isballot' => $isballot, 'ballot' => $ballot, 'ismy' => $ismy));
		}
		//已绑定	
		if ($user->uid == $user_video) {
			$ismy = 1;
			if ($info->mobile == '') {
				$mobile = 1;
			}
		} else {
			$ismy = 0;
		}
		$this->render('index', array('shareurl' => 'http://espritdance.samesamechina.com' . $url, 'url' => $file->filename, 'vid' => $video->vid , 'mobile' => $mobile, 'isballot' => $isballot, 'ballot' => $ballot, 'ismy' => $ismy));
	
	}

	public function testAction($id) {
		$DatabaseAPI = new \Lib\DatabaseAPI();
		$user = $DatabaseAPI->userLoad();
		if (!$user) {
			$parameterAry = $_GET;
			if(count($parameterAry)>0)
				$url = "/video/". $id . "?" . http_build_query($parameterAry);
			else
				$url = "/video/". $id;
			//$_SESSION['redirect_url'] = $url;
			$this->redirect("/wechat/ws/oauth2?redirect_uri=".urlencode("http://espritdance.samesamechina.com/callback2?callback=".$url). "&scope=snsapi_base");
		}
		$video = $DatabaseAPI->findVideoById($id);
		$file = $DatabaseAPI->findFileByFid($video->fid);
		$ballot = $video->ballot;
		$isballot = $DatabaseAPI->isballot($user->uid, $video->vid);
		$user_video = $DatabaseAPI->getUserVideo($video->vid);
		$mobile = 0;
		if (!$user_video) {
			//未绑定 直接绑定
			$DatabaseAPI->bindVideo($user->uid, $video->vid);
			$ismy = 1;
			if ($user->mobile == '') {
				$mobile = 1;
			}
			$this->render('index', array('url' => $file->filename, 'vid' => $video->vid , 'mobile' => $mobile, 'isballot' => $isballot, 'ballot' => $ballot, 'ismy' => $ismy));
		}
		//已绑定	
		if ($user->uid == $user_video) {
			$ismy = 1;
			if ($user->mobile == '') {
				$mobile = 1;
			}
		} else {
			$ismy = 0;
		}
		$this->render('index', array('url' => $file->filename, 'vid' => $video->vid , 'mobile' => $mobile, 'isballot' => $isballot, 'ballot' => $ballot, 'ismy' => $ismy));
	}

	public function videoAction($id) {

		$this->render('video', array('url' => $file->filename, 'vid' => $video->vid));
	}

	public function callbackAction() {	
		// $request = $this->Request();
		// $fields = array(
		// 	'openid' => array('notnull', '110'),
		// );
		// $request->validation($fields);
		// $openid = $request->query->get('openid');
		// $DatabaseAPI = new \Lib\DatabaseAPI();
		// $DatabaseAPI->insertUser($openid);
		// if (!isset($_SESSION['redirect_url'])) {
		// 	$this->redirect('/');
		// 	exit;
		// }
		// $this->redirect($_SESSION['redirect_url']);
		// exit;
		$request = $this->Request();
		$fields = array(
			'openid' => array('notnull', '110'),
		);
		$request->validation($fields);
		$openid = $request->query->get('openid');
		$callback = $request->query->get('callback');
		$DatabaseAPI = new \Lib\DatabaseAPI();
		$DatabaseAPI->insertUser($openid);
		$this->redirect($callback);
	}

	public function callback2Action() {	
		$request = $this->Request();
		$fields = array(
			'openid' => array('notnull', '110'),
		);
		$request->validation($fields);
		$openid = $request->query->get('openid');
		$callback = $request->query->get('callback');
		$DatabaseAPI = new \Lib\DatabaseAPI();
		$DatabaseAPI->insertUser($openid);
		$this->redirect($callback);
	}

}
