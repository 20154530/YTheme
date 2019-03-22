{template:header}
<div id="component-article-holder" class="flex-layout-row">
  <div class="article-panel">
			{foreach $articles as $article}
				{template:post-multi}
			{/foreach}
	</div>
</div>
<div id="component-pagenavi" class="flex-layout-row">
  <div class="pagenavi-holder">
    <nav>
      <ul class="pagination">
        {template:pagebar}
      </ul>
    </nav>
  </div>
</div>
{template:footer}
