<?php
#注册插件
RegisterPlugin("skPlayer","ActivePlugin_skPlayer");
function ActivePlugin_skPlayer() {
	Add_Filter_Plugin('Filter_Plugin_Zbp_MakeTemplatetags','skPlayer_Main');
}
function skPlayer_Main() {
	global $zbp;
	$source = $zbp->Config('skPlayer')->source1;
	if($zbp->Config('skPlayer')->type == "file"){
		$source = '['.$zbp->Config('skPlayer')->source2.']';
	}
	$zbp->footer .= '<link href="'.$zbp->host.'zb_users/plugin/skPlayer/skplayer.css?v=1.0" rel="stylesheet">'."\r\n";
	$zbp->footer .='<div id="skPlayer-wrap"><div id="skp-ctrl">Music</div><div id="skPlayer"></div></div>'."\r\n";
	$zbp->footer .='<script src="'.$zbp->host.'zb_users/plugin/skPlayer/skPlayer.min.js?v=3.0.8"></script>'."\r\n";
	$zbp->footer .='<script>';
	$zbp->footer .="
var player = new skPlayer({
    autoplay: ".$zbp->Config('skPlayer')->autoplay.",
    listshow: ".$zbp->Config('skPlayer')->listshow.",
    mode: '".$zbp->Config('skPlayer')->mode."',
    music: {
        type: '".$zbp->Config('skPlayer')->type."',
        source: ".$source."
    }
});
//Z-BlogPHP skPlayer [www.yiwuku.com]
var skpShow = ".$zbp->Config('skPlayer')->showset.";
var skpWrap = document.getElementById('skPlayer-wrap');
if(skpShow){skpWrap.className='xopen';}
document.getElementById('skp-ctrl').onclick = function(){skpWrap.className='xopen';}
document.onclick = function(e){
    var e = e || window.event;
    var target = e.target || e.srcElement;
    var _tar = skpWrap;
    if(!(target == _tar) && ! _tar.contains(target)){skpWrap.className='';}
}
";
	$zbp->footer .='</script>'."\r\n";
}
//安装插件
function InstallPlugin_skPlayer() {
	global $zbp;
	//配置初始化
	if (!$zbp->Config('skPlayer')->HasKey('version')) {
		$zbp->Config('skPlayer')->version = '1.0';
		$zbp->Config('skPlayer')->showset="1";
		$zbp->Config('skPlayer')->autoplay="1";
		$zbp->Config('skPlayer')->listshow="0";
		$zbp->Config('skPlayer')->mode="listloop";
		$zbp->Config('skPlayer')->type="cloud";
		$zbp->Config('skPlayer')->source1="317921676";
		$zbp->Config('skPlayer')->source2="{
	name: 'Photos and Memories',
	author: 'Pinkzebra',
	src: 'https://amazingaudioplayer.com/wp-content/uploads/amazingaudioplayer/8/audios/Photos and Memories.mp3',
	cover: 'https://amazingaudioplayer.com/wp-content/uploads/amazingaudioplayer/8/audios/dandelion.jpg'
},";
		$zbp->SaveConfig('skPlayer');
	}
}
//卸载插件
function UninstallPlugin_skPlayer() {
	global $zbp;
	$zbp->DelConfig('skPlayer');
}