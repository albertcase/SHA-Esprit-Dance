<?php
namespace EspritBundle;

use Core\Controller;


class SiteController extends Controller {

	public function indexAction() {
		$this->render('index');
		exit;
	}

	public function videoAction($id) {
		$DatabaseAPI = new \Lib\DatabaseAPI();
		$video = $DatabaseAPI->findVideoById($id);
		var_dump($video);
		exit;
	}

}