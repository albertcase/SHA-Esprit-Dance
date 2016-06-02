<?php
namespace Lib;
/**
 * DatabaseAPI class
 */
class DatabaseAPI {

	private $db;

	/**
	 * Initialize
	 */
	public function __construct(){
		$connect = new \mysqli(DBHOST, DBUSER, DBPASS, DBNAME);
		$this->db = $connect;
		$this->db->query('SET NAMES UTF8');
	}

	public function watchdog($type, $data){
		$nowtime = NOWTIME;
		$sql = "INSERT INTO `watchdog` SET `type` = ?, `data` = ?, `created` = ?"; 
		$res = $this->db->prepare($sql); 
		$res->bind_param("sss", $type, $data, $nowtime);
		if($res->execute()) 
			return $res->insert_id;
		else 
			return FALSE;
	}

	public function createFile($filename){
		$nowtime = NOWTIME;
		$sql = "INSERT INTO `file` SET `filename` = ?, `created` = ?"; 
		$res = $this->db->prepare($sql); 
		$res->bind_param("ss", $filename, $nowtime);
		if($res->execute()) 
			return $this->findFileByFid($res->insert_id);
		else 
			return FALSE;
	}

	public function findFileByFid($fid){
		$sql = "SELECT `fid`, `filename` FROM `file` WHERE `fid` = ?"; 
		$res = $this->db->prepare($sql);
		$res->bind_param("s", $fid);
		$res->execute();
		$res->bind_result($fid, $filename);
		if($res->fetch()) {
			$file = new \stdClass();
			$file->fid = $fid;
			$file->filename = $filename;
			return $file;
		}
		return NULL;
	}

	public function createVideo($file){
		$nowtime = NOWTIME;
		$id = md5($file->fid . $nowtime);
		$sql = "INSERT INTO `video` SET `fid` = ?, `status` = 0, `id` = ?, `created` = ?"; 
		$res = $this->db->prepare($sql); 
		$res->bind_param("sss", $file->fid, $id, $nowtime);
		if($res->execute()) 
			return $this->findVideoByVid($res->insert_id);
		else 
			return FALSE;
	}

	public function findVideoByVid($vid){
		$sql = "SELECT `vid`, `fid`, `id` FROM `video` WHERE `vid` = ?"; 
		$res = $this->db->prepare($sql);
		$res->bind_param("s", $vid);
		$res->execute();
		$res->bind_result($vid, $fid, $id);
		if($res->fetch()) {
			$video = new \stdClass();
			$video->vid = $vid;
			$video->fid = $fid;
			$video->id = $id;
			return $video;
		}
		return NULL;
	}

	public function findVideoById($id){
		$sql = "SELECT `vid`, `fid`, `id` FROM `video` WHERE `id` = ?"; 
		$res = $this->db->prepare($sql);
		$res->bind_param("s", $id);
		$res->execute();
		$res->bind_result($vid, $fid, $id);
		if($res->fetch()) {
			$video = new \stdClass();
			$video->vid = $vid;
			$video->fid = $fid;
			$video->id = $id;
			return $video;
		}
		return NULL;
	}

	public function updateVideo($file){
		$sql = "UPDATE `video` SET `status` = 1 WHERE `fid` = ?"; 
		$res = $this->db->prepare($sql); 
		$res->bind_param("s", $file->fid);
		if($res->execute()) 
			return $file;
		else 
			return FALSE;
	}

	public function getUserVideo($vid) {
		$sql = "SELECT uid FROM `user_video` WHERE `vid` = ?"; 
		$res = $this->db->prepare($sql);
		$res->bind_param("s", $vid);
		$res->execute();
		$res->bind_result($uid);
		if($res->fetch()) {
			return $uid;
		}
		return 0;
	}

	public function bindVideo($uid, $vid) {
		$sql = "INSERT INTO `user_video` SET `uid` = ?, `vid` = ?";
		$res = $this->db->prepare($sql); 
		$res->bind_param("ss", $uid, $vid);
		if ($res->execute()) {
			return TRUE;
		} else {
			return FALSE;
		}
	}

	public function insertUser($openid) {
		$user = $this->findUserByOpenid($openid);
		if ($user) {
			return $user;
		}
		$sql = "INSERT INTO `user` SET `openid` = ?";
		$res = $this->db->prepare($sql); 
		$res->bind_param("s", $openid);
		if ($res->execute()) {
			return $this->findUserByOpenid($openid);
		} else {
			return FALSE;
		}
	}

	public function findUserByOpenid($openid) {
		$sql = "SELECT `id`, `openid`, `mobile` FROM `user` WHERE `openid` = ?"; 
		$res = $this->db->prepare($sql);
		$res->bind_param("s", $openid);
		$res->execute();
		$res->bind_result($uid, $openid, $mobile);
		if($res->fetch()) {
			$user = new \stdClass();
			$user->uid = $uid;
			$user->openid = $openid;
			$user->mobile = $mobile;	
			$_SESSION['user'] = $user;	
			return $user;
		}
		return NULL;
	}

	public function userLoad(){
		if(isset($_SESSION['user'])){
			return $_SESSION['user'];
		}
		return NULL;
		
	}

	public function saveMobile($uid, $mobile) {
		$sql = "UPDATE `user` SET `mobile` = ? WHERE `id` = ?"; 
		$res = $this->db->prepare($sql);
		$res->bind_param("ss", $mobile, $uid);
		if ($res->execute()) {
			return TRUE;
		} else {
			return FALSE;
		}
	}

	public function ballot($uid, $vid) {
		$sql = "SELECT `id` FROM `ballot` WHERE `uid` = ? and `vid` = ?"; 
		$res = $this->db->prepare($sql);
		$res->bind_param("ss", $uid, $vid);
		$res->execute();
		$res->bind_result($id);
		if($res->fetch()) {
			return FALSE;
		}
		$sql = "INSERT INTO `ballot` SET `uid` = ?, `vid` = ?";
		$res = $this->db->prepare($sql); 
		$res->bind_param("ss", $uid, $vid);
		if ($res->execute()) {
			return TRUE;
		} else {
			return FALSE;
		}
	}

	public function getballot($vid) {
		$sql = "SELECT count(`id`) FROM `ballot` WHERE `vid` = ?"; 
		$res = $this->db->prepare($sql);
		$res->bind_param("s", $vid);
		$res->execute();
		$res->bind_result($num);
		if($res->fetch()) {
			return $num;
		}
		return 0;
	}
}
