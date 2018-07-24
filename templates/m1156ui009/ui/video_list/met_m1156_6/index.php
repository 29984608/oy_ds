<?php defined('IN_MET') or exit('No permission'); ?>
<tag action="category" type="current" cid="$data[classnow]"></tag>
<if value="$data[classnow] eq 10001||!$ui[bgcolumn]||strstr('|'.strip_tags($ui[bgcolumn]).'|','|'.strip_tags($m[name]).'|')">
<section class="$uicss lazy {$ui.bgfull}" m-id="{$ui.mid}" data-title="{$ui.bgtitle}" 
  <if value='$ui[bgimg] && !strstr($ui[bgimg],$c[met_agents_img])'>data-background="{$ui.bgimg}"</if>>
  <div class="case-box">
    <h2 class="h2">{$ui.title}</h2> 
    <span></span>
    <div class="prices-video container">
      <div class="video-content">
        <span>
          <p><i class="fa-play"></i></p> 
        </span>
        <video src="{$ui.video|str_replace:'<m','?<m',@@}" poster="{$ui.image}" data-play="{$ui.type}"></video>
      </div>
      {$ui.description}
    </div>
    <if value="$ui[moreok]">
    <tag action="category" cid="$ui[imgcolumn]" type="current"></tag>
    <a class="case-button" href="{$m.url}" title="{$ui.title}" {$m.urlnew}>{$ui.morework}</a>
    </if>
  </div>
</section>
<elseif value="$_GET[pageset]" />
<section class="$uicss" m-id="{$ui.mid}" m-type="nocontent" 
  style="background:#263238;max-height:40px;text-align:center;color:#fff;line-height:40px;display:block;border-bottom:1px solid #888;">
  该栏目设置了限制显示，可在“区块显示的栏目”中添加显示（该文字仅“可视化”模式下可见）
</section>
</if>