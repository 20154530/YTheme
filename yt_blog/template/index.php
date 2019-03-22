{* Template Name: mainpage *}
{template:header}
{php}
$accessurl = $_GET['url'];
{/php}
{if $accessurl == 'img'}
{template:post-img}
{else}
<div id="component-article-holder" class="flex-layout-row">
  <div class="article-panel">
    {foreach $articles as $article}
    {if $article.IsTop}
    {template:post-istop}
    {else}
    {template:post-multi}
    {/if}
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
{/if}
{template:footer}