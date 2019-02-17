<?php

//注册插件
RegisterPlugin('yt_console', 'ActivePlugin_yt_console');

function ActivePlugin_yt_console()
{
  Add_Filter_Plugin('Filter_Plugin_Login_Header', 'yt_console_Css');
}

function yt_console_Css()
{
  global $zbp, $lang;
  
  echo '<link rel="stylesheet" type="text/css" href="' . $zbp->host . 'zb_users/plugin/yt_console/res/css/login.css"/>' . "\r\n";
  echo '<script src="' . $zbp->host . 'zb_users/plugin/yt_console/res/javascript/login.js"></script>' . "\r\n";

  $lang["msg"]["stay_signed_in"] = "记住我";
}


function UninstallPlugin_yt_console()
{
  global $zbp;
}
