<?php
include_once dirname(__file__) . '/crond_init.php';

$obj = new Crond_Remote_Traffic_IPtable();

$result = $obj->run();


class Crond_Remote_Traffic_IPtable{

	public $sale_list = array();

	public function run(){

		$time_begin = time();

		$db = Db::instance();

		$server_list = $db->fetchAll("select * from server_front where is_hidden = 0");

		//test 12800 	
		//$user_port_list = $db->fetchAll("select * from user where port > 12420 and port < 12430");
		//$user_port_list = $db->fetchAll("select * from user where port > 11420 and port < 11430");
		$user_port_list = $db->fetchAll("select * from user where port >0 and enable_server = 1");
		
		
		foreach($server_list as $server){
			echo "server_ip:{$server['ip_address']}\n";
			$this->update_traffic_and_acl($server,$user_port_list);
		}
		
		$time_end = time();
		echo "========end\n";

		$time_diff = $time_end - $time_begin;

		echo "time:{$time_diff}\n";
	}


	public function update_traffic_and_acl(array $server,array $user_port_list){

		//perpare all port's iptables rule data 
		$local_port_rule_data = $this->local_port_rule_data($server,$user_port_list);
	
		//get node server's iptable_data
		$remote_shell_result = $this->get_remote_shell_result($server['ip_address']);

		//iptable_data
		$iptable_data = $this->format_shell_result($remote_shell_result);

		//print_r($iptable_data);die();
		
		//update traffic into db
		if(empty($server['is_unlimit'])){
			$this->update_traffic_into_db($iptable_data);
		}
		else{
			echo "u:is_unlimit\nd:is_unlimit\n";
		}
	
		//get port new & prot different
		$port_rule_data_set_string = $this->port_rule_data_set_string($iptable_data,$local_port_rule_data);

		//add & update port
		$this->shell_remote_port_set($server['ip_address'],$port_rule_data_set_string);	
		

	}

	public function shell_add_port($port_rule_data_array){
		$c = 0;
		$shell_update_str = '';
		if(!empty($port_rule_data_array)){

			//shell iptables check & update
			foreach($port_rule_data_array as $port_rule){
				$shell_update_str .= $this->shell_iptables_rule_set($port_rule['port'],$port_rule['act']);
				$c++;
			}
			
		}
		echo "add port:{$c}\n";
		return $shell_update_str;
	}

	public function shell_del_port($port_rule_data_array){
		$c = 0;
		$shell_update_str = '';
		if(!empty($port_rule_data_array)){
			//shell iptables del
			foreach($port_rule_data_array as $port_rule){
				$shell_update_str .= $this->shell_iptables_rule_del($port_rule['port'],$port_rule['act'],$port_rule['type'],$port_rule['direction'],$port_rule['protocol']);
				$c++;
			}

		}
		echo "del rules:{$c}\n";
		return $shell_update_str;
	}

	public function shell_remote_port_set($server_ip,$shell_update_str){

			$shell_ports_sh = "shell_ports_{$server_ip}.sh";

			file_put_contents($shell_ports_sh,$shell_update_str);
			
			$result = shell_exec('scp -o ConnectTimeout=5 '.$shell_ports_sh.' root@'.$server_ip.':~/'.$shell_ports_sh);
	
			$data_iptable = shell_exec('ssh -o ConnectTimeout=5 root@'.$server_ip.' "sh ~/'.$shell_ports_sh.'"');

	}

