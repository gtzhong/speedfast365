<?php
function _Error_404(){
	header ( "HTTP/1.0 404 Not Found" );
	exit;
}

function _Exception($str){
	echo $str;
}

function __autoload($class_name){
	$class_name = strtolower($class_name);
	$file = str_replace("_","/",$class_name);
	$class_file = ROOT_PATH . "/{$file}.php";
	if(file_exists($class_file)){
		require $class_file;
	}
}

function _print_r($value){
	echo "<pre>";
	print_r($value);
	echo "</pre>";
	die();
}

function is_mobile(){
	$agent = $_SERVER['HTTP_USER_AGENT'];
	if(strpos($agent,"NetFront") || strpos($agent,"iPhone") || strpos($agent,"MIDP-2.0") || strpos($agent,"Opera Mini") || strpos($agent,"UCWEB") || strpos($agent,"Android") || strpos($agent,"Windows CE") || strpos($agent,"SymbianOS")){
		return true;
	}
	else{
		return false;
	}

}
		
function record_refer_before_um(){
	if(!empty($_SERVER['HTTP_REFERER'])){
		$refer = $_SERVER['HTTP_REFERER'];
		if(preg_match('/baidu\.com/',$refer)){
			$GLOBALS['_GET']['um'] = 1265534;
		}
	}
}

function redirect_domain_name_stable(){

	$http_host = $_SERVER['HTTP_HOST'];

	if(!empty($_SERVER['REQUEST_URI'])){
		$request_uri = $_SERVER['REQUEST_URI'];
	}
	else{
		$request_uri = '';
	}
	
	if($_SERVER['REQUEST_SCHEME'] != 'https'){
		header("location:https://{$http_host}{$request_uri}");die();
	}
	
	
	//功能解释：不在domain_name_out_stable里面的域名，会自动跳转到domain_name_cn
	global $domain_name_cn;
	global $domain_name_out_stable;
	//以上两个变量在config.php中设置
	
	if(!in_array($http_host,$domain_name_out_stable)){
		header("location:https://{$domain_name_cn}{$request_uri}");die();
	}

}

function _get($key){
	if(isset($GLOBALS['_SGLOBAL']['params'][$key])){
		return $GLOBALS['_SGLOBAL']['params'][$key];
	}
	else{
		return null;
	}
}
function genRandomString($len) 
{ 
    $chars = array( 
        "a", "b", "c", "d", "e", "f", "g", "h", "i", "j", "k",  
        "l", "m", "n", "o", "p", "q", "r", "s", "t", "u", "v",  
        "w", "x", "y", "z" 
    ); 
    $charsLen = count($chars) - 1; 
 
    shuffle($chars);    // 将数组打乱 
     
    $output = ""; 
    for ($i=0; $i<$len; $i++) 
    { 
        $output .= $chars[mt_rand(0, $charsLen)]; 
    } 
 
    return $output; 
 
}

function utf8_unicode($c,$charset="utf-8") {
	if($charset!="utf-8"){
	$c = iconv($charset,"utf-8",$c);
	}
	switch(strlen($c)) {
	case 1:
	return ord($c);
	case 2:
	$n = (ord($c[0]) & 0x3f) << 6;
	$n += ord($c[1]) & 0x3f;
	return $n;
	case 3:
	$n = (ord($c[0]) & 0x1f) << 12;
	$n += (ord($c[1]) & 0x3f) << 6;
	$n += ord($c[2]) & 0x3f;
	return $n;
	case 4:
	$n = (ord($c[0]) & 0x0f) << 18;
	$n += (ord($c[1]) & 0x3f) << 12;
	$n += (ord($c[2]) & 0x3f) << 6;
	$n += ord($c[3]) & 0x3f;
	return $n;
	}
}

