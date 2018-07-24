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
        <p>法定工作日：8:00-17:30</p>
        <p>周&nbsp;&nbsp;&nbsp;&nbsp;六&nbsp;&nbsp;&nbsp;日：上午：8:00-11:30<br /> <span style=" padding-left:80px;">&nbsp;</span>下午：14:00-17:30</p>
       <!-- <img class="imgloading img-responsive" data-original="{$v.imgurl|thumb:400,250}">
       <tag action="list" type="$ui[type3]" cid="$ui[column3]" num="$ui[number3]">
		<dl class="dl-news">
		  <dt>
            <a href="{$v.url}" title="{$v.title}" {$g.urlnew}>
              <img class="imgloading" data-original="{$v.imgurl|thumb:50,50}">
            </a>
          </dt>
		  <dd>
            <a href="{$v.url}" title="{$v.title}" {$g.urlnew}>{$v.title}</a>
			<i>{$v.updatetime}</i>
		  </dd>
		</dl>
        </tag>
        -->
	  </div>
	</div>
  </div>
</section>
</if>