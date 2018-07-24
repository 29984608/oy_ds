<?php defined('IN_MET') or exit('No permission'); ?>
<if value="$_GET[pageset]||$data[content]">
<section class="$uicss lazy" m-id="{$ui.mid}"
  <if value='$ui[bgimg] && !strstr($ui[bgimg],$c[met_agents_img])'>data-background="{$ui.bgimg}"</if>>
  <div class="met-show animsition">
    <div class="container">
      <div class="met-editor lazyload clearfix">
        {$data.content|preg_replace:'/(<img[^>]*)src(=[^>]*>)/', '\\1class="imgloading" data-original\\2',@@}
      </div>
    </div>
  </div>
</section>
</if>