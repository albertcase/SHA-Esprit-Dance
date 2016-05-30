<?php
namespace EspritBundle;

use Core\Controller;

class WebServiceController extends Controller {
	
	public function uploadFileAction() {
		$FileAPI = new \Lib\FileAPI(FILE_PATH);
		$postStr = file_get_contents("php://input");
		if(!$postStr) {
			$code = array('success' => '0', 'error_code' => '11', 'error_msg' => 'post data is empty');
			$this->watchdog('uploadFile', json_encode($code));
			$this->dataPrint($code);
		}
		$data = $postStr;
		$filename = $this->generateFileName();
		$file = $FileAPI->createFile($filename, $data);
		
		if(!$file) {
			$code = array('success' => '0', 'error_code' => '12', 'error_msg' => 'failed to create file');
			$this->watchdog('saveFile', json_encode($code, JSON_UNESCAPED_UNICODE));
			$this->dataPrint($code);
		}

		$this->generateQRCode($file);

		$this->dataPrint(array('success' => '1', 'msg' => 'success'));
	}

	public function generateQRCode($file) {
		$DatabaseAPI = new \Lib\DatabaseAPI();
		$video = $DatabaseAPI->createVideo($file);
		$video_url = $this->generateVideoURL($video->fid);
		$page_url = $this->generatePageURL($video->id);
		$param = array(
			'video_url' => $video_url,
			'page_url' => $page_url,
			);
		var_dump($param);exit;
		$query = http_build_query($param);
		$url = QRG_HOST . 'index.php/Index/upload_is_done?' . $query;
		$re = json_decode(file_get_contents($url));
		if($re->success) {
			// $this->watchdog('generateQR', json_encode($re, JSON_UNESCAPED_UNICODE));
			$DatabaseAPI = new \Lib\DatabaseAPI();
			$DatabaseAPI->updateVideo($file);
		} else {
			$this->watchdog('generateQR', json_encode($re, JSON_UNESCAPED_UNICODE));
		}
		
	}

	public function generatePageURL($id) {
		$url = BASE_URL . 'video/' . $id;
		return $url;
	}

	public function generateVideoURL($fid) {
		$DatabaseAPI = new \Lib\DatabaseAPI();
		$file = $DatabaseAPI->findFileByFid($fid);
		$url = BASE_URL . 'files/' . $file->filename;
		return $url;
	}

	public function generateFileName() {
		$filename = time();
		$filename = "{$filename}.mp4";
		return $filename;
	}	
}