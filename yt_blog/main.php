<?php
require '../../../zb_system/function/c_system_base.php';
require '../../../zb_system/function/c_system_admin.php';

$zbp->Load();
$action='root';
if (!$zbp->CheckRights($action)) {$zbp->ShowError(6);die();}
if (!$zbp->CheckPlugin('yt_blog')) {$zbp->ShowError(48);die();}
$blogtitle='主题配置';

require $blogpath . 'zb_system/admin/admin_header.php';
require $blogpath . 'zb_system/admin/admin_top.php';

if(isset($_POST['ms'])){

  $zbp->SaveConfig('yt_blog');
  $zbp->ShowHint('good');
}
?>
<script type="text/javascript" src="<?php echo $bloghost?>zb_users/theme/yt_blog/script/delimg.js"></script>

<?php
if ($zbp->CheckPlugin('UEditor')) {	
	echo '<script type="text/javascript" src="'.$zbp->host.'zb_users/plugin/UEditor/ueditor.config.php"></script>';
	echo '<script type="text/javascript" src="'.$zbp->host.'zb_users/plugin/UEditor/ueditor.all.min.js"></script>';
	echo '<script type="text/javascript" src="'.$zbp->host.'zb_users/theme/yt_blog/script/lib.upload.js"></script>';
}
require $blogpath . 'zb_system/admin/admin_footer.php';
RunTime();
?>
