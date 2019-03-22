<?php
//注册插件
RegisterPlugin('yt_live2d', 'ActivePlugin_yt_live2d');

function ActivePlugin_yt_live2d()
{
  Add_Filter_Plugin('Filter_Plugin_Zbp_MakeTemplatetags', 'yt_live2d_Content');
}

function yt_live2d_Content()
{
  global $zbp;
  $zbp->header .= '<link rel="stylesheet" type="text/css" href="' . $zbp->host . 'zb_users/plugin/yt_live2d/res/css/live2d.css?v=1.0"/>' . "\r\n";
  $zbp->footer .= '<script src="' . $zbp->host . 'zb_users/plugin/yt_live2d/res/js/autoload.js?v=1.0"></script>' . "\r\n";
}

function InstallPlugin_yt_live2d()
{
  global $zbp;
  if (!$zbp->Config('yt_live2d')->HasKey('version')) {
    $zbp->Config('yt_live2d')->version = '1.0';
    $zbp->SaveConfig('yt_live2d');
  }
}

function UninstallPlugin_yt_live2d()
{
  global $zbp;
  $zbp->DelConfig('yt_live2d');
}
?>