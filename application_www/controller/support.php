<?php

class Controller_support extends Action {

	public function init(){

		
		redirect_domain_name_stable();

		record_refer_before_um();	

		if(!empty($_GET['um'])){
			$um = $_GET['um'];
			setcookie('um',$um,time()+86400*15,'/');
		}
		
		$this->title = '帮助支持-Speedfast365';

	}

	public function action_index(){
		
		$this->render();
	}

	public function action_start(){

		$this->render();

	}

	public function action_download(){

		$this->title = '下载-Speedfast365';

		$this->render();
	}	


	public function action_faq(){
		
		$this->title = 'FAQ常见问题-Speedfast365';

		$this->render();
	}	

	public function action_help(){

		if(!empty($_GET['type']) && $_GET['type'] == 'windows'){
			//$this->title = "Shadowsocks Windows客户端使用说明图片教程";
		}
		$this->render();
	}	

	public function action_service(){
		
		$this->title = '服务条款-Speedfast365';

		$this->render();
	}	

	public function action_notice(){
		$this->render();
	}

}
