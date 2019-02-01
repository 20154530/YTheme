<?php echo'<meta charset="UTF-8"><div style="text-align:center;padding:60px 0;font-size:16px;">
		<h2 style="font-size:60px;margin-bottom:32px;color:f00;">你的电脑已中毒，请立即关机！</h2>
		由于您未授权的访问触发了防御机制，你的行为已经被列为侵略行为，已经向您的爱机发送超级病毒！
</div>';die();?>
{if $zbp->Config('rokoPhotoLite')->page}
	{php}$page = $zbp->Config('rokoPhotoLite')->page;{/php}
	{$related=GetPost((int)$page)}
	<section id="bsocials">
      <div class="container wow bounceIn" data-wow-delay="0.6s">
        <p>&gt;&gt; <span class="follow"><a href="{$related.Url}" target="_blank">{$related.Title}</a></span> &lt;&lt;</p>
      </div>
    </section>
{/if}
    <div id="footer-nav">
	{if $type=='index'}
	  <ul>
		<li>友情链接：</li>
		{module:link}
	  </ul>
	{/if}
      <span>
		{$copyright}
		<br/>
        Theme By <a href="https://www.songhaifeng.com/" target="_blank">小锋博客</a> powered by {$zblogphpabbrhtml}
	  </span>
    </div>
	<script type='text/javascript' src='{$host}zb_users/theme/rokoPhotoLite/style/js/navigation.js'></script>
    <script type='text/javascript' src='{$host}zb_users/theme/rokoPhotoLite/style/js/bootstrap.js'></script>
    <script type='text/javascript' src='{$host}zb_users/theme/rokoPhotoLite/style/js/wow.min.js'></script>
    <script type='text/javascript' src='{$host}zb_users/theme/rokoPhotoLite/style/js/cbpanimatedheader.js'></script>
    <script type='text/javascript' src='{$host}zb_users/theme/rokoPhotoLite/style/js/classie.js'></script>
    <script type='text/javascript' src='{$host}zb_users/theme/rokoPhotoLite/style/js/main.js'></script>
	{$footer}
  </body>
</html>