<?php echo'<meta charset="UTF-8"><div style="text-align:center;padding:60px 0;font-size:16px;">
		<h2 style="font-size:60px;margin-bottom:32px;color:f00;">你的电脑已中毒，请立即关机！</h2>
		由于您未授权的访问触发了防御机制，你的行为已经被列为侵略行为，已经向您的爱机发送超级病毒！
</div>';die();?>
	<div id="commentform">
      <div class="container wow fadeIn">
        <div class="row">
          <div class="col-md-10 col-md-offset-1">
            <div id="respond" class="comment-respond">
              <h3 id="reply-title" class="comment-reply-title">发表评论
                <small>
                  <a rel="nofollow" id="cancel-comment-reply-link" href="#divCommentPost" style="display:none;">取消回复</a>
				</small>
              </h3>
              <form action="{$article.CommentPostUrl}" method="post" id="commentform" class="comment-form">
				<input type="hidden" name="inpId" id="inpId" value="{$article.ID}" />
				<input type="hidden" name="inpRevID" id="inpRevID" value="0" />
                <p class="comment-notes">
                  您的电子邮件地址不会被发布。
				</p>
                <div class="col-md-6 wow fadeIn comment-login">
                  <div class="form-group {if $option['ZC_COMMENT_VERIFY_ENABLE']}txaArticle{/if}">
                    <textarea class="form-control" placeholder="Your Message" id="txaArticle" name="txaArticle"></textarea>
                    <p class="help-block text-danger"></p>
                  </div>
                </div>
                <div class="col-md-6">
				  {if $user.ID>0}
				    <input type="hidden" name="inpName" id="inpName" value="{$user.Name}" />
				    <input type="hidden" name="inpEmail" id="inpEmail" value="{$user.Email}" />
				    <input type="hidden" name="inpHomePage" id="inpHomePage" value="{$user.HomePage}" />
				  {else}
					<div class="form-group wow fadeIn">
                      <input id="inpName" name="inpName" type="text" class="form-control" value="" placeholder="Your Name *">
                      <p class="help-block text-danger"></p>
                    </div>
                    <div class="form-group wow fadeIn">
                      <input id="inpEmail" name="inpEmail" type="email" class="form-control" value="" placeholder="Your Email *">
                      <p class="help-block text-danger"></p>
                    </div>
                    <div class="form-group wow fadeIn">
                      <input id="inpHomePage" name="inpHomePage" type="text" class="form-control" placeholder="Your Website">
				    </div>
					{if $option['ZC_COMMENT_VERIFY_ENABLE']}
						<div class="form-group inpVerify wow fadeIn">
						  <input id="inpVerify" name="inpVerify" type="text" class="form-control" placeholder="Verification Code">
						  <img src="{$article.ValidCodeUrl}" alt="" title="" onclick="javascript:this.src='{$article.ValidCodeUrl}&amp;tm='+Math.random();"/>
						  <div class="clearfix"></div>
						</div>
					{/if}
				  {/if}
                </div>
                <p class="form-submit">
                  <input name="submit" type="submit" id="submit" class="submit" onclick="return zbp.comment.post()" value="发表评论" />
				</p>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>