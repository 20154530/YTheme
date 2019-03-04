<div class="articleContent">
	<div class="title">{$article.Title}</div>
	<div class="secTitleBar">
		<ul>
			<li>分类：<a href="{$article.Category.Url}" rel="category tag">{$article.Category.Name}</a></li>
			<li>发表：{$article.Time('Y-m-d')}</li>
			<li>围观({$article.ViewNums})</li>
			{if $article.CommNums==0}
				<li><a href="#comments">抢沙发</a></li>
			{else}
				<li><a href="#comments">评论({$article.CommNums})</a></li>
			{/if}
		</ul>
	</div>
	<div class="articleCon post_content">{$article.Content}</div>
	<div class="articleTagsBox">
		<ul>
			<span>标签：</span>
			{if $article.Tags}
				{foreach $article.Tags as $tag}
					<a href="{$tag.Url}" rel="tag">{$tag.Name}</a>
				{/foreach}
			{else}
				<a href="javascript:;" rel="tag">本文暂时没有添加标签</a>
			{/if}
		</ul>
	</div>
	{if $zbp->Config('yt_blog')->share_switch == 'a'}
		{if $zbp->Config('yt_blog')->share}
			<div class="share">{$zbp->Config('yt_blog')->share}</div>
		{else}
			<div class="bdsharebuttonbox share"><a href="#" class="bds_more" data-cmd="more"></a><a href="#" class="bds_qzone" data-cmd="qzone" title="分享到QQ空间"></a><a href="#" class="bds_tsina" data-cmd="tsina" title="分享到新浪微博"></a><a href="#" class="bds_tqq" data-cmd="tqq" title="分享到腾讯微博"></a><a href="#" class="bds_renren" data-cmd="renren" title="分享到人人网"></a><a href="#" class="bds_weixin" data-cmd="weixin" title="分享到微信"></a></div>
			<script>window._bd_share_config={"common":{"bdSnsKey":{},"bdText":"","bdMini":"2","bdMiniList":false,"bdPic":"","bdStyle":"1","bdSize":"24"},"share":{}};with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion='+~(-new Date()/36e5)];</script>
		{/if}
	{/if}
	{if !$article.IsLock}
		{template:comments}
	{/if}
</div>