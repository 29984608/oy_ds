<?php defined('IN_MET') or exit('No permission'); ?>
<tag action="category" type="current" cid="$data[classnow]"></tag>
<if value="$data[classnow] eq 10001||!$ui[bgcolumn]||strstr('|'.strip_tags($ui[bgcolumn]).'|','|'.strip_tags($m[name]).'|')">
<section class="$uicss" m-id="{$ui.mid}" data-title="{$ui.bgtitle}" 
  <if value='$ui[bgimg]&&!strstr($ui[bgimg],$c[met_agents_img])'>data-background="{$ui.bgimg}"</if>>
  <div class="container">
    <div class="column-box">
      <ul class="blocks-lg-{$ui.blockslg} blocks-sm-{$ui.blockssm} blocks-xs-{$ui.blocksxs} blocks-100 met-grid" id="met-grid">
        <tag action="category" type="son" cid="$ui[id]">
        <if value="$m[_index]<$ui[number]">
        <li class="shown">
          <a href="{$m.url}" title="{$m.name}" {$m.urlnew}>
            <if value="$ui[type]">
            <img class="imgloading" data-original="{$m.columnimg}" alt="{$m.name}">
            <else/>
            <i class="{$m.icon}"></i>
            </if>
            <h3>{$m.name}</h3>
            <if value="$ui[textok] neq 0">
            <p <if value="$ui[textok] eq -1">class="m"</if>>{$m.description|str_replace:"\n",'<br>',@@}</p>
            </if>
          </a>
        </li>
        </if>
        </tag>
      </ul>
    </div>
  </div>
</section>
<elseif value="$_GET[pageset]" />
<section class="$uicss not-slide" m-id="{$ui.mid}" m-type="nocontent" 
  style="background:#263238;max-height:40px;text-align:center;color:#fff;line-height:40px;display:block;border-bottom:1px solid #888;">
  该栏目设置了限制显示，可在“区块显示的栏目”中添加显示（该文字仅“可视化”模式下可见）
</section>
</if>