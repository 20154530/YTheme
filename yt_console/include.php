<?php
#注册插件
RegisterPlugin("yt_console","ActivePlugin_yt_console");

function ActivePlugin_yt_console() {
	//Add_Filter_Plugin('Filter_Plugin_Zbp_MakeTemplatetags','yt_console_Zbp_MakeTemplatetags');
	Add_Filter_Plugin('Filter_Plugin_Admin_Header','yt_console_Css');
	Add_Filter_Plugin('Filter_Plugin_Login_Header','yt_console_Css');
	Add_Filter_Plugin('Filter_Plugin_Other_Header','yt_console_Css');
}

function yt_console_Css() {
	global $zbp;
    echo '<link rel="stylesheet" type="text/css" href="'.$zbp->host.'zb_users/plugin/yt_console/res/css/style.css"/>'."\r\n";
}


// function yt_console_Zbp_MakeTemplatetags() {
// 	global $zbp;
// 	$config = array(
// 		"zs" => $zbp->Config('yt_console')->zs,
// 		"fs" => $zbp->Config('yt_console')->fs,
// 	);

// }

// function InstallPlugin_yt_console() {
//     global $zbp,$obj,$bucket;
//     //配置初始化
//     if (!$zbp->Config('yt_console')->HasKey('version')) {
//         $zbp->Config('yt_console')->version = '1.0';
//         $zbp->Config('yt_console')->zs = '0099cc';
// 		$zbp->Config('yt_console')->fs = '293038';
//         $zbp->SaveConfig('yt_console');
//     }
// }


function UninstallPlugin_yt_console() {
	global $zbp;
//	$zbp->DelConfig('yt_console');
}