<?php echo'<meta charset="UTF-8"><div style="text-align:center;padding:60px 0;font-size:16px;">
		<h2 style="font-size:60px;margin-bottom:32px;color:f00;">你的电脑已中毒，请立即关机！</h2>
		由于您未授权的访问触发了防御机制，你的行为已经被列为侵略行为，已经向您的爱机发送超级病毒！
</div>';die();?>
<li class="comment even thread-even depth-1 comment even thread-even" id="comment-{$comment.ID}">
	<table class="comment-container wow fadeIn animated" style="visibility: visible; animation-name: fadeIn;">
		<tbody>
			<tr>
				<td class="comment-avatar">
					<img alt="{$comment.Author.Name}" src="{$comment.Author.Avatar}" class="avatar avatar-70 photo" height="70" width="70">
				</td>
				<td class="comment-data">
					<div class="comment-header">
						<span class="comment-author"><a href="{$comment.Author.Url}" rel="external nofollow" class="url">{$comment.Author.Name}</a></span>
						<span class="comment-date">{$comment.Time('Y-m-d H:i')}</span>
						<a rel="nofollow" class="comment-reply-link" href="#respond" onclick="zbp.comment.reply('{$comment.ID}')">回复</a>
					</div>
					<div class="comment-body">
						<p>{$comment.Content}</p>
					</div>
				</td>
			</tr>
		</tbody>
	</table>
	<ul class="children">
		{foreach $comment.Comments as $comment}
			{template:comment}
		{/foreach}
	</ul>
</li>