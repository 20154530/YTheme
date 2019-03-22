{* Template Name: img *}
<div id="fixed-large-banner" class="banner-imglayout"
  style="background-image:url({$zbp->Config('yt_blog')->bannerurl});">
  <span class="banner-expand img-authorinfo">{$zbp->Config('yt_blog')->bannerdes}</span>
  <a class="m-pjax banner-expand flex-layout-row" href="#" onClick="javascript:history.back(-1);">
    <span class="segoe ">&#xe845;</span>
    <span >返回上一页</span>
  </a>
</div>
<script>
$(function() {
  $('div#fixed-top-banner').css('display', 'none');
  $('div#fixed-bottom-footer').css('display', 'none');
  var screenheight = $(document.body).height();      
  $('#fixed-large-banner').animate({height:screenheight+'px'},480);
  $(window).resize(function () {    
    var screenheight = $(document.body).height();      
    $('#fixed-large-banner').animate({height:screenheight+'px'},480);
  });
});
</script>