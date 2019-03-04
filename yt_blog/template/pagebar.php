{if $pagebar}
	{foreach $pagebar.buttons as $k=>$v}
		{if $pagebar.PageNow==$k}
			<li><span class='page-numbers current'>{$k}</span></li>
		{elseif $k=='‹‹' and $pagebar.PageNow!=$pagebar.PageFirst}
		{elseif $k=='‹‹' and $pagebar.PageNow==$pagebar.PageFirst}
		{elseif $k=='››' and $pagebar.PageNow==$pagebar.PageLast}
		{elseif $k=='››' and $pagebar.PageNow!=$pagebar.PageLast}
		{elseif $k=='‹'}
			<li><a href="{$v}" class="next page-numbers">上一页</a></li>
		{elseif $k=='›'}
			<li><a href="{$v}" class="next page-numbers">下一页</a></li>
		{else}
			<li><a href="{$v}" class='page-numbers'>{$k}</a></li>
		{/if}
	{/foreach}
{/if}