	public function port_rule_data_set_string($iptable_data,$local_port_rule_data){

		//format local_port_rule_data

		//print_r($iptable_data);die();

		$count_input_tcp = 0;
		$count_input_udp = 0;
		$count_output_udp = 0;
		$count_output_tcp = 0;
		foreach($iptable_data as $type=>$sub_data){

			foreach($sub_data as $rule_data){

				$port = $rule_data['port'];
				$act = $rule_data['act'];
				$direction = $rule_data['direction'];
				$protocol = $rule_data['protocol'];

				if($type == 'input' && $protocol == 'tcp'){$count_input_tcp++;}
				if($type == 'input' && $protocol == 'udp'){$count_input_udp++;}
				if($type == 'output' && $protocol == 'tcp'){$count_output_tcp++;}
				if($type == 'output' && $protocol == 'udp'){$count_output_udp++;}

				$remote_protocol_rule_data["{$port}"]["{$type}"]["{$protocol}"] = $act;

			}

		}
			
		echo "count_input_tcp:{$count_input_tcp}\n";
		echo "count_input_udp:{$count_input_udp}\n";
		echo "count_output_tcp:{$count_output_tcp}\n";
		echo "count_output_udp:{$count_output_udp}\n";


		//print_r($remote_protocol_rule_data);die();


		$local_protocol_rule_data = array();
		foreach($local_port_rule_data as $v){
			$local_protocol_rule_data["{$v['port']}"]['input'] = array('tcp'=>$v['act'],'udp'=>$v['act']);
			$local_protocol_rule_data["{$v['port']}"]['output'] = array('tcp'=>$v['act'],'udp'=>$v['act']);
		}
	
		//print_r($local_protocol_rule_data);die();

		$port_rule_data_need_update = array();
		$port_rule_data_need_add = array();
		foreach($local_protocol_rule_data as $port => $item){
			foreach($item as $type=>$item_v){
				foreach($item_v as $protocol=>$act){
					//echo "port:$port type:$type protocol:$protocol act:$act\n";die();
					if(isset($remote_protocol_rule_data["{$port}"]["{$type}"]["{$protocol}"])){
						if($act != $remote_protocol_rule_data["{$port}"]["{$type}"]["{$protocol}"]){
							$port_rule_data_need_update["{$port}"] = $local_port_rule_data["{$port}"];
						}
					}
					else{
						$port_rule_data_need_add["{$port}"] = $local_port_rule_data["{$port}"];
					}
				}
			}
		}
	
		echo "port new:".count($port_rule_data_need_add)."\n";
		echo "port update:".count($port_rule_data_need_update)."\n";
		
		$port_rule_data_need_add_array = array_merge($port_rule_data_need_add,$port_rule_data_need_update);

		//检查删除remote就是上面对调
		//$port_rule_data_need_del_array[] = array("port"=>$port,"act"=>$act,"type"=>$type,'direction'=>$direction,'protocol'=>$protocol); 
	
	
		$shell_add_port_str = $this->shell_add_port($port_rule_data_need_add_array);

		return $shell_add_port_str;

		//$shell_del_port_str = $this->shell_del_port($port_rule_data_need_del_array);
	
		//return $shell_add_port_str . $shell_del_port_str;
	}

	public function local_port_rule_data($server,$user_port_list){

		$port_rule_data = array();

		if(!empty($user_port_list)){
			foreach($user_port_list as $user){

				$is_prepare = !empty($user['prepare']) && $user['prepare'] == 1 ? true : false;

				$is_vip = !empty($user['member_level']) ? true : false;

				$is_vip_server = !empty($server['is_vip']) ? true : false;

				$is_enable = !empty($user['enable']) ? true : false;

				if($is_vip_server){
					$rule_act = $is_vip && $is_enable && !$is_prepare ? 'ACCEPT' : 'DROP';
				}else{
					$rule_act = $is_enable && !$is_prepare ? 'ACCEPT' : 'DROP';
				}
			
				$rule_act = 'ACCEPT';//增加这一行，放弃用iptable开关端口，因为DROP和shadowsocks manyuser冲突，导致无法开启ss进程；
				//等以后进化后，用独立的ss-server后，考虑重新启用iptable开关端口
				
				$port_rule_data["{$user['port']}"] = array('port'=>$user['port'],'act'=>$rule_act);

			}
		}

		return $port_rule_data;
	}

