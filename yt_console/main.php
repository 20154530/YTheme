<?php
require '../../../zb_system/function/c_system_base.php';
require '../../../zb_system/function/c_system_admin.php';
$zbp->Load();
$action = 'root';
if (!$zbp->CheckRights($action)) {
  $zbp->ShowError(6);
  die();
}
if (!$zbp->CheckPlugin('yt_console')) {
  $zbp->ShowError(48);
  die();
}

$blogtitle = 'yt_console';
require $blogpath . 'zb_system/admin/admin_header.php';
require $blogpath . 'zb_system/admin/admin_top.php';

if (isset($_POST['Items'])) {
  foreach ($_POST['Items'] as $key => $val) {
    $zbp->Config('yt_console')->$key = $val;
  }
  $zbp->SaveConfig('yt_console');
  $zbp->ShowHint('good');
}
?>
<style type="text/css">
.xtips {
  color: #999;
  margin-left: 15px
}

div.xtips {
  line-height: 1.5;
  padding: 6px 0;
}

textarea {
  font-size: 12px;
  margin-bottom: 3px;
}
</style>
<div>
  <form id="form1" name="form1" method="post">
    <table class="tb-set" width="100%">
      <tr height="50">
        <td width="180" align="right"><b>登录背景图片url</b></td>
        <td><input name="Items[loginbgurl]" type="text"
            value="<?php echo $zbp->Config('yt_console')->loginbgurl; ?>"><span class="xtips">默认背景:
            <?php echo $zbp->host . 'zb_users/plugin/yt_console/res/img/login_bg.jpg'?></span></td>
      </tr>
      <tr height="50">
        <td width="180" align="right"><b>登录背景图片描述</b></td>
        <td><input name="Items[loginbgdes]" type="text"
            value="<?php echo $zbp->Config('yt_console')->loginbgdes; ?>"><span class="xtips">默认背景描述(不允许',')</span></td>
      </tr>
      <tr>
        <td height="80">&nbsp;</td>
        <td valign="top"><input type="submit" name="submit" value="保存设置"></td>
      </tr>
    </table>
    <p><br></p>
  </form>
</div>

<script type="text/javascript">
AddHeaderIcon("<?php echo $zbp->host . 'zb_users/plugin/yt_console/res/img/logo.png'; ?>");
</script>
<?php
require $blogpath . 'zb_system/admin/admin_footer.php';
RunTime();
?>