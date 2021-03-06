<div id="respond" class="respond" role="form">
	<h2 id="reply-title" class="reply-title">
		回复给 <a href="javascript:;" id="reply-name"></a> 
		<small>
			<a rel="nofollow" id="cancel-comment-reply-link" href="#divCommentPost" style="display:none;">点击这里取消回复。</a>
		</small>
	</h2>
	<form target="_self" method="post" action="{$article.CommentPostUrl}" class="commentform" id="commentform">
		<input type="hidden" name="inpId" id="inpId" value="{$article.ID}" />
		<input type="hidden" name="inpRevID" id="inpRevID" value="0" />
		<textarea class="form-control" rows="3" name="txaArticle" id="txaArticle" onkeydown="if(event.ctrlKey&&event.keyCode==13){document.getElementById('submit').click();return false};" placeholder="在这里输入评论...." tabindex="1" required></textarea>
		<div class="commentform-info">
			{if $user.ID>0}
				<input type="hidden" name="inpName" id="inpName" value="{$user.Name}" />
				<input type="hidden" name="inpEmail" id="inpEmail" value="{$user.Email}" />
				<input type="hidden" name="inpHomePage" id="inpHomePage" value="{$user.HomePage}" />	
			{else}
				<label id="author_name" for="inpName">
					<input class="form-control" id="inpName" type="text" tabindex="2" value="{$user.Name}" name="inpName" placeholder="昵称[必填]" required>
				</label>
				<label id="author_email" for="inpEmail">
					<input class="form-control" id="inpEmail" type="text" tabindex="3" value="{$user.Email}" name="inpEmail" placeholder="邮箱[必填]" required>
				</label>
				<label id="author_website" for="inpHomePage">
					<input class="form-control" id="inpHomePage" type="text" tabindex="4" value="{$user.HomePage}" name="inpHomePage" placeholder="网址(可不填)">
				</label>
			{/if}
		</div>
		<div class="btn-group commentBtn">
			<input name="sumbit" type="submit" id="submit" class="btn btn-sm btn-danger btn-block" tabindex="5" onclick="return zbp.comment.post()" value="发表评论" />
		</div>
	</form>
</div>