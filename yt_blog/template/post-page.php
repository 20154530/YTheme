<div class="article-detail">
  <div class="title">{$article.Title}</div>
  <div class="secTitleBar flex-layout-row">
    <div>
      <span class="label-h">文章分类</span>
      <span class="label-t"><a href="{$article.Category.Url}" class="m-pjax"
          rel="category tag">{$article.Category.Name}</a></span>
    </div>
    <div>
      <span class="label-h">创建时间</span>
      <span class="label-t">{$article.Time('Y-m-d')} </span>
    </div>
    <div>
      <span class="label-h">浏览次数</span>
      <span class="label-t">{$article.ViewNums} </span>
    </div>
    <div>
      <span class="label-h">评论</span>
      <span class="label-t"><a href="#comments">{$article.CommNums}</a> </span>
    </div>
  </div>
  <div class="articleCon">{$article.Content}</div>
  <div class="articleTagsBox">
    <ul>
      <span class="segoe">&#xE8EC;</span>
      {if !$article.Tags}
      <a href="javascript:;" class="m-pjax" rel="tag">未标识</a>
      {else}
      {foreach $article.Tags as $tag}
      <a href="{$tag.Url}" class="m-pjax" rel="tag">{$tag.Name}</a>
      {/foreach}
      {/if}
    </ul>
    <div class="bdsharebuttonbox share">
      <a href="#" class="bds_more" data-cmd="more"></a>
      <a href="#" class="bds_qzone" data-cmd="qzone" title="分享到QQ空间"></a>
      <a href="#" class="bds_tsina" data-cmd="tsina" title="分享到新浪微博"></a>
      <a href="#" class="bds_tqq" data-cmd="tqq" title="分享到腾讯微博"></a>
      <a href="#" class="bds_renren" data-cmd="renren" title="分享到人人网"></a>
      <a href="#" class="bds_weixin" data-cmd="weixin" title="分享到微信"></a>
    </div>
  </div>
  <script>
  window._bd_share_config = {
    "common": {
      "bdSnsKey": {},
      "bdText": "",
      "bdMini": "2",
      "bdMiniList": false,
      "bdPic": "",
      "bdStyle": "1",
      "bdSize": "24"
    },
    "share": {}
  };
  with(document) 0[(getElementsByTagName('head')[0] || body).appendChild(createElement('script')).src =
    'http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion=' + ~(-new Date() / 36e5)];
  </script>
  {if !$article.IsLock}
  {template:comments}
  {/if}
</div>