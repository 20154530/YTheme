<?php
require '../../../zb_system/function/c_system_base.php';
require '../../../zb_system/function/c_system_admin.php';
$zbp->Load();
$action = 'root';
if (!$zbp->CheckRights($action)) {
  $zbp->ShowError(6);
  die();
}
if (!$zbp->CheckPlugin('yt_live2d')) {
  $zbp->ShowError(48);
  die();
}

$blogtitle = 'yt_live2d';
require $blogpath . 'zb_system/admin/admin_header.php';
require $blogpath . 'zb_system/admin/admin_top.php';

?>
<div>

</div>

<?php
require $blogpath . 'zb_system/admin/admin_footer.php';
RunTime();
?>