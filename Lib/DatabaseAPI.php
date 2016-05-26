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
		$sql = "INSERT INTO `video` SET `fid` = ?, `status` = 0, `created` = ?"; 
		$res = $this->db->prepare($sql); 
		$res->bind_param("ss", $file->fid, $nowtime);
		if($res->execute()) 
			return $this->findVideoByVid($res->insert_id);
		else 
			return FALSE;
	}

	public function findVideoByVid($vid){
		$sql = "SELECT `vid`, `fid` FROM `video` WHERE `vid` = ?"; 
		$res = $this->db->prepare($sql);
		$res->bind_param("s", $vid);
		$res->execute();
		$res->bind_result($vid, $fid);
		if($res->fetch()) {
			$video = new \stdClass();
			$video->vid = $vid;
			$video->fid = $fid;
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
}
