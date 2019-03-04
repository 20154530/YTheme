{* Template Name: head *}
<footer>
  <div class="main-footer">
    <div class="container">
      <div class="row footrow">
        <div class="col-md-3">
          <div class="widget catebox">
            <h4 class="title">分类目录</h4>
            <div class="box category clearfix">
              {php}$Catenews=$zbp->GetCategoryList(array('*'),null);{/php}
              {foreach $Catenews as $Catenew}
              <li class="cat-item cat-item-33"><a href="{$Catenew.Url}">{$Catenew.Name}</a></li>
              {/foreach}
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="widget tagbox">
            <h4 class="title">文章标签</h4>
            <div class="box tags clearfix">
              <ul class="post_tags">
                {php}$tagArray =
                $zbp->GetTagList('','',array('tag_Count'=>'DESC'),array($zbp->Config('yt_blog')->tag_num),'');{/php}
                {foreach $tagArray as $tag}
                <li><a href='{$tag.Url}' title='{$tag.Name} Tag' class='{$tag.Name}'>{$tag.Name} ({$tag.Count})</a></li>
                {/foreach}
              </ul>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="widget linkbox">
            {if $type=='index'&&$page=='1'}
            <h4 class="title">友情链接</h4>
            <div class="box friend-links clearfix">
              {module:link}
            </div>
            {else}
            <h4 class="title">最近发表</h4>
            <div class="box previous clearfix">
              {module:previous}
            </div>
            {/if}
          </div>
        </div>
        <div class="col-md-2">
          <div class="widget contactbox">

          </div>
        </div>
      </div>
      <div class="row">
        <div class="copyright">

        </div>
      </div>
    </div>
  </div>
</footer>
<!-- floatcontrol -->
<!-- <div class="icon-search"><i class="fa fa-search"></i></div> -->
<div class="container">
  <div class="row footer-side-home">
  <i></i>
  </div>
  <div class="row footer-side-login">
  <i class="fa fa-user"></i>
  </div>
  <div class="row footer-side-totop">
  </div>
</div>
<div class="menu mobile-menuicon"><i class="fa fa-bars"></i></div>
<a class="to-top"><span class="topicon"><i class="fa fa-angle-up"></i></span><span class="toptext">Top</span></a>
<div class="menubox">
  <div class="container">
    <div class="row">
      <div class="col-xs-12">
        <ul id="menu-menu" class="icon-list">
          {php}$Catenews=$zbp->GetCategoryList(array('*'),null);{/php}
          {foreach $Catenews as $Catenew}
          <li class="menu-item menu-item-type-taxonomy menu-item-object-category"><a
              href="{$Catenew.Url}">{$Catenew.Name}</a></li>
          {/foreach}
        </ul>
      </div>
    </div>
  </div>
  <a href="javascript:;" class="menu-close">&times;</a>
</div>
<script src="{$host}zb_users/theme/yt_blog/style/js/jquery.totop.min.js"></script>
<script src="{$host}zb_users/theme/yt_blog/style/js/menu.js"></script>
<script>
$('.to-top').toTop({
  position: false,
  offset: 1000,
});
// $('.icon-search').click(function(){
// 	$('.search-form').css('top','50%');
// 	$('.search-form').css('marginTop','-80px');
// 	$('.search-form').css('opacity','1');
// });
// $('.search-close').click(function(){
// 	$('.search-form').css('top','0');
// 	$('.search-form').css('opacity','0');
// });
</script>
</body>

</html>