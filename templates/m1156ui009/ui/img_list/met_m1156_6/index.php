<?php defined('IN_MET') or exit('No permission'); ?>
<tag action="category" type="current" cid="$data[classnow]"></tag>
<if value="$data[classnow] eq 10001||!$ui[bgcolumn]||strstr('|'.strip_tags($ui[bgcolumn]).'|','|'.strip_tags($m[name]).'|')">
<section class="$uicss lazy {$ui.bgfull}" m-id="{$ui.mid}" data-title="{$ui.bgtitle}" 
  <if value='$ui[bgimg] && !strstr($ui[bgimg],$c[met_agents_img])'>data-background="{$ui.bgimg}"</if>>
  <div class="case-box">
    <h2 class="h2">{$ui.title}</h2> 
    <span></span>
    <div class="case-container">
      <div class="case-left"><i class="wb-chevron-left"></i></div>
      <div class="case-right"><i class="wb-chevron-right"></i></div>
      <div class="case-wrapper">
        <tag action="list" cid="$ui[imgcolumn]" type="$ui[imgtype]" num="$ui[imgnumber]">
        <div class="case-slide">
          <a title="{$v.title}" 
            <if value='$ui[type]'>
            class="met-img-showbtn" data-imglist="<list data="$v[displayimgs]" name="$val">{$val.title}*-={$val.img}+|-</list>"
            <else/>
            href="{$v.url}" {$g.urlnew}
            </if>
            > 
            <p>
              <span>{$v.title}</span>
              <font>{$ui.looktext}</font>
            </p>
            <img class="case-lazy" data-src="{$v.imgurl|thumb:$ui[width],$ui[height]}" title="{$v.title}" alt="{$v.title}">
          </a>
        </div>
        </tag>
      </div>
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