<?php echo'<meta charset="UTF-8"><div style="text-align:center;padding:60px 0;font-size:16px;">
		<h2 style="font-size:60px;margin-bottom:32px;color:f00;">你的电脑已中毒，请立即关机！</h2>
		由于您未授权的访问触发了防御机制，你的行为已经被列为侵略行为，已经向您的爱机发送超级病毒！
</div>';die();?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    {if $zbp->Config('rokoPhotoLite')->seo=="b"}
		<title>{$name}-{$subname}</title>
	{else}
		<title>{if $type=="index"}{$name}-{$subname}{elseif $type=="category"&&$page=="1"}{$category.Name}{if $category.Metas.fjbt}-{$category.Metas.fjbt}{/if}-{$name}{elseif $type=="category"&&$page>"1"}{$category.Name}{if $category.Metas.fjbt}-{$category.Metas.fjbt}{/if}-{$name}-第{$page}页{elseif $type=="tag"&&$page=="1"}{$tag.Name}{if $tag.Metas.fjbt}-{$tag.Metas.fjbt}{/if}-{$name}{elseif $type=="tag"&&$page>"1"}{$tag.Name}{if $tag.Metas.fjbt}-{$tag.Metas.fjbt}{/if}-{$name}-第{$page}页{elseif $type=="date"&&$page=="1"}{$title} {$name}{elseif $type=="date"&&$page>"1"}{$title} {$name}{elseif $type=="article"}{$title}{if $article.Metas.fjbt}-{$article.Metas.fjbt}{/if}{if $zbp->Config('rokoPhotoLite')->post_category=="a"}-{$article.Category.Name}{/if}-{$name}{elseif $type=="page"}{$title}{if $article.Metas.fjbt}-{$article.Metas.fjbt}{/if}-{$name}{if $zbp->Config('rokoPhotoLite')->page_subname=="a"}-{$subname}{/if}{else}{$title}-{$name}{/if}</title>
	{/if}
	{if $zbp->Config('rokoPhotoLite')->seo=="a"}
		{if $type=='index'}
			<meta name="keywords" content="{$zbp->Config('rokoPhotoLite')->keywords}" />
			<meta name="description" content="{$zbp->Config('rokoPhotoLite')->description}" />
		{elseif $type=='page'}
			{if $article.Metas.keywords}
				<meta name="keywords" content="{$article.Metas.keywords}"/>
			{else}
				<meta name="keywords" content="{$title},{$name}"/>
			{/if}
			{if $article.Metas.description}
				<meta name="description" content="{$article.Metas.description}" />
			{else}
				{php}$description = preg_replace('/[\r\n\s]+/', ' ', trim(SubStrUTF8(TransferHTML($article->Content,'[nohtml]'),135)).'...');{/php}
				<meta name="description" content="{$description}"/>
			{/if}
			<meta name="author" content="{$article.Author.StaticName}" />
		{elseif $type=='article'}
			{if $article.Metas.keywords}
				<meta name="keywords" content="{$article.Metas.keywords}" />
			{else}
				<meta name="keywords" content="{foreach $article.Tags as $tag}{$tag.Name},{/foreach}" />
			{/if}
			{if $article.Metas.description}
				<meta name="description" content="{$article.Metas.description}" />
			{else}
				<meta name="description" content="{$article.Title}是{$name}中一篇关于{foreach $article.Tags as $tag}{$tag.Name}{/foreach}的文章，欢迎您阅读和评论,{$name}" />
			{/if}
		{elseif $type=='category'}
			{if $category.Metas.keywords}
				<meta name="keywords" content="{$category.Metas.keywords}" />
			{else}
				<meta name="keywords" content="{$title},{$name}">
			{/if}
			{if $category.Metas.description}
				<meta name="description" content="{$category.Metas.description}" />
			{else}
				<meta name="description" content="{$category.Intro}">
			{/if}
		{elseif $type=='tag'}
			{if $tag.Metas.keywords}
				<meta name="keywords" content="{$tag.Metas.keywords}" />
			{else}
				<meta name="keywords" content="{$title},{$name}">
			{/if}
			{if $tag.Metas.description}
				<meta name="description" content="{$tag.Metas.description}" />
			{else}
				<meta name="description" content="{$tag.Intro}">
			{/if}
		{else}
			<meta name="Keywords" content="{$title},{$name}" />
			<meta name="description" content="{$title}-{$name}" />
		{/if}
	{/if}
	<link rel="stylesheet" href="{$host}zb_users/theme/rokoPhotoLite/style/style.css" />
    <link rel="stylesheet" href="{$host}zb_users/theme/rokoPhotoLite/style/css/font-awesome.min.css" type="text/css" media="all" />
    <script src="{$host}zb_system/script/jquery-2.2.4.min.js" type="text/javascript"></script>
	<script src="{$host}zb_system/script/zblogphp.js" type="text/javascript"></script>
	<script src="{$host}zb_system/script/c_html_js_add.php" type="text/javascript"></script>
    <!--[if lt IE 9]>
      <script src="{$host}zb_users/theme/rokoPhotoLite/style/js/html5shiv.min.js"></script>
      <script src="{$host}zb_users/theme/rokoPhotoLite/style/js/respond.min.js"></script>
    <![endif]-->
	<link rel="shortcut icon" href="{$host}favicon.ico" />
	{if $type=='index'&&$page=='1'}
		<link rel="alternate" type="application/rss+xml" href="{$feedurl}" title="{$name}" />
		<link rel="EditURI" type="application/rsd+xml" title="RSD" href="{$host}zb_system/xml-rpc/?rsd" />
		<link rel="wlwmanifest" type="application/wlwmanifest+xml" href="{$host}zb_system/xml-rpc/wlwmanifest.xml" />
	{/if}
	{$header}
