<?php echo'<meta charset="UTF-8"><div style="text-align:center;padding:60px 0;font-size:16px;">
		<h2 style="font-size:60px;margin-bottom:32px;color:f00;">你的电脑已中毒，请立即关机！</h2>
		由于您未授权的访问触发了防御机制，你的行为已经被列为侵略行为，已经向您的爱机发送超级病毒！
</div>';die();?>
{php}IMAGE::getPics($article,750,530,4);{/php}
{if $article->IMAGE_COUNT>0}
<div class="blog-posts post type-post status-publish format-standard has-post-thumbnail hentry category-life category-outside category-photography category-sport">
	<div class="col-lg-8 col-lg-offset-2">
		<div class="post wow fadeIn" data-wow-duration="2s">
			<h2>
				<a href="{$article.Url}">{$article.Title}</a>
			</h2>
			<ul class="list-inline">
				<li>Post By:<a href="{$article.Author.Url}" title="{$article.Author.StaticName}" rel="author">{$article.Author.StaticName}</a></li>
				<li>Date:<time>{$article.Time('Y-m-d')}</time></li>
				<li>Category:<a href="{$article.Category.Url}" rel="category tag">{$article.Category.Name}</a></li>
			</ul>
			<picture>
				{if $article->Metas->thumbnail}
					<img width="750" height="533" src="{$article->Metas->thumbnail}" class="img-responsive wp-post-image" alt="{$article.Title}" />
				{else}
					<img width="750" height="533" src="{$article.IMAGE[0]}" class="img-responsive wp-post-image" alt="{$article.Title}" />
				{/if}
			</picture>
			{php}$description = trim(SubStrUTF8(TransferHTML($article->Content,'[nohtml]'),128)).'...';{/php}
			<p>{$description}</p>
			<a href="{$article.Url}" class="btn btn-primary">Read More</a>
		</div>
	</div>
	<div class="clearfix"></div>
	<div class="divider"></div>
</div>
{else}
<div class="blog-posts post type-post status-publish format-standard hentry category-uncategorized">
	<div class="col-lg-8 col-lg-offset-2">
		<div class="post wow fadeIn" data-wow-duration="2s">
			<h2>
				<a href="{$article.Url}">{$article.Title}</a>
			</h2>
			<ul class="list-inline">
				<li>Post By:<a href="{$article.Author.Url}" title="{$article.Author.StaticName}" rel="author">{$article.Author.StaticName}</a></li>
				<li>Date:<time>{$article.Time('Y-m-d')}</time></li>
				<li>Category:<a href="{$article.Category.Url}" rel="category tag">{$article.Category.Name}</a></li>
			</ul>
			{php}$description = trim(SubStrUTF8(TransferHTML($article->Content,'[nohtml]'),128)).'...';{/php}
			<p>{$description}</p>
			<a href="{$article.Url}" class="btn btn-primary">Read More</a>
		</div>
	</div>
	<div class="clearfix"></div>
	<div class="divider"></div>
</div>
{/if}