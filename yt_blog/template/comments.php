<input type="hidden" id="post_id" value="{$article.ID}">
{if $socialcomment}
	{$socialcomment}
{else}
	<div class="post_content post-comment-list" id="post-comment-list">
		<div id="comments" class="responsesWrapper">
			{if $article.CommNums==0}
				<h3 class="comments-title">本文 <span class="commentCount">暂无</span> 评论</h3>
			{else}
				<h3 class="comments-title">共有 <span class="commentCount">{$article.CommNums}</span> 条评论</h3>
			{/if}
			<label id="AjaxCommentBegin"></label>
			<div id="comment_list" >
			<ol class="commentlist" >
				{foreach $comments as $key => $comment}
					{template:comment}
				{/foreach}
				</ol>
			</div>
			<nav id="comments_paginate" class="navigation comment-navigation u-textAlignCenter">
				{template:comments-pagebar}
			</nav>
			<label id="AjaxCommentEnd"></label>
			{template:commentpost}
		</div>
	</div>
{/if}