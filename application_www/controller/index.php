<?php

class Controller_index extends Action {

	public function init(){
	
	}

	public function action_index(){

		redirect_domain_name_stable();

		record_refer_before_um();	
		
		if(!empty($_GET['um'])){
			$um = $_GET['um'];
			setcookie('um',$um,time()+86400*15,'/');
		}

		if(!empty($_GET['inviter'])){
			setcookie('inviter_email',$_GET['inviter'],time()+604800,'/');
		}


		if(!empty($_GET['f'])){
			if($_GET['f']){
				$f = $_GET['f'];
				$f = intval($f);
				setcookie('f',$f,time()+604800,'/');
				header('location:/');
				die();
			}
		}

		$this->render();

	}

	public function action_status(){

		$db = Db::instance();

		$time = time();
	
		$custmer_no = $db->fetchOne("select count(*) from user where expire_dateline > {$time} and enable = 1");

		echo "<pre>\nstatus:{$custmer_no}\n</pre>";

		die();	

	}
}
