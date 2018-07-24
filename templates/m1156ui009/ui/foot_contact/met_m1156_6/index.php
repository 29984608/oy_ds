<?php defined('IN_MET') or exit('No permission'); ?>
<if value="($ui[showtype]&&$data[classnow] eq 10001)||!$ui[showtype]">
<section class="$uicss met-footer" m-id="{$ui.mid}" m-type="foot">
  <div class="container">
    <div class="row" data-plugin="appear" data-animate="slide-bottom" data-repeat="false">
	  <div class="col-md-4">
	    <h4>{$ui.title1}</h4>
        <div class="description">{$ui.description1}</div>
		<div class="social-box">
          <tag action="category" type="son" cid="$ui[iconid]">
          <a <if value="$_GET[pageset]||($m[columnimg]&&!strstr($m[columnimg],'public/images/metinfo.gif'))">href="javascript:void(0);"<else/>href="{$m.url}"</if> data-id="{$m.id}" rel="nofollow" target="_blank">
            <if value="$_GET[pageset]||($m[columnimg]&&!strstr($m[columnimg],'public/images/metinfo.gif'))">
            <span><img src="{$m.columnimg}" alt="{$m.name}"></span>
            </if>
            <i class="{$m.icon}"></i>
          </a>
          </tag>
		</div>
	  </div>
	  <div class="col-md-4">
	    <h4>{$ui.title2}</h4>
		<dl class="dl-contact">
		  <dt><i class="{$ui.icon1|str_replace:'<m',' <m',@@}"></i></dt>
		  <dd>{$ui.contact1}</dd>
		</dl>
		<dl class="dl-contact">
		  <dt><i class="{$ui.icon2|str_replace:'<m',' <m',@@}"></i></dt>
		  <dd>{$ui.contact2}</dd>
		</dl>
		<dl class="dl-contact">
		  <dt><i class="{$ui.icon3|str_replace:'<m',' <m',@@}"></i></dt>
		  <dd>{$ui.contact3}</dd>
		</dl>
		<dl class="dl-contact">
		  <dt><i class="{$ui.icon4|str_replace:'<m',' <m',@@}"></i></dt>
		  <dd>{$ui.contact4}</dd>
		</dl>
		<dl class="dl-contact">
		  <dt><i class="{$ui.icon5|str_replace:'<m',' <m',@@}"></i></dt>
		  <dd>{$ui.contact5}</dd>
		</dl>
	  </div>
	  <div class="col-md-4">
	    <h4>{$ui.title3}</h4> 
        <tag action="list" type="$ui[type3]" cid="$ui[column3]" num="$ui[number3]">
		<dl class="dl-news">
         
			{$v.content}
	
		</dl>
        </tag>
	  </div>
	</div>
  </div>
</section>
</if>