function gb_substr($str,$start=0,$len=-1)
{
	$enCount = 0;
	$strLen = strlen($str);
	$len *= 2;
	if($len<0) $len = $strLen;
	$strLen = ($len>$strLen)?$strLen:$len;
	for($i=0;$i<$strLen;$i++)
	if(ord(substr($str,$i,1))<0xa1) $enCount++;
	$len = ($len % 2 != 0)?++$len:$len; //$len 必须为偶数
	if($enCount % 2 == 0)
	$re_str = substr($str,$start,$len);
	else
	$re_str = substr($str,$start,$len-1);
	return $re_str;
}


function _in_time_extent($t1,$t2,$time=null){
	$t1 = strtotime($t1);
	$t2 = strtotime($t2);
	if($time == null){
		$time = time();
	}
	if(!is_numeric($time)){
		$time = strtotime($time);
	}
	return _in_day_extent($t1,$t2,$time);
}

function _in_day_extent($t1,$t2,$time){
	$time_origin = strtotime(date('Y-m-d',$time));
	$time_origin_tomorrow = $time_origin + 86400;
	if($t1 > $t2){
		return (($time > $time_origin) && ($time < $t2)) || (($time > $t1) && ($time < $time_origin_tomorrow));
	}
	elseif($t1 < $t2){
		return (($time > $t1) && ($time < $t2));
	}
	else{
		return false;
	}
}

function bytes2human($total_traffic){
	$G = floor($total_traffic / 1024 / 1024 / 1024);
	$M = floor(($total_traffic % (1024 * 1024 * 1024)) / 1024 / 1024);
	$K = floor(($total_traffic % (1024 * 1024)) / 1024);
	return "{$G}GB {$M}MB {$K}KB";
}


/**
* 替换JSON方法
*/
if (!function_exists("json_encode")) {
   include_once("JSON.php");
 
   function json_encode($array) {
       $json = new Services_JSON();
       $json_array = $json->encode($array);
       return $json_array;
   }
 
   /**
    * 解析JSON数据
    * @param string $json_data 需要解析的JSON数据                                                      
    * @param bool $toarray 是否需要解析成数组                                      
    * @return array 返回解析后的数组
    */
   function json_decode($json_data, $toarray = TRUE) {
       $json = new Services_JSON();
       $array = $json->decode($json_data);
 
       if ($toarray) { //  需要转换成数组
           $array = object2array($array);
       }
       return $array;
   }
 
}

function ObjectToArray($d) {  
	if (is_object($d)) {  
		// Gets the properties of the given object  
		// with get_object_vars function  
		$d = get_object_vars($d);  
	}  

	if (is_array($d)) {  
		/* 
		* Return array converted to object 
		* Using __FUNCTION__ (Magic constant) 
		* for recursive call 
		*/  
		return array_map(__FUNCTION__, $d);  
	}  
	else {  
		// Return array  
		return $d;  
	}  
}


function str62keys($key)//62进制字典 
{ 
	$str62keys = array("0", "1", "2", "3", "4", "5", "6", "7", "8", "9","a", "b", "c", "d", "e", "f", "g", "h", "i", "j", "k", "l", "m", "n", "o", "p", "q", "r", "s", "t", "u", "v", "w", "x", "y", "z","A", "B", "C", "D", "E", "F", "G", "H", "I", "J", "K", "L", "M", "N", "O", "P", "Q", "R", "S", "T", "U", "V", "W", "X", "Y", "Z"); 
	return $str62keys[$key];
}

/* url 10 进制 转62进制*/
function intTo62($int10)
	{
	$s62 = '';
	$r = 0;
	while ($int10 != 0)
	{
	$r = $int10 % 62;
	$s62.= str62keys($r);
	$int10 = floor($int10 / 62);
	}
	return $s62;
}

// Quality is a number between 0 (best compression) and 100 (best quality)
function png2jpg($originalFile, $outputFile, $quality) {
    $image = imagecreatefrompng($originalFile);
    imagejpeg($image, $outputFile, $quality);
    imagedestroy($image);
}
