<?php
namespace EspritBundle;

use Core\Controller;


class ApiController extends Controller {
	
	public function apiAction() {
		$url = "http://127.0.0.1/webservice/upload";
		$ch = curl_init();

		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, file_get_contents('getheadimg.jpeg'));

		echo $data = curl_exec($ch);
		curl_close($ch);
		exit;
	}

}
