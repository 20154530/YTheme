{* Template Name: mainpage *}
{template:header}
<div class="articleList container">
	<div class="row">
		<div class="col-md-12">
			{foreach $articles as $article}
				{if $article.IsTop}
					{template:post-istop}
				{else}
					{template:post-multi}
				{/if}
			{/foreach}
		</div>
	</div>
</div>
<div class="container pageNav">
	<div class="row">	
		<div class="col-md-12">
			<nav>
				<ul class="pagination">
					{template:pagebar}
				</ul>
			</nav>
		</div>
	</div>
</div>
{template:footer}