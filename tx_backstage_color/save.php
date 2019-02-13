<?php
require '../../../zb_system/function/c_system_base.php';
require '../../../zb_system/function/c_system_admin.php';

$zbp->Load();
$action='root';
if (!$zbp->CheckRights($action)) {$zbp->ShowError(6);die();}
if (!$zbp->CheckPlugin('tx_backstage_color')) {$zbp->ShowError(48);die();}

if($_GET['type'] == 'logo' ){
	global $zbp;
	foreach ($_FILES as $key => $value) {
		if(!strpos($key, "_php")){
			if (is_uploaded_file($_FILES[$key]['tmp_name'])) {
				$tmp_name = $_FILES[$key]['tmp_name'];
				$name = $_FILES[$key]['name'];
				@move_uploaded_file($_FILES[$key]['tmp_name'], $zbp->usersdir . 'plugin/tx_backstage_color/img/logo.png');

			}
		}
	}
	$zbp->SetHint('good','修改成功');
	Redirect('./main.php?act=base');
}

if($_GET['type'] == 'bg' ){
	// global $zbp;
	// foreach ($_FILES as $key => $value) {
	// 	if(!strpos($key, "_php")){
	// 		if (is_uploaded_file($_FILES[$key]['tmp_name'])) {
	// 			$tmp_name = $_FILES[$key]['tmp_name'];
	// 			$name = $_FILES[$key]['name'];
	// 			@move_uploaded_file($_FILES[$key]['tmp_name'], $zbp->usersdir . 'plugin/tx_backstage_color/img/login-bg.jpg');

	// 		}
	// 	}
	// }
	// $zbp->SetHint('good','修改成功');
	// Redirect('./main.php?act=base');
	$posta = new bt_api();
	$data = $posta->GetLogs();
	echo json_encode($data);
}

class bt_api
{
	private $BT_KEY = "wndbF9HmAaZX5DnmqG6cEJIur2VfeCAI";  //接口密钥
	private $BT_PANEL = "http://39.106.123.5:8888";	   //面板地址
	
  	//如果希望多台面板，可以在实例化对象时，将面板地址与密钥传入
	public function __construct($bt_panel = null, $bt_key = null)
	{
		if ($bt_panel) $this->BT_PANEL = $bt_panel;
		if ($bt_key) $this->BT_KEY = $bt_key;
	}
	
  	//示例取面板日志	
	public function GetLogs()
	{
		//拼接URL地址
	//	$url = $this->BT_PANEL . '/system?action=GetDiskInfo';
		$url = $this->BT_PANEL . 'http://192.168.1.104';
		
		//准备POST数据
		$p_data = $this->GetKeyData();		//取签名
		// $p_data['table'] = 'logs';
		// $p_data['limit'] = 10;
		// $p_data['tojs'] = 'test';

		foreach ($p_data as $key => $value) {
			echo $key . ":" . $value . "\n";
		}

		//请求面板接口
		$result = $this->HttpPostCookie($url, $p_data);
		
		//return $result;
		//解析JSON数据
		$data = json_decode($result, true);
		return $data;
	}


	/**
	 * 构造带有签名的关联数组
	 */
	private function GetKeyData()
	{
		$now_time = time();
		$p_data = array(
			'request_token' => md5('10' . '' . md5($this->BT_KEY)),
			'request_time' => '10'
		);
		return $p_data;
	}


	/**
	 * 发起POST请求
	 * @param String $url 目标网填，带http://
	 * @param Array|String $data 欲提交的数据
	 * @return string
	 */
	private function HttpPostCookie($url, $data, $timeout = 60)
	{
    	//定义cookie保存位置
		$cookie_file = './' . 'Y_T_cookies' . '.cookie';
		if (!file_exists($cookie_file)) {
			$fp = fopen($cookie_file, 'w+');
			fclose($fp);
		}

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_TIMEOUT, $timeout);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
		curl_setopt($ch, CURLOPT_COOKIEJAR, $cookie_file);
		curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie_file);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_HEADER, 0);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		$output = curl_exec($ch);
		curl_close($ch);
		return $output;
	}
}

?>