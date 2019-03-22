<?php

//注册插件
RegisterPlugin('yt_console', 'ActivePlugin_yt_console');

function ActivePlugin_yt_console()
{
  Add_Filter_Plugin('Filter_Plugin_Login_Header', 'yt_console_Login');
  Add_Filter_Plugin('Filter_Plugin_Admin_Header', 'yt_console_MenuBar');
  Add_Filter_Plugin('Filter_Plugin_Other_Header', 'yt_console_MenuBar');
}

function yt_console_Login()
{
  global $zbp, $lang;
  echo '<link rel="stylesheet" type="text/css" href="' . $zbp->host . 'zb_users/plugin/yt_console/res/css/login.css"/>' . "\r\n";
  echo '<script src="' . $zbp->host . 'zb_users/plugin/yt_console/res/js/login.js"></script>' . "\r\n";
  $lang["msg"]["stay_signed_in"] = "记住我";
}

function yt_console_MenuBar(){
  global $zbp;
}

function InstallPlugin_yt_console()
{
  global $zbp;
  if (!$zbp->Config('yt_console')->HasKey('version')) {
    $zbp->Config('yt_console')->version = '1.0';
    $zbp->Config('yt_console')->loginbgurl = $zbp->host . 'zb_users/plugin/yt_console/res/img/login_bg.jpg';
    $zbp->Config('yt_console')->loginbgdes = "2233娘 米法厨 pixiv";
    $zbp->SaveConfig('yt_console');
  }
}

function UninstallPlugin_yt_console()
{
  global $zbp;
  $zbp->DelConfig('yt_console');
}
?>