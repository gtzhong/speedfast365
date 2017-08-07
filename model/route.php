<?php

class Model_Route {
	protected static $_instance = null;
	public static function instance(){
		if(self::$_instance == null){
			self::$_instance = new self();
		}
		return self::$_instance;
	}

	public static function url(){

	}

	public static function get($uri){

		global $_route;
		$return = array();
		foreach($_route as $v){
		
			$has_params = preg_match_all('/\<(.*?)\>/',$v['url'],$m);
	
			$pattern = str_replace(array('?','(',')'),array('\?','(:?','){0,1}'),$v['url']);

			if($has_params){
				$param_keys = $m[1];
				foreach($param_keys as $p_k){
					$p_t = $v['params']['pattern']["{$p_k}"];
					$s_p = "(?P<{$p_k}>{$p_t}?)";
					$pattern = str_replace("<{$p_k}>",$s_p,$pattern);
				}
			}

			$pattern = str_replace(array('/','.'),array('\\/','\\.'),$pattern);

			$uri = preg_replace('/\?.*?$/','',$uri);
		
			$is_match = preg_match('/^'.$pattern.'$/',$uri,$matches);

			if($is_match){
				$return['controller'] = $v['controller']; 		
				$return['action'] = $v['action'];
				if(isset($v['params'])){
					foreach($v['params']['default'] as $p_k => $p_v){
						if(isset($matches["{$p_k}"])){
							$return['params']["{$p_k}"] = $matches["{$p_k}"];
						}
						else{
							$return['params']["{$p_k}"] = $p_v;
						}
					}
				}
				if(isset($v['html'])){
					$return['html'] = $v['html'];
				}
				break;
			}
		}
		
		return $return;

	}
}
