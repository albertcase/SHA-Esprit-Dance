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
		
		$DatabaseAPI = new \Lib\DatabaseAPI();
		$video = $DatabaseAPI->findVideoById($id);
		$file = $DatabaseAPI->findFileByFid($video->fid);
		$this->render('video', array('url' => $file->filename, 'vid' => $video->vid));
		exit;
	}

}
