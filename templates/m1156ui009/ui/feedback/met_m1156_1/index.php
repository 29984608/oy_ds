<?php defined('IN_MET') or exit('No permission'); ?>
<section class="$uicss lazy" m-id="{$ui.mid}"
  <if value='$ui[bgimg] && !strstr($ui[bgimg],$c[met_agents_img])'>data-background="{$ui.bgimg}"</if>>
  <div class="container met-feedback">
    <div class="row">
      <if value="$ui[title]">
      <h1>{$ui.title}</h1>
      </if>
      <tag action="feedback.form"></tag>
    </div>
  </div>
</section>