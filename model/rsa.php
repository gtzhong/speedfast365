<?php
class Model_RSA {
	protected static $_instance = null;
	public static function instance(){
		if(self::$_instance == null){
			self::$_instance = new self();
		}
		return self::$_instance;
	}
	//教程链接
	//http://www.cnblogs.com/flowers-yang/p/3522350.html
	/** 
	* 私钥解密 
	* 
	* @param string 密文（二进制格式且base64编码） 
	* @param string 密钥文件（.pem / .key） 
	* @param string 密文是否来源于JS的RSA加密 
	* @return string 明文 
	*/ 
	function privatekey_decodeing($crypttext, $fileName, $fromjs = FALSE) { 
	    
	    $key_content = file_get_contents($fileName); 
	    $prikeyid = openssl_get_privatekey($key_content); 
	    $crypttext = base64_decode($crypttext); 
	    
	    $padding = $fromjs ? OPENSSL_NO_PADDING : OPENSSL_PKCS1_PADDING; 
	    if (openssl_private_decrypt($crypttext, $sourcestr, $prikeyid, $padding)) { 
		return $fromjs ? rtrim(strrev($sourcestr), "/0") : "".$sourcestr; 
	    }
	    return ''; 
	}

	function publickey_encodeing($sourcestr, $fileName) { 
	    $key_content = file_get_contents($fileName); 
	    $pubkeyid = openssl_get_publickey($key_content); 

	    if (openssl_public_encrypt($sourcestr, $crypttext, $pubkeyid)) { 
		return base64_encode("".$crypttext); 
	    } 
	}	


}
