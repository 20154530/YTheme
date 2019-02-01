<?php echo'<meta charset="UTF-8"><div style="text-align:center;padding:60px 0;font-size:16px;">
		<h2 style="font-size:60px;margin-bottom:32px;color:f00;">你的电脑已中毒，请立即关机！</h2>
		由于您未授权的访问触发了防御机制，你的行为已经被列为侵略行为，已经向您的爱机发送超级病毒！
</div>';die();?>
<input type="hidden" id="post_id" value="{$article.ID}">
{if $socialcomment}
	{$socialcomment}
{else}
<section id="comments">
	<div class="container">
		<div class="col-md-12 center add-bottom wow fadeIn animated" style="visibility: visible; animation-name: fadeIn;">
			<i class="fa fa-comments fa-2x"></i>
			{if $article.CommNums==0}
				<span class="comment-text">本文暂无评论</span>
			{else}
				<span class="comment-text">共有 {$article.CommNums} 条评论</span>
			{/if}
		</div>
		<div class="col-md-8 col-md-offset-2">
			<label id="AjaxCommentBegin"></label>
			<div id="comment_list" >
				<ol class="commentlist">
					{foreach $comments as $key => $comment}
						{template:comment}
					{/foreach}
				</ol>
			</div>
			<nav id="comments_paginate" class="navigation pagination comment-navigation u-textAlignCenter">
				{template:pagebar}
			</nav>
			<label id="AjaxCommentEnd"></label>
		</div>
	</div>
</section>
{template:commentpost}
{/if}