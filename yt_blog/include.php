<?php
require dirname(__FILE__) . DIRECTORY_SEPARATOR . '/modular.php';
RegisterPlugin("yt_blog", "ActivePlugin_yt_blog");


function ActivePlugin_yt_blog()
{
  Add_Filter_Plugin('Filter_Plugin_Admin_TopMenu', 'yt_blog_AddMenu');
  Add_Filter_Plugin('Filter_Plugin_ViewPost_Template', 'yt_blog_tags_set');
  Add_Filter_Plugin('Filter_Plugin_Zbp_Load', 'yt_blog_rebuild_Main');
  global $zbp;
  $zbp->LoadLanguage('theme', 'yt_blog');
}


function yt_blog_AddMenu(&$m)
{
  global $zbp;
  array_unshift($m, MakeTopMenu("root", '主题配置', $zbp->host . "zb_users/theme/yt_blog/main.php", "", "topmenu_yt_blog"));
}
function yt_blog_tags_set(&$template)
{
  global $zbp;

}
function InstallPlugin_yt_blog()
{
  global $zbp;
  if (!$zbp->Config('yt_blog')->HasKey('Version')) {
    $zbp->Config('yt_blog')->Version = '1.3';

    $zbp->SaveConfig('yt_blog');
  }
}
//卸载主题
function UninstallPlugin_yt_blog()
{
  global $zbp;
  
}
?>