	public function format_shell_result($shell_result){
		
		preg_match_all('/(?P<direction>d)pt:(?P<port>\d+)\s(?P<traffic>\d+)\s(?P<act>\w+)\s(?P<protocol>\w+)/',$shell_result,$m1);
		
		preg_match_all('/(?P<direction>s)pt:(?P<port>\d+)\s(?P<traffic>\d+)\s(?P<act>\w+)\s(?P<protocol>\w+)/',$shell_result,$m2);

		$array_input = array();
		foreach($m1['port'] as $k=>$v){
			$array_input["{$k}"]['traffic'] = $m1['traffic'][$k];
			$array_input["{$k}"]['act'] = $m1['act'][$k];
			$array_input["{$k}"]['port'] = $m1['port'][$k];
			$array_input["{$k}"]['direction'] = $m1['direction'][$k];
			$array_input["{$k}"]['protocol'] = $m1['protocol'][$k];
		}

		$array_output = array();
		foreach($m2['port'] as $k=>$v){
			$array_output["{$k}"]['traffic'] = $m2['traffic'][$k];
			$array_output["{$k}"]['act'] = $m2['act'][$k];
			$array_output["{$k}"]['port'] = $m2['port'][$k];
			$array_output["{$k}"]['direction'] = $m2['direction'][$k];
			$array_output["{$k}"]['protocol'] = $m2['protocol'][$k];
		}

		$result = array();

		$result['input'] = $array_input;
		$result['output'] = $array_output;
		
		return $result;

	}

	public function update_traffic_into_db($iptable_data){
		
		$threshold = 0;

		$bytes_output = 0;
		$bytes_input = 0;

		$db = Db::instance();
		$array_input_traffic_data = array();	
		foreach($iptable_data['input'] as $v){
			if($v['traffic'] > $threshold && $v['act'] == 'ACCEPT'){
				if(!empty($array_input_traffic_data["{$v['port']}"])){
					$array_input_traffic_data["{$v['port']}"] += $v['traffic'];
				}
				else{
					$array_input_traffic_data["{$v['port']}"] = $v['traffic'];
				}
				$bytes_input+=$v['traffic'];	
			}
		}

		//print_r($array_input_traffic_data);

		$array_output_traffic_data = array();
		foreach($iptable_data['output'] as $v){
			if($v['traffic'] > $threshold && $v['act'] == 'ACCEPT'){
				if(!empty($array_output_traffic_data["{$v['port']}"])){
					$array_output_traffic_data["{$v['port']}"] += $v['traffic'];
				}
				else{
					$array_output_traffic_data["{$v['port']}"] = $v['traffic'];
				}
				$bytes_output+=$v['traffic'];	
			}
		}
		//print_r($array_output_traffic_data);die();

		$sql = '';
		$sql .= $this->traffic_to_sql($array_input_traffic_data,'u');
		$sql .= $this->traffic_to_sql($array_output_traffic_data,'d');

		//echo $sql;

		if(!empty($sql)){
			$db->exec($sql);
			//echo "sql add\n";
		}

		//echo "bytes_output:{$bytes_output}\nbytes_input:{$bytes_input}\n";
	}

	public function traffic_to_sql($list,$c){
		$sql = '';
		$n = 0;
		if(!empty($list)){
			foreach($list as $port=>$v){
				$sql .= 'update user set '.$c.'='.$c.'+'.$v.' where port = '.$port.';';
				//echo $sql;die();
				$n+=$v;
			}
			echo "{$c}:{$n}\n";
		}
		return $sql;
	}

