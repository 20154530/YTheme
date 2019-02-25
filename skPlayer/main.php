<?php
require '../../../zb_system/function/c_system_base.php';
require '../../../zb_system/function/c_system_admin.php';
$zbp->Load();
$action='root';
if (!$zbp->CheckRights($action)) {$zbp->ShowError(6);die();}
if (!$zbp->CheckPlugin('skPlayer')) {$zbp->ShowError(48);die();}

$blogtitle='HTML5音乐播放器skPlayer';
require $blogpath . 'zb_system/admin/admin_header.php';
require $blogpath . 'zb_system/admin/admin_top.php';

if(isset($_POST['Items'])){
    foreach($_POST['Items'] as $key=>$val){
       $zbp->Config('skPlayer')->$key = $val;
    }
  	$zbp->SaveConfig('skPlayer');
  	$zbp->ShowHint('good');
    //Redirect('./main.php');
}
?>
<div id="divMain">
  <div class="divHeader"><?php echo $blogtitle;?></div>
  <div class="SubMenu">
    <a href="main.php" ><span class="m-left m-now">基本设置</span></a>
    <a href="../../plugin/AppCentre/main.php?auth=3ec7ee20-80f2-498a-a5dd-fda19b198194"><span class="m-left">作者作品</span></a>
    <a href="http://www.yiwuku.com/diy-zblog.html" target="_blank"><span class="m-left">定制服务</span></a>
    <a href="http://www.yiwuku.com/" target="_blank"><span class="m-right">作者网站</span></a>
  </div>
  
  <div id="divMain2">
<style type="text/css">
.xtips{color:#999;margin-left:15px}
div.xtips{line-height:1.5;padding:6px 0;}
textarea{font-size:12px;margin-bottom:3px;}
</style>
	<form id="form1" name="form1" method="post">	
    <table class="tb-set" width="100%">
        <tr height="50">
            <td colspan="2"><strong>《HTML5音乐播放器skPlayer》</strong>插件提示您：可以随时通过作者作品链接关注当前插件更新情况，以防错过更佳体验；</td>
        </tr>
        <tr height="50">
            <td width="180" align="right"><b>是否展开播放器：</b></td>
            <td><input name="Items[showset]" type="text" value="<?php echo $zbp->Config('skPlayer')->showset;?>" class="checkbox"><span class="xtips">ON状态时默认展开</span></td>
        </tr>
        <tr height="50">
            <td align="right"><b>是否自动播放：</b></td>
            <td><input name="Items[autoplay]" type="text" value="<?php echo $zbp->Config('skPlayer')->autoplay;?>" class="checkbox"><span class="xtips">ON状态时打开网页自动播放音乐</span></td>
        </tr>
        <tr height="50">
            <td align="right"><b>是否显示乐曲列表：</b></td>
            <td><input name="Items[listshow]" type="text" value="<?php echo $zbp->Config('skPlayer')->listshow;?>" class="checkbox"><span class="xtips">ON状态时将默认显示乐曲列表</span></td>
        </tr>
        <tr height="50">
            <td align="right"><b>播放循环方式：</b></td>
            <td>&nbsp;<label for="mode1"><input type="radio" id="mode1" name="Items[mode]" value="listloop" <?php echo ($zbp->Config('skPlayer')->mode=='listloop')?'checked="checked"':''; ?>> 列表循环</label>&emsp;
            <label for="mode2"><input type="radio" id="mode2" name="Items[mode]" value="singleloop" <?php echo ($zbp->Config('skPlayer')->mode=='singleloop')?'checked="checked"':''; ?>> 单曲循环</label><span class="xtips"></span></td>
        </tr>
        <tr height="50">
            <td align="right"><b>歌单配置方式：</b></td>
            <td>&nbsp;<label for="type1"><input type="radio" id="type1" name="Items[type]" value="cloud" <?php echo ($zbp->Config('skPlayer')->type=='cloud')?'checked="checked"':''; ?>> 网易云音乐歌单</label>&emsp;
            <label for="type2"><input type="radio" id="type2" name="Items[type]" value="file" <?php echo ($zbp->Config('skPlayer')->type=='file')?'checked="checked"':''; ?>> 自定义歌单</label><span class="xtips"></span></td>
        </tr>
        <tr height="50">
            <td align="right"><b>网易云音乐歌单ID：</b></td>
            <td><input type="text" value="<?php echo $zbp->Config('skPlayer')->source1;?>" name="Items[source1]" size="15"><span class="xtips"><a href="http://music.163.com/#/discover/playlist" target="_blank">网易云音乐</a>具体歌单页面网址“playlist?id=”后面数字，<a href="http://www.yiwuku.com/a/19935.html" target="_blank">看看推荐歌单ID？</a></span></td>
        </tr>
        <tr height="50">
            <td align="right"><b>自定义歌单内容：</b></td>
            <td><textarea name="Items[source2]" cols="70" rows="18" style="vertical-align:middle"><?php echo $zbp->Config('skPlayer')->source2; ?></textarea><span class="xtips">参数均为必需，必须遵照示例代码结构<br>name歌名，author歌手，src歌曲文件地址，cover封面图地址，每组{},为一首</span></td>
        </tr>
        <tr>
            <td height="80">&nbsp;</td>
            <td valign="top"><input type="submit" name="submit" value="保存设置"></td>
        </tr>
        <tr>
            <td colspan="2"><div class="xtips">敬请注意：<br>如需在切换页面时不中断音乐播放，网站主题需有pjax效果，现有主题和插件不能实现该效果时可以联系作者定制；<br>
            skPlayer播放器是GitHub开源项目，著作权归原作者所有，插件预置音乐信息仅为效果示例；<br>
            成品应用仅为满足大众化需求，如需个性化修改欢迎 <a href="http://wpa.qq.com/msgrd?v=3&uin=77940140&site=qq&menu=yes" target="_blank">联系作者</a> 定制；</div></td>
        </tr>
      </table>
      <p><br></p>
    </form>
  </div>
</div>

<script>AddHeaderIcon("<?php echo $bloghost . 'zb_users/plugin/skPlayer/logo.png';?>");</script> 
<?php
require $blogpath . 'zb_system/admin/admin_footer.php';
RunTime();
?>
