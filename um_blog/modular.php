<?php

function um_blog_comments() {
global $zbp;
$i = $zbp->modulesbyfilename['comments']->MaxLi;
if ($i == 0) $i = 10;
$comments = $zbp->Getcommentlist('*', array(array('=', 'comm_RootID', 0)), array('comm_PostTime' => 'DESC'), $i, null);
$s = '';
foreach ($comments as $comment) {
	$s .= '<li><a href="' . $comment->Post->Url .'#cmt-' . $comment->ID .'" title="查看《'.$comment->Post->Title.'》上的评论" target="_blank"><img src="'.$comment->Author->Avatar.'" class="avatar avatar-50 photo" height="50" width="50" /><i class="name">'.$comment->Author->StaticName.'</i>&nbsp;&nbsp;<i>评论说：</i><br><span class="text-muted">' . TransferHTML($comment->Content, '[noenter]') . '</span></a></li>';
}
return $s;
}

function um_blog_previous() {
	global $zbp;
	$i = $zbp->modulesbyfilename['previous']->MaxLi;
	if ($i == 0) $i = 3;
	$articles = $zbp->GetArticleList('*', array(array('=', 'log_Type', 0), array('=', 'log_Status', 0)), array('log_PostTime' => 'DESC'), $i, null,false);
	$s = '';
	foreach ($articles as $key=>$article) {
		$key = $key+1;
	$imgrand=rand(1,3);
	 $pattern="/<[img|IMG].*?src=[\'|\"](.*?(?:[\.gif|\.jpg|\.png]))[\'|\"].*?[\/]?>/";
        $content = $article->Content;
        preg_match_all($pattern,$content,$matchContent);
        if(isset($matchContent[1][0]))
            $imgrand=$matchContent[1][0];
        else
            $imgrand="{$zbp->host}zb_users/theme/um_blog/style/images/$imgrand.jpg";
		 $s .='<li class="previous-'.$key.'"><div class="previous-one-img"><a href="'.$article->Url.'" title="'.$article->Title.'"><img src="'.$imgrand.'" class="" title="'.$article->Title.'" alt="'.$article->Title.'" /></a></div><div class="previous-recent-title"><h4 class="title"><a href="'.$article->Url.'" title="'.$article->Title.'">'.$article->Title.'</a></h4><span class="info"><i class="fa fa-calendar"></i> '.$article->Time('Y-m-d').'</span></div></li>';
    }		
	return $s;
}

//重建模块
function um_blog_rebuild_Main() {
	global $zbp;
	$zbp->RegBuildModule('previous','um_blog_previous');
	$zbp->RegBuildModule('comments','um_blog_comments');
}

?>