	public function get_remote_shell_result($server_ip){
		
		$shell_check = "echo \"input:\";
iptables -n -v -L INPUT -x -t filter |grep -i 'dpt:' |awk -F' ' '{print $11,$2,$3,$4}'
echo \"output:\"
iptables -n -v -L OUTPUT -x -t filter |grep -i 'spt:' |awk -F' ' '{print $11,$2,$3,$4}'
echo \"checkend\"
iptables -Z";

		$shell_content = $shell_check;

		$shell_sh = 'shell_iptable_filter_'.$server_ip.'.sh';

		file_put_contents($shell_sh,$shell_content);
		
		$result = shell_exec('scp -o ConnectTimeout=5 '.$shell_sh.' root@'.$server_ip.':~/'.$shell_sh);
	
		$shell_result= shell_exec('ssh -o ConnectTimeout=5 root@'.$server_ip.' "sh ~/'.$shell_sh.'"');

		return $shell_result;
	}

	public function shell_iptables_rule_del($port,$act,$type,$direction,$protocol){
		$type = strtoupper($type);
		
			$str = "
if iptables -C {$type} -p {$protocol} --{$direction}port {$port} -j {$act}
then
   iptables -D {$type} -p {$protocol} --{$direction}port {$port} -j {$act}
fi

\n";
		return $str;
	}

	public function shell_iptables_rule_set($port,$act){
	
		if($act == 'DROP'){

			$str = "

if iptables -C INPUT -p tcp --dport {$port} -j ACCEPT
then
   iptables -D INPUT -p tcp --dport {$port} -j ACCEPT
fi

if iptables -C INPUT -p udp --dport {$port} -j ACCEPT
then
   iptables -D INPUT -p udp --dport {$port} -j ACCEPT
fi



if iptables -C OUTPUT -p tcp --sport {$port} -j ACCEPT
then
     iptables -D OUTPUT -p tcp --sport {$port} -j ACCEPT
fi

if iptables -C OUTPUT -p udp --sport {$port} -j ACCEPT
then
     iptables -D OUTPUT -p udp --sport {$port} -j ACCEPT
fi



if ! iptables -C INPUT -p tcp --dport {$port} -j DROP
then
     iptables -A INPUT -p tcp --dport {$port} -j DROP
fi

if ! iptables -C INPUT -p udp --dport {$port} -j DROP
then
     iptables -A INPUT -p udp --dport {$port} -j DROP
fi


if ! iptables -C OUTPUT -p tcp --sport {$port} -j DROP
then
     iptables -A OUTPUT -p tcp --sport {$port} -j DROP
fi

if ! iptables -C OUTPUT -p udp --sport {$port} -j DROP
then
     iptables -A OUTPUT -p udp --sport {$port} -j DROP
fi

";

		}
		elseif($act == 'ACCEPT'){

			$str = "

if iptables -C INPUT -p tcp --dport {$port} -j DROP
then
   iptables -D INPUT -p tcp --dport {$port} -j DROP
fi

if iptables -C INPUT -p udp --dport {$port} -j DROP
then
   iptables -D INPUT -p udp --dport {$port} -j DROP
fi

if iptables -C OUTPUT -p tcp --sport {$port} -j DROP
then
     iptables -D OUTPUT -p tcp --sport {$port} -j DROP
fi

if iptables -C OUTPUT -p udp --sport {$port} -j DROP
then
     iptables -D OUTPUT -p udp --sport {$port} -j DROP
fi


if ! iptables -C INPUT -p tcp --dport {$port} -j ACCEPT
then
     iptables -A INPUT -p tcp --dport {$port} -j ACCEPT
fi

if ! iptables -C INPUT -p udp --dport {$port} -j ACCEPT
then
     iptables -A INPUT -p udp --dport {$port} -j ACCEPT
fi

if ! iptables -C OUTPUT -p tcp --sport {$port} -j ACCEPT
then
     iptables -A OUTPUT -p tcp --sport {$port} -j ACCEPT
fi

if ! iptables -C OUTPUT -p udp --sport {$port} -j ACCEPT
then
     iptables -A OUTPUT -p udp --sport {$port} -j ACCEPT
fi


";
		}

		return $str;
	}

}
