{template:header}
<div id="component-article-holder" class="flex-layout-row">
  <div class="article-panel">
    {if $article.Type==ZC_POST_TYPE_ARTICLE}
    {template:post-single}
    {else}
    {template:post-page}
    {/if}
  </div>
</div>
{template:footer}