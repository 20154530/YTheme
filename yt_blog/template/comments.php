<input type="hidden" id="post_id" value="{$article.ID}">
{if $socialcomment}
{$socialcomment}
{else}
<div class="comments-title-holder">
  <span class="comments-title">评论区</span>
</div>
<div id="post-comment-list" class="post-comment-list">
  <div id="comments" class="responsesWrapper">
    <label id="AjaxCommentBegin"></label>
    <div id="comment_list">
      <ol class="commentlist">
        {foreach $comments as $key => $comment}
        {template:comment}
        {/foreach}
      </ol>
    </div>
    <nav id="comments_paginate" class="navigation">
      {template:comments-pagebar}
    </nav>
    <label id="AjaxCommentEnd"></label>
    {template:commentpost}
  </div>
</div>
{/if}