<?php
namespace EspritBundle;

use Core\Controller;

class WebServiceController extends Controller {
	
	public function uploadFileAction() {
		$FileAPI = new \Lib\FileAPI(FILE_PATH);
		$postStr = file_get_contents("php://input");
		$data = base64_decode($postStr);
		$filename = $this->generateFileName();
		$FileAPI->createFile($filename, $data);
	}

	public function generateFileName() {
		$filename = time();
		$filename = "{$filename}.png";
		return $filename;
	}	
}