<?php
require '../../../zb_system/function/c_system_base.php';
require '../../../zb_system/function/c_system_admin.php';

$zbp->Load();
$action='root';
if (!$zbp->CheckRights($action)) {$zbp->ShowError(6);die();}
if (!$zbp->CheckPlugin('yt_blog')) {$zbp->ShowError(48);die();}
$blogtitle='主题配置';

$act = "";
if ($_GET['act']){
$act = $_GET['act'] == "" ? 'config' : $_GET['act'];
}

require $blogpath . 'zb_system/admin/admin_header.php';
require $blogpath . 'zb_system/admin/admin_top.php';

if(isset($_POST['keywords'])){
	$zbp->Config('yt_blog')->tx= $_POST['tx'];
	$zbp->Config('yt_blog')->banner= $_POST['banner'];
	$zbp->Config('yt_blog')->explain1= $_POST['explain1'];
	$zbp->Config('yt_blog')->explain2= $_POST['explain2'];
	$zbp->Config('yt_blog')->thumbnail= $_POST['thumbnail'];
	$zbp->Config('yt_blog')->tag_num= $_POST['tag_num'];
	$zbp->Config('yt_blog')->qq= $_POST['qq'];
	$zbp->Config('yt_blog')->cntact_us= $_POST['cntact_us'];
	$zbp->Config('yt_blog')->keywords = $_POST['keywords'];
	$zbp->Config('yt_blog')->description = $_POST['description'];
	$zbp->Config('yt_blog')->share_switch = $_POST['share_switch'];
	$zbp->Config('yt_blog')->share = $_POST['share'];
	$zbp->Config('yt_blog')->seo = $_POST['seo'];
	$zbp->Config('yt_blog')->post_category = $_POST['post_category'];
	$zbp->Config('yt_blog')->page_subname = $_POST['page_subname'];
	$zbp->SaveConfig('yt_blog');
	$zbp->ShowHint('good');
}

if ($zbp->CheckPlugin('UEditor')) { 
	echo '<script type="text/javascript" src="'.$zbp->host.'zb_users/plugin/UEditor/ueditor.config.php"></script>';
	echo '<script type="text/javascript" src="'.$zbp->host.'zb_users/plugin/UEditor/ueditor.all.min.js"></script>';
}

?>
<script>
	function upwindow(){
		var container = document.createElement('script');
		$(container).attr('type','text/plain').attr('id','img_editor');
		$("body").append(container);
		_editor = UE.getEditor('img_editor');
		_editor.ready(function () {
			_editor.hide();
			$(".uploadimg strong").click(function(){        
				object = $(this).parent().find('.uplod_img');
				_editor.getDialog("insertimage").open();
				_editor.addListener('beforeInsertImage', function (t, arg) {
					object.attr("value", arg[0].src);
				});
			});
		});
	}
	upwindow();
</script>

<script type="text/javascript">
ActiveTopMenu("topmenu_Lipop");
</script> 
<?php
require $blogpath . 'zb_system/admin/admin_footer.php';
RunTime();
?>