</head>

<body class="{if $type=='article'}post-template-default single single-post postid-51 single-format-standard{elseif $type=='page'}page-template-default page{else}home blog{/if}">
    <div id="preloader">
      <div id="status">&nbsp;</div>
	</div>
    <nav id="site-navigation" role="navigation" class="main-navigation navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header page-scroll">
          <button type="button" class="menu-toggle navbar-toggle" aria-controls="menu" aria-expanded="false">
            <span class="sr-only">Toggle Navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="{$host}">
            <img src="{if $zbp->Config('rokoPhotoLite')->logo}{$zbp->Config('rokoPhotoLite')->logo}{else}{$host}zb_users/theme/rokoPhotoLite/style/images/logo.png{/if}" alt="logo">
		  </a>
        </div>
        <ul class="nav navbar-nav navbar-right">
          {module:navbar}
        </ul>
      </div>
    </nav>
    <section id="blog" style="background-image: url('{if $zbp->Config('rokoPhotoLite')->bg}{$zbp->Config('rokoPhotoLite')->bg}{else}{$host}zb_users/theme/rokoPhotoLite/style/images/services.jpg{/if}');">
      <div class="dark-overlay vision">
        <div class="centered vision-border wow bounceIn">
          <h4>Welcome to</h4>
          <h2>
            <a href="{$host}">{$name}</a>
		  </h2>
		  {if $type=='index' && $page!='1'}
		    <h6>首页 / 第 {$pagebar.PageNow} 页</h6>
		  {elseif $type=='index'}
		  {elseif $type=='article'}
			<h6>首页 / <a href="{$article.Category.Url}">{$article.Category.Name}</a> / {$article.Title}</h6>
		  {elseif $type=='page'}
		    <h6>首页 / {$article.Title}</h6>
		  {elseif $type=='category'}
			<h6>首页 / <a href="{$category.Url}">{$category.Name}</a> {if $pagebar}/ 第 {$pagebar.PageNow} 页{/if}</h6>
		  {elseif $type=='tag'}
			<h6>首页 / <a href="{$tag.Url}">{$tag.Name}</a> {if $pagebar}/ 第 {$pagebar.PageNow} 页{/if}</h6>
		  {else}
			<h6>首页 / 其它</h6>
		  {/if}
		</div>
      </div>
    </section>