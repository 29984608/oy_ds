<?php defined('IN_MET') or exit('No permission'); ?>
<tag action="category" type="current" cid="$data[classnow]"></tag>
<if value="$data[classnow] eq 10001||!$ui[bgcolumn]||strstr('|'.strip_tags($ui[bgcolumn]).'|','|'.strip_tags($m[name]).'|')">
<section class="$uicss lazy {$ui.bgfull}" m-id="{$ui.mid}" data-title="{$ui.bgtitle}" 
  <if value='$ui[bgimg] && !strstr($ui[bgimg],$c[met_agents_img])'>data-background="{$ui.bgimg}"</if>>
  <div class="only-box">
    <div class="only-img"><span data-original="{$ui.aboutimg}"></span><if value="$_GET[pageset]"><img src="{$ui.aboutimg}" /></if></div>
    <div class="only-cut">
        <h2 class="h2">{$ui.abouttitle}</h2>
        {$ui.abouttext}
        <if value="$ui[aboutmoreok]">
        <a class="only-button" href="{$ui.aboutmorelink}" title="{$ui.abouttitle}">{$ui.aboutmorework}</a>
        </if>
    </div> 
  </div>
</section>
<elseif value="$_GET[pageset]" />
<section class="$uicss" m-id="{$ui.mid}" m-type="nocontent" 
  style="background:#263238;max-height:40px;text-align:center;color:#fff;line-height:40px;display:block;border-bottom:1px solid #888;">
  该栏目设置了限制显示，可在“区块显示的栏目”中添加显示（该文字仅“可视化”模式下可见）
</section>
</if>