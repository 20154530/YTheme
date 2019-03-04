{* Template Name: head *}
<!DOCTYPE html>
<html lang="zh-CN">
<head>
<meta charset="utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<title>
{if $type=="index"}
  {$name}{$subname}
{elseif $type=="category"&&$page=="1"}
  {$category.Name}
    {if $category.Metas.fjbt}
    {$category.Metas.fjbt}
    {/if}
  {$name}
{elseif $type=="category"&&$page>"1"}
  {$category.Name}
    {if $category.Metas.fjbt}
    {$category.Metas.fjbt}
    {/if}
  {$name}第{$page}页
{elseif $type=="tag"&&$page=="1"}
  {$tag.Name}
    {if $tag.Metas.fjbt}
    {$tag.Metas.fjbt}
    {/if}
  {$name}
{elseif $type=="tag"&&$page>"1"}
  {$tag.Name}
    {if $tag.Metas.fjbt}
    {$tag.Metas.fjbt}
    {/if}
  {$name}第{$page}页
{elseif $type=="date"&&$page=="1"}
  {$title}{$name}
{elseif $type=="date"&&$page>"1"}
  {$title} {$name}
{elseif $type=="article"}
  {$title}
    {if $article.Metas.fjbt}
    {$article.Metas.fjbt}
    {/if}
    {if $zbp->Config('yt_blog')->post_category=="a"}
    {$article.Category.Name}
    {/if}
  {$name}
{elseif $type=="page"}
  {$title}
    {if $article.Metas.fjbt}
    {$article.Metas.fjbt}
    {/if}
  {$name}
    {if $zbp->Config('yt_blog')->page_subname=="a"}
    {$subname}
    {/if}
{else}
  {$title}{$name}
{/if}
</title>
{if $zbp->Config('yt_blog')->seo=="a"}
  {if $type=='index'}
    <meta name="keywords" content="{$zbp->Config('yt_blog')->keywords}" />
    <meta name="description" content="{$zbp->Config('yt_blog')->description}" />
  {elseif $type=='page'}
    {if $article.Metas.gjc}
      <meta name="keywords" content="{$article.Metas.gjc}"/>
    {else}
      <meta name="keywords" content="{$title},{$name}"/>
    {/if}
    {if $article.Metas.ms}
      <meta name="description" content="{$article.Metas.ms}" />
    {else}
      {php}$description = preg_replace('/[\r\n\s]+/', ' ', trim(SubStrUTF8(TransferHTML($article->Content,'[nohtml]'),135)).'...');{/php}
      <meta name="description" content="{$description}"/>
		{/if}
  	<meta name="author" content="{$article.Author.StaticName}" />
	{elseif $type=='article'}
		{if $article.Metas.gjc}
				<meta name="keywords" content="{$article.Metas.gjc}" />
		{else}
				<meta name="keywords" content="{foreach $article.Tags as $tag}{$tag.Name},{/foreach}" />
		{/if}
		{if $article.Metas.ms}
				<meta name="description" content="{$article.Metas.ms}" />
		{else}
				<meta name="description" content="{$article.Title}是{$name}中一篇关于{foreach $article.Tags as $tag}{$tag.Name}{/foreach}的文章，欢迎您阅读和评论,{$name}" />
		{/if}
	{elseif $type=='category'}
		{if $category.Metas.gjc}
				<meta name="keywords" content="{$category.Metas.gjc}" />
		{else}
				<meta name="keywords" content="{$title},{$name}">
		{/if}
		{if $category.Metas.ms}
				<meta name="description" content="{$category.Metas.ms}" />
		{else}
				<meta name="description" content="{$category.Intro}">
		{/if}
	{elseif $type=='tag'}
		{if $tag.Metas.gjc}
				<meta name="keywords" content="{$tag.Metas.gjc}" />
		{else}
				<meta name="keywords" content="{$title},{$name}">
		{/if}
		{if $tag.Metas.ms}
				<meta name="description" content="{$tag.Metas.ms}" />
		{else}
				<meta name="description" content="{$tag.Intro}">
		{/if}
	{else}
			<meta name="Keywords" content="{$title},{$name}" />
			<meta name="description" content="{$title}-{$name}" />
	{/if}
	{/if}
  <meta name="HandheldFriendly" content="True" /> 
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link rel="shortcut icon" href="{$zbp->Config('yt_blog')->tx}">
	<script src="{$host}zb_system/script/jquery-2.2.4.min.js" type="text/javascript"></script>
	<script src="{$host}zb_system/script/zblogphp.js" type="text/javascript"></script>
	<script src="{$host}zb_system/script/c_html_js_add.php" type="text/javascript"></script>
  <link rel="stylesheet" type="text/css" href="{$host}zb_users/theme/yt_blog/style/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="{$host}zb_users/theme/yt_blog/style/css/font-awesome.min.css">  
  <link rel="stylesheet" type="text/css" media="all" href="{$host}zb_users/theme/yt_blog/style/style.css"/>
	<!--[if lt IE 9]>
	  <script src="{$host}zb_users/theme/yt_blog/stylejs/html5shiv.min.js"></script>
	  <script src="{$host}zb_users/theme/yt_blog/stylejs/respond.min.js"></script>
	<![endif]-->
	{if $type=='index'&&$page=='1'}
		<link rel="alternate" type="application/rss+xml" href="{$feedurl}" title="{$name}" />
		<link rel="EditURI" type="application/rsd+xml" title="RSD" href="{$host}zb_system/xml-rpc/?rsd" />
		<link rel="wlwmanifest" type="application/wlwmanifest+xml" href="{$host}zb_system/xml-rpc/wlwmanifest.xml" />
	{/if}
	{$header}
</head>
<body>
	<form role="search" name="search" method="post" class="search-form" action="{$host}zb_system/cmd.php?act=search">
		<span class="search-close">&times;</span>
		<label>
			<input type="search" class="search-field" placeholder="请输入关键字搜索" value="" name="q" id="edtSearch" autocomplete="off">
		</label>
		<input type="submit" class="search-submit" value="搜索">
	</form>
	<div class="banner" style="background: url({$zbp->Config('yt_blog')->banner});">
		<div class="menu menuicon hidden-xs">
			<i class="fa fa-bars"></i>
		</div>
		<div class="header container">
			<div class="row">
				<div class="col-md-12">
					<div class="personInfo">
						<div class="logo"><a href="{$host}"><img src="{$zbp->Config('yt_blog')->tx}" alt="{$name}"></a></div>
						<div class="logoTheme">
							<h1>{$zbp->Config('yt_blog')->explain1}</h1>
							<h3>{$zbp->Config('yt_blog')->explain2}</h3>
						</div>
					</div>				
				</div>
			</div>
		</div> 
	</div>