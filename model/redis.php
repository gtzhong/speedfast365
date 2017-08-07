<?php
class Model_Redis extends Redis {
	protected static $_instance = null;
	public static function instance(){
		if(self::$_instance == null){
			self::$_instance = new self();
		   	self::$_instance->connect('127.0.0.1', 6379);
		}
		return self::$_instance;
	}

	public function session_set($session_id,array $member){

		$key = 'session_'.$session_id;

		$session = array();
		$session['member'] = $member;
		$session['dateline'] = time();

		$data = serialize($session);

		$this->set($key,$data);
		$expire = 86400 * 30;
		$this->expire($key,$expire);

	}

	public function session_update($session_id){
		
		$session = $this->session_get($session_id);

		$this->session_set($session_id,$session['member']);

	}

	public function session_get($session_id){
		$key = 'session_'.$session_id;
		$data = $this->get($key);
		return unserialize($data);
	}

	public function session_delete($session_id){
		$key = 'session_'.$session_id;
		return $this->del($key);
	}

	public function sync_member_id_to_ss_user_id(){

		$db = Db::instance();

		$list = $db->fetchAll("select id as member_id,ss_user_id from member where ss_user_id > 0");

		foreach($list as $k=>$v){
			$this->set("member_id_to_ss_user_id_{$v['member_id']}",$v['ss_user_id']);
		}

	}

	public function get_ss_user_id_by_member_id($member_id){
		
		return $this->get("member_id_to_ss_user_id_{$member_id}");	
		
	}

	public function sync_ss_user_id_to_user_row(){

		$db = Db::instance();

		$list = $db->fetchAll("select * from user");

		foreach($list as $k=>$v){
			$row = serialize($v);
			$this->set("ss_user_id_to_user_row_{$v['id']}",$row);
		}

	}

	public function get_user_row_by_ss_user_id($ss_user_id){
		$row = $this->get("ss_user_id_to_user_row_{$ss_user_id}");
		return unserialize($row);
	}

	public function sync_server_list(){

		$db = Db::instance();

		$list = $db->fetchAll("select * from server_data order by sort_num desc,id asc");

		$data = serialize($list);

		$this->set("server_list",$data);

	}

	public function get_server_list(){

		$data = $this->get("server_list");

		return unserialize($data);

	}
}
