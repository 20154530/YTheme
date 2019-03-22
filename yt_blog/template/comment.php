{* Template Name: comment *}
<li class="comment" id="comment-{$comment.ID}">
	<div class="media">
		<div class="media-left">
      <img alt='avatar' src='{$comment.Author.Avatar}' class='avatar avatar-48 photo' height='48' width='48' />
		</div>
   		<div class="media-body">
   			<p class="author_name">{$comment.Author.Name}</p>
			<p>{$comment.Content}</p>
   		</div>
   	</div>
   	<div class="comment-metadata">
   		<span class="comment-pub-time">{$comment.Time('Y-m-d H:i')}</span>
   		<span class="comment-btn-reply">
 			<i class="fa fa-reply"></i> <a rel='nofollow' class='comment-reply-link' href='#respond' onclick="zbp.comment.reply('{$comment.ID}')">回复</a> 
   		</span>
   	</div>
	<ol class="children">
		{foreach $comment.Comments as $comment}
			{template:comment}
		{/foreach}
	</ol>
</li>
