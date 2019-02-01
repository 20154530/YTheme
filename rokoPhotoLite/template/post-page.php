<?php echo'<meta charset="UTF-8"><div style="text-align:center;padding:60px 0;font-size:16px;">
		<h2 style="font-size:60px;margin-bottom:32px;color:f00;">你的电脑已中毒，请立即关机！</h2>
		由于您未授权的访问触发了防御机制，你的行为已经被列为侵略行为，已经向您的爱机发送超级病毒！
</div>';die();?>
	<div class="blog">
      <div class="container">
        <div class="row">
          <div class="blog-post page type-page status-publish hentry">
            <div class="col-lg-8 col-lg-offset-2">
              <div class="post wow fadeIn" data-wow-duration="2s">
                <h2><a href="{$article.Url}">{$article.Title}</a></h2>
                <div class="blog-content">
				  {$article.Content}
				</div>
			  </div>
            </div>
            <div class="clearfix"></div>
            <div class="divider"></div>
          </div>
        </div>
      </div>
    </div>
	{if !$article.IsLock}
		{template:comments}
	{/if}