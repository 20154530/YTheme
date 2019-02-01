<?php
require dirname(__FILE__) . DIRECTORY_SEPARATOR . 'plugin/search_config.php'; // searchplus
RegisterPlugin("rokoPhotoLite","ActivePlugin_rokoPhotoLite");
function ActivePlugin_rokoPhotoLite(){
	Add_Filter_Plugin('Filter_Plugin_Admin_TopMenu','rokoPhotoLite_AddMenu');
	Add_Filter_Plugin('Filter_Plugin_Search_Begin','rokoPhotoLite_SearchMain');
	Add_Filter_Plugin('Filter_Plugin_Category_Edit_Response','rokoPhotoLite_Category_Edit_Response');
	Add_Filter_Plugin('Filter_Plugin_Tag_Edit_Response','rokoPhotoLite_Tag_Edit_Response');
	Add_Filter_Plugin('Filter_Plugin_Edit_Response5','rokoPhotoLite_Edit_Response5');
}
function rokoPhotoLite_AddMenu(&$m){
global $zbp;
	array_unshift($m, MakeTopMenu("root",'主题配置',$zbp->host . "zb_users/theme/rokoPhotoLite/main.php?act=explain","","topmenu_rokoPhotoLite"));
}

function rokoPhotoLite_SubMenu($id){
	$arySubMenu = array(
		0 => array('基本设置', 'config', 'left', false),
		1 => array('主题说明', 'explain', 'left', false),
	);
	foreach($arySubMenu as $k => $v){
		echo '<a href="?act='.$v[1].'" '.($v[3]==true?'target="_blank"':'').'><span class="m-'.$v[2].' '.($id==$v[1]?'m-now':'').'">'.$v[0].'</span></a>';
	}
}
function rokoPhotoLite_tags_set(&$template){
	global $zbp;
	$template->SetTags('rokoPhotoLite_logo',$zbp->Config('rokoPhotoLite')->logo);
	$template->SetTags('rokoPhotoLite_bg',$zbp->Config('rokoPhotoLite')->bg);
	$template->SetTags('rokoPhotoLite_keywords',$zbp->Config('rokoPhotoLite')->keywords);
    $template->SetTags('rokoPhotoLite_description',$zbp->Config('rokoPhotoLite')->description);
	$template->SetTags('rokoPhotoLite_page',$zbp->Config('rokoPhotoLite')->page);
	$template->SetTags('rokoPhotoLite_seo',$zbp->Config('rokoPhotoLite')->seo);
	$template->SetTags('rokoPhotoLite_post_category',$zbp->Config('rokoPhotoLite')->post_category);
	$template->SetTags('rokoPhotoLite_page_subname',$zbp->Config('rokoPhotoLite')->page_subname);
}
function InstallPlugin_rokoPhotoLite(){
	global $zbp;
	if(!$zbp->Config('rokoPhotoLite')->HasKey('Version')){
		$zbp->Config('rokoPhotoLite')->Version = '1.0';
		$zbp->Config('rokoPhotoLite')->logo= '{#ZC_BLOG_HOST#}zb_users/theme/rokoPhotoLite/style/images/logo.png';
		$zbp->Config('rokoPhotoLite')->bg= '{#ZC_BLOG_HOST#}zb_users/theme/rokoPhotoLite/style/images/services.jpg';
		$zbp->Config('rokoPhotoLite')->keywords = '请填写您的网站关键词，可用英文逗号（,）分开。';
		$zbp->Config('rokoPhotoLite')->description = '请填写您的网站描述。';
		$zbp->Config('rokoPhotoLite')->page = '';
		$zbp->Config('rokoPhotoLite')->seo = 'a';
		$zbp->Config('rokoPhotoLite')->post_category = 'a';
		$zbp->Config('rokoPhotoLite')->page_subname = 'a';
		$zbp->SaveConfig('rokoPhotoLite');
	}
}
function rokoPhotoLite_Edit_Response5(){
    global $zbp,$article;
	if ($zbp->Config('rokoPhotoLite')->seo=="a"){
		echo '<div><label for="meta_keywords"><span style="font-weight: bold;">关键词:</span></label><br></label><input style="width:99%;" type="text" name="meta_keywords" value="'.htmlspecialchars($article->Metas->keywords).'"/></div>';
		echo '<div><label for="meta_description"><span style="font-weight: bold;">描述:</span></label><br><input style="width:99%;" type="text" name="meta_description" value="'.htmlspecialchars($article->Metas->description).'"/></div>';
		echo '<div><label for="meta_fjbt"><span style="font-weight: bold;">附加标题（留空即为不显示）:</span></label><br><input style="width:99%;" type="text" name="meta_fjbt" value="'.htmlspecialchars($article->Metas->fjbt).'"/></div>';
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
<?php
echo '<div class="uploadimg"><label for="meta_thumbnail"><span style="font-weight: bold;">缩略图（750*533）:</span></label><br><input name="meta_thumbnail" value="'.htmlspecialchars($article->Metas->thumbnail).'" type="text" class="uplod_img" style="width: 60%;" /><strong class="button" style="color: #ffffff;font-size: 1.1em;height: 29px;padding: 6px 18px 6px 18px;margin: 0 0.5em;background: #3a6ea5;border: 1px solid #3399cc;cursor: pointer;">浏览文件</strong></div>';
}
function rokoPhotoLite_Tag_Edit_Response(){
    global $zbp,$tag;
	if ($zbp->Config('rokoPhotoLite')->seo=="a"){
		echo '<div><label for="meta_keywords"><span style="font-weight: bold;">关键词:</span></label><br></label><input style="width:293px;" type="text" name="meta_keywords" value="'.htmlspecialchars($tag->Metas->keywords).'"/></div>';
		echo '<div><label for="meta_description"><span style="font-weight: bold;">描述:</span></label><br><input style="width:293px;" type="text" name="meta_description" value="'.htmlspecialchars($tag->Metas->description).'"/></div>';
		echo '<div><label for="meta_fjbt"><span style="font-weight: bold;">附加标题（留空即为不显示）:</span></label><br><input style="width:293px;" type="text" name="meta_fjbt" value="'.htmlspecialchars($tag->Metas->fjbt).'"/></div>';
	}
}
function rokoPhotoLite_Category_Edit_Response(){
    global $zbp,$cate;
	if ($zbp->Config('rokoPhotoLite')->seo=="a"){
		echo '<div><label for="meta_keywords"><span style="font-weight: bold;">关键词:</span></label><br></label><input style="width:293px;" type="text" name="meta_keywords" value="'.htmlspecialchars($cate->Metas->keywords).'"/></div>';
		echo '<div><label for="meta_description"><span style="font-weight: bold;">描述:</span></label><br><input style="width:293px;" type="text" name="meta_description" value="'.htmlspecialchars($cate->Metas->description).'"/></div>';
		echo '<div><label for="meta_fjbt"><span style="font-weight: bold;">附加标题（留空即为不显示）:</span></label><br><input style="width:293px;" type="text" name="meta_fjbt" value="'.htmlspecialchars($cate->Metas->fjbt).'"/></div>';
	}
}
function rokoPhotoLite_PageAlls($default){
	global $zbp;
	$articles=$zbp->GetPageList(array('*'),array(array('=','log_Type',1),array('=','log_Status',0)),null,null );
	$s=null;
	foreach ($articles as $id => $article) {
	  $s.='<option ' . ($default==$article->ID?'selected="selected"':'') . ' value="'. $article->ID .'" name="gqz[]">' . $article->Title . '</option>';
	}
	return $s;
}
//卸载主题
function UninstallPlugin_rokoPhotoLite(){
	global $zbp;
	//$zbp->DelConfig('rokoPhotoLite');
	//$zbp->SetHint('good','模块清除成功'); 
}
?>