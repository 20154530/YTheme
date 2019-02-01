<?php
require '../../../zb_system/function/c_system_base.php';
require '../../../zb_system/function/c_system_admin.php';

$zbp->Load();
$action='root';
if (!$zbp->CheckRights($action)) {$zbp->ShowError(6);die();}
if (!$zbp->CheckPlugin('rokoPhotoLite')) {$zbp->ShowError(48);die();}
$blogtitle='主题配置';

$act = "";
if ($_GET['act']){
$act = $_GET['act'] == "" ? 'config' : $_GET['act'];
}

require $blogpath . 'zb_system/admin/admin_header.php';
require $blogpath . 'zb_system/admin/admin_top.php';

if(isset($_POST['logo'])){
	$zbp->Config('rokoPhotoLite')->logo= $_POST['logo'];
	$zbp->Config('rokoPhotoLite')->bg= $_POST['bg'];
	$zbp->Config('rokoPhotoLite')->keywords = $_POST['keywords'];
	$zbp->Config('rokoPhotoLite')->description = $_POST['description'];
	$zbp->Config('rokoPhotoLite')->page = $_POST['page'];
	$zbp->Config('rokoPhotoLite')->seo = $_POST['seo'];
	$zbp->Config('rokoPhotoLite')->post_category = $_POST['post_category'];
	$zbp->Config('rokoPhotoLite')->page_subname = $_POST['page_subname'];
	$zbp->SaveConfig('rokoPhotoLite');
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
<style>
	#img_editor {display:none}
	.uploadimg strong{color: #ffffff;font-size: 1.1em;height: 29px;padding: 2px 18px 3px 18px;margin: 0 0.5em;background: #3a6ea5;border: 1px solid #3399cc;cursor: pointer;}
</style>
<div id="divMain">
	<div class="divHeader"><?php echo $blogtitle;?></div>
		<div class="SubMenu">
	<?php rokoPhotoLite_SubMenu($act);?>
     <a href="https://www.songhaifeng.com/zblogphp-free-theme/152.html" target="_blank"><span>技术支持</span></a>
    </div>
		<div id="divMain2">
		<?php if ($act == 'config') { ?>
			<form id="form1" name="form1" method="post">
					<table width="100%" style='padding:0;margin:0;' cellspacing='0' cellpadding='0' class="tableBorder">
						<tr>
							<th width="15%"><p align="center">配置名称</p></th>
							<th width="50%"><p align="center">配置内容</p></th>
							<th width="25%"><p align="center">配置说明</p></th>
						</tr>
						<tr>
							<td><label for="logo"><p align="center">Logo</p></label></td>
							<td class="uploadimg"><p align="left"><input name="logo" type="text" id="logo" style="width:84%;" class="uplod_img" value="<?php echo $zbp->Config('rokoPhotoLite')->logo;?>" /><strong class="button">浏览文件</strong></p></td>
							<td><p align="left">尺寸大小：75*75，其他尺寸效果自测。</p></td>
						</tr>
						<tr>
							<td><label for="bg"><p align="center">顶部背景图</p></label></td>
							<td class="uploadimg"><p align="left"><input name="bg" type="text" id="bg" style="width:84%;" class="uplod_img" value="<?php echo $zbp->Config('rokoPhotoLite')->bg;?>" /><strong class="button">浏览文件</strong></p></td>
							<td><p align="left">位于网页顶部，尺寸大小：1360*580，其他尺寸效果自测。</p></td>
						</tr>
						<tr>
							<td><label for="page"><p align="center">页面底部按钮</p></label></td>
							<td>
								<p align="center">
									<select class="xf-select" name="page" id="page" size="1">
										<?php echo rokoPhotoLite_PageAlls($zbp->Config('rokoPhotoLite')->page);?>
									</select>
								</p>
							</td>
							<td><p align="left">位于页面底部，选择要显示的页面即可。</p></td>
						</tr>
						<tr>
							<td><label for="keywords"><p align="center">网站关键词</p></label></td>
							<td><p align="left"><input name="keywords" type="text" id="keywords" style="width:98%;" value="<?php echo $zbp->Config('rokoPhotoLite')->keywords;?>" /></p></td>
							<td><p align="left">网站首页关键词</p></td>
						</tr>
						<tr>
							<td><label for="description"><p align="center">网站描述</p></label></td>
							<td><p align="left"><textarea name="description" type="text" id="description" style="width:98%;height:66px;"><?php echo $zbp->Config('rokoPhotoLite')->description;?></textarea></p></td>
							<td><p align="left">网站首页描述</p></td>
						</tr>
						<tr>
							<td><label for="seo"><p align="center">SEO</p></label></td>
							<td>
								<p align="center">
									<select name="seo" id="seo">
										<option value="a" <?php if($zbp->Config('rokoPhotoLite')->seo == 'a') echo 'selected'?>>打开</option>
										<option value="b" <?php if($zbp->Config('rokoPhotoLite')->seo == 'b') echo 'selected'?>>关闭</option>
									</select>
								</p>
							</td>
							<td><p align="left">如需使用其它的SEO插件，请把主题中SEO设置选择关闭。</p></td>
						</tr>
						<tr>
							<td><label for="post_category"><p align="center">文章是否显示分类名</p></label></td>
							<td>
								<p align="center">
									<select name="post_category" id="post_category">
										<option value="a" <?php if($zbp->Config('rokoPhotoLite')->post_category == 'a') echo 'selected'?>>打开</option>
										<option value="b" <?php if($zbp->Config('rokoPhotoLite')->post_category == 'b') echo 'selected'?>>关闭</option>
									</select>
								</p>
							</td>
							<td><p align="left">只显示当前分类，不显示父分类。<br/>SEO选项关闭时此项设置无效。</p></td>
						</tr>
						<tr>
							<td><label for="page_subname"><p align="center">单页是否显示网站副标题</p></label></td>
							<td>
								<p align="center">
									<select name="page_subname" id="page_subname">
										<option value="a" <?php if($zbp->Config('rokoPhotoLite')->page_subname == 'a') echo 'selected'?>>打开</option>
										<option value="b" <?php if($zbp->Config('rokoPhotoLite')->page_subname == 'b') echo 'selected'?>>关闭</option>
									</select>
								</p>
							</td>
							<td><p align="left">单页面是否显示网站副标题。<br/>SEO选项关闭时此项设置无效。</p></td>
						</tr>
					</table>
					<br/>
					<input name="" type="Submit" class="button" value="保存"/>
			</form>
    <?php } if ($act == 'explain') { ?>
			<form id="form3" name="form3" method="post">
				<table width="100%" style="padding:0;margin-top:5px;" cellspacing="0" cellpadding="0" class="tableBorder">
					<tbody>
						<tr class="color1">
							<th width="100%"><p>【安装须知】</p></th>
						</tr>
						<tr class="color3">
							<td>
								<p>感谢喜欢，感谢使用！</p>
								<p>免费主题是没有技术支持的，所以请不要随意添加我的QQ，有问题可以在我博客或者应用中心主题页反馈，我会找时间修复的。谢谢。</p>
								<p>如果您觉得主题哪方面不合您的心意，可自由修改。但还是那句话，不要添加我的QQ询问这类问题，有什么问题去反馈，我会回答的。</p>
								<p>或者说主题需要二次修改，可以找我付费解决。QQ：284204003</p>
								<p>Zblog技术交流群：4243058</p>
							</td>
						</tr>
					</tbody>
				</table>
			</form>
    <?php } ?>
		</div>
</div>
<script type="text/javascript">
ActiveTopMenu("topmenu_rokoPhotoLite");
</script> 
<?php
require $blogpath . 'zb_system/admin/admin_footer.php';
RunTime();
?>
