<?php
namespace EspritBundle;

use Core\Controller;


class ApiController extends Controller {
	
	public function submitAction() {
		$DatabaseAPI = new \Lib\DatabaseAPI();
		$user = $DatabaseAPI->userLoad();
		if (!$user) {
			return $this->statusPrint(0, '未登录');
		}
		$request = $this->Request();
		$fields = array(
			'mobile' => array('mobile', '110'),
		);
		$request->validation($fields);
		$mobile = $request->query->get('mobile');
		$DatabaseAPI->saveMobile($user->uid, $mobile);
		$user->mobile = $mobile;
		$_SESSION['user'] = $user;
		return $this->statusPrint(1, '提交成功');
	}

	public function ballotAction() {
		$DatabaseAPI = new \Lib\DatabaseAPI();
		$user = $DatabaseAPI->userLoad();
		if (!$user) {
			return $this->statusPrint(0, '未登录');
		}
		$request = $this->Request();
		$fields = array(
			'id' => array('notnull', '110'),
		);
		$request->validation($fields);
		$id = $request->query->get('id');
		$rs = $DatabaseAPI->ballot($user->uid, $id);
		if ($rs) {
			return $this->statusPrint(1, '提交成功');
		}
		return $this->statusPrint(2, '已经投过票了');
	}

}
