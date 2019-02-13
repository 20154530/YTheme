<?php
require '../../../zb_system/function/c_system_base.php';
require '../../../zb_system/function/c_system_admin.php';
$zbp->Load();
$action = 'root';
if (!$zbp->CheckRights($action)) {
  $zbp->ShowError(6);
  die();
}
if (!$zbp->CheckPlugin('tx_backstage_color')) {
  $zbp->ShowError(48);
  die();
}

$blogtitle = '天兴工作室--后台配色';
require $blogpath . 'zb_system/admin/admin_header.php';
?>
<script src="source/jscolor.js" type="text/javascript"></script>
<style type="text/css">.tableBorder td{padding:10px}</style>
<?php
require $blogpath . 'zb_system/admin/admin_top.php';
?>
<?php
require $blogpath . 'zb_system/admin/admin_footer.php';
RunTime();
?>