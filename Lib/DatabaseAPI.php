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
	}

	public function watchdog($type, $data){
		$nowtime = NOWTIME;
		$sql = "INSERT INTO `watchdog` SET `type` = ?, `data` = ?, `created` = ?"; 
		$res = $this->db->prepare($sql); 
		$res->bind_param("sss", $type, $data);
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
			return findFileByFid($res->insert_id);
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
			$file = new stdClass();
			$user->fid = $fid;
			$user->filename = $filename;
			return $file;
		}
		return NULL;
	}

	public function createVideo($fid){
		$nowtime = NOWTIME;
		$sql = "INSERT INTO `video` SET `fid` = ?, `status` = ?, `created` = ?"; 
		$res = $this->db->prepare($sql); 
		$res->bind_param("sss", $fid, 0, $nowtime);
		if($res->execute()) 
			return $res->insert_id;
		else 
			return FALSE;
	}

	public function updateVideo($fid){
		$sql = "UPDATE `video` SET `status` = ? WHERE `fid` = ?"; 
		$res = $this->db->prepare($sql); 
		$res->bind_param("ss", 1, $fid);
		if($res->execute()) 
			return $fid;
		else 
			return FALSE;
	}
}
