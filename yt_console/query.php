<?php
require '../../../zb_system/function/c_system_base.php';
require '../../../zb_system/function/c_system_admin.php';
$zbp->Load();

if (isset($_GET['data'])) {
  global $zbp;
  switch ($_GET['data']) {
    case 'loginbg':
      echo $zbp->Config('yt_console')->loginbgurl.",".$zbp->Config('yt_console')->loginbgdes;
      break;
  }
}
?>