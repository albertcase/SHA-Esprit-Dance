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
			$this->watchdog('saveFile', json_encode($code));
			$this->dataPrint($code);
		}

		$this->generateQRCode($file);

		$this->dataPrint(array('success' => '1', 'msg' => 'success'));
	}

	public function generateQRCode($file) {
		$video_url = $this->generateFileURL($file);
		$page_url = $this->generatePageURL($file);
		$param = array(
			'video_url' => $video_url,
			'page_url' => $page_url,
			);
		$query = http_build_query($param);
		$url = QRG_HOST . 'index.php/Index/upload_is_done?' . $query;
		$re = json_decode(file_get_contents($url));
		if($re->success) {
			$DatabaseAPI = new \Lib\DatabaseAPI();
			$DatabaseAPI->updateVideo($fid);
		} else {
			$this->watchdog('generateQR', json_encode($re));
		}
		
	}

	public function generatePageURL($file) {
		$vid = md5($file->fid);
		$url = BASE_URL . '/vid/' . $vid;
		return $url;
	}

	public function generateFileURL($file) {
		$url = BASE_URL . '/files/' . $file->filename;
		return $url;
	}

	public function generateFileName() {
		$filename = time();
		$filename = "{$filename}.png";
		return $filename;
	}	
}