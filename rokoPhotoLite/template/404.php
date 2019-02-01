<?php echo'<meta charset="UTF-8"><div style="text-align:center;padding:60px 0;font-size:16px;">
		<h2 style="font-size:60px;margin-bottom:32px;color:f00;">警告</h2>
		<h2 style="font-size:60px;margin-bottom:32px;color:f00;">这是未经授权的访问</h2>
</div>';die();?>
{* Template Name:404错误页 *}
{template:header}
<div class="blog">
	<div class="container">
		<div class="row">
			<div class="blog-posts">
				<div class="col-lg-8 col-lg-offset-2">
					<div class="post wow fadeIn animated" data-wow-duration="2s" style="visibility: visible; animation-duration: 2s; animation-name: fadeIn;">
						<h2>404 Nothing Found</h2>
						<p>看来我们找不您要找的东西了，也许搜索可以帮到您：</p>
						<form name="search" method="post" class="searchform" action="{$host}zb_system/cmd.php?act=search">
							<div>
								<input type="text" value="" name="q" id="edtSearch">
								<input type="submit" id="btnPost" value="Search">
							</div>
						</form>
					</div>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
</div>
{template:footer}