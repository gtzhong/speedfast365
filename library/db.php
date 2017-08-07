<?php
class Db extends PDO {

	protected static $_instance = null;

	public static function instance(){
		if(self::$_instance == null){
			$hostname = $GLOBALS['hostname'];
			$db_config = $GLOBALS['_CONFIG']["{$hostname}"]['db'];
			self::$_instance = self::int_db($db_config);
			self::$_instance->exec('set names utf8');
		}
		return self::$_instance;
	}

	public static function int_db($db_config){
		$dsn = 'mysql:host='.$db_config['host'].';dbname='.$db_config['dbname'];
		$user = $db_config['user'];
		$pass = $db_config['passwd'];
		try{
			//$dbh = new self($dsn, $user,$pass,array(PDO::ATTR_PERSISTENT => true));
			$dbh = new self($dsn, $user,$pass);
			return $dbh;
		}catch(PDOException $e){
			echo 'db error';
			return false;
		}
		//return new self($dsn, $user,$pass);
	}

	public function fetchAll($sql, array $params = null){
		$stmt = $this->prepare($sql);
		$stmt->execute($params);
		return $stmt->fetchAll();
	}

	public function fetchRow($sql, array $params = null){
		$list = $this->fetchAll($sql,$params);
		if(isset($list[0])){
			return $list[0];
		}
		else{
			return array();
		}
	}

	public function fetchOne($sql, array $params = null){
		$row = $this->fetchRow($sql,$params);
		if(isset($row[0])){
			return $row[0];
		}
		else{
			return null;
		}
	}

	public function update($table_name, array $bind, array $where = null){
		if(empty($bind)){
			return false;
		}
		$sql = 'update '.$table_name.' set ';
		$set = array();
		foreach($bind as $key=>$value){
			$set[] = '`'.$key.'`' . ' = :' . $key;
		}
		$sql .= implode(',',$set);
		if(!empty($where)){
			foreach($where as $k=>$v){
				if(!is_numeric($k)){
					die('update where key is not number');
				}
			}
			$sql = $sql . ' where ' . implode(' and ',$where);
		}
		$stmt = $this->prepare($sql);
		return $stmt->execute($bind);
	}

	public function insert($table_name, array $bind){
		if(empty($bind)){
			return false;
		}
		$sql = 'insert into '.$table_name.'';
		$fileds = array_keys($bind);
		$sql = $sql . ' (`'.implode('`,`',$fileds) . '`) values (:'. implode(", :",$fileds) .')';
		$stmt = $this->prepare($sql);
		return $stmt->execute($bind);
	}

	public function delete($table_name, array $where = null){
		$sql = 'delete from '.$table_name.'';
		if(!empty($where)){
			foreach($where as $k=>$v){
				if(!is_numeric($k)){
					die('delete where key is not number');
				}
			}
			$sql = $sql . ' where ' . implode(' and ',$where);
		}
		$stmt = $this->prepare($sql);
		return $stmt->execute();
	}


	public function replace($table_name, array $bind){
		if(empty($bind)){
			return false;
		}
		$sql = 'replace into '.$table_name.'';
		$fileds = array_keys($bind);
		$sql = $sql . ' (`'.implode('`,`',$fileds) . '`) values (:'. implode(", :",$fileds) .')';
		$stmt = $this->prepare($sql);
		return $stmt->execute($bind);

	}
}

?>
