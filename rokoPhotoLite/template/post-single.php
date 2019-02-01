<?php echo'<meta charset="UTF-8"><div style="text-align:center;padding:60px 0;font-size:16px;">
		<h2 style="font-size:60px;margin-bottom:32px;color:f00;">你的电脑已中毒，请立即关机！</h2>
		由于您未授权的访问触发了防御机制，你的行为已经被列为侵略行为，已经向您的爱机发送超级病毒！
</div>';die();?>
	<div class="blog">
      <div class="container">
        <div class="row">
          <div class="blog-post post type-post status-publish format-standard has-post-thumbnail hentry category-life category-outside category-photography category-sport">
            <div class="col-lg-8 col-lg-offset-2">
              <div class="post wow fadeIn" data-wow-duration="2s">
                <h2>
                  <a href="{$article.Url}">{$article.Title}</a>
				</h2>
                <ul class="list-inline">
					<li>Post By:<a href="{$article.Author.Url}" title="{$article.Author.StaticName}" rel="author">{$article.Author.StaticName}</a></li>
					<li>Date:<time>{$article.Time('Y-m-d')}</time></li>
					<li>Category:<a href="{$article.Category.Url}" rel="category tag">{$article.Category.Name}</a></li>
					<li>围观({$article.ViewNums})</li>
					{if $article.CommNums==0}
						<li><a href="#comments">抢沙发</a></li>
					{else}
						<li><a href="#comments">评论({$article.CommNums})</a></li>
					{/if}
				</ul>
				<div class="blog-content">
					{$article.Content}
				</div>
              </div>
            </div>
            <div class="clearfix"></div>
          </div>
        </div>
      </div>
    </div>
	{if !$article.IsLock}
		{template:comments}
	{/if}