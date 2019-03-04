{template:header}
<div class="articleList container">
	<div class="row">
		<div class="col-md-12">
			{if $article.Type==ZC_POST_TYPE_ARTICLE}
				{template:post-single}
			{else}
				{template:post-page}
			{/if}
		</div>
	</div>
</div>
{template:footer}