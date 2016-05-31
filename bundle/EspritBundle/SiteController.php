<?php
namespace EspritBundle;

use Core\Controller;


class SiteController extends Controller {

	public function indexAction() {
		$this->render('index');
		exit;
	}

	public function videoAction($id) {
		$video = $DatabaseAPI->findVideoById($id);
		echo $video->fid;
		exit;
	}

}
