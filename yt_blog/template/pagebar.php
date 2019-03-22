{if $pagebar}
{$pagenumberpath="M13.16,42.77,2.33,24,13.16,5.23H34.84L45.67,24,34.84,42.77Z"}
{foreach $pagebar.buttons as $k=>$v}
{if $pagebar.PageNow==$k}
<li class="{if $k%2==1}even{else}odd{/if} current">
  <svg class="page-bg colorTransition">
    <path d="{$pagenumberpath}" />
  </svg>
  <a href="{$v}" class='m-pjax colorTransition'>{$k}</a>
</li>
{elseif $k=='‹‹' and $pagebar.PageNow!=$pagebar.PageFirst}
{elseif $k=='‹‹' and $pagebar.PageNow==$pagebar.PageFirst}
{elseif $k=='››' and $pagebar.PageNow==$pagebar.PageLast}
{elseif $k=='››' and $pagebar.PageNow!=$pagebar.PageLast}
{elseif $k=='‹'}
<li class="odd control back">
  <svg class="page-bg colorTransition">
    <path d="{$pagenumberpath}" />
  </svg>
  <a href="{$v}" class="m-pjax colorTransition segoe">&#xE72B;</a>
</li>
{elseif $k=='›'}
<li class="{if $pagebar.PageAll%2==0}even{else}odd{/if} control fore">
  <svg class="page-bg colorTransition">
    <path d="{$pagenumberpath}" />
  </svg>
  <a href="{$v}" class="m-pjax colorTransition segoe">&#xE72A;</a>
</li>
{else}
<li class="{if $k%2==1}even{else}odd{/if}">
  <svg class="page-bg colorTransition">
    <path d="{$pagenumberpath}" />
  </svg>
  <a href="{$v}" class='m-pjax colorTransition'>{$k}</a>
</li>
{/if}
{/foreach}
{/if}