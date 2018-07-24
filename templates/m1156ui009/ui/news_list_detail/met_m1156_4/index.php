<?php defined('IN_MET') or exit('No permission'); ?>
<section class="$uicss lazy" m-id="{$ui.mid}" 
<if value='$ui[bgimg] && !strstr($ui[bgimg],$c[met_agents_img])'>data-background="{$ui.bgimg}"</if>>
<div class="met-shownews animsition">
<div class="container"> 
<div class="col-lg-9 met-shownews-body">
<div class="row">
<div class="met-shownews-header">
<h1>{$data.title}</h1>
<div class="info">
<span><i class="fa fa-clock-o"></i> {$data.updatetime}</span>
<if value="$data[issue]">
<span><i class="fa fa-user-plus"></i> {$data.issue}</span>
</if>
<span><i class="icon wb-eye margin-right-5" aria-hidden="true"></i> {$data.hits}</span>
</div>
</div>
<div class="met-editor lazyload clearfix">{$data[content]}</div>
<div class="met-shownews-footer"><pagination /></div>
</div>
</div>
<div class="col-lg-3">
<div class="row">
<div class="met-news-bar">
<form method="get" action="../search/">
<input type="hidden" name="lang" value="{$data.lang}" />
<input type="hidden" name="class1" value="{$data.class1}" />
<div class="form-group">
<div class="input-search">
<button type="submit" class="input-search-btn"><i class="icon wb-search" aria-hidden="true"></i></button>
<input type="text" class="form-control" name="searchword" placeholder="Search">
</div>
</div>
</form>
<div class="recommend news-list-md">
<h3>{$ui.barlisttitle}</h3>
<ul class="list-group list-group-bordered">
<tag action="list" type="$ui[barlisttype]" cid="$ui[barlistid]" num="$ui[barlistnum]">
<li class="list-group-item">
<a href="{$v.url}" title="{$v.title}" {$g.urlnew}>{$v.title}</a>
</li>
</tag> 
</ul>
</div>
<ul class="column">
<tag action="category" type="current" cid="$data[releclass1]"></tag>
<if value="$m[module] neq 1||($m[module] eq 1&&$m[isshow])">
<li><a class="<if value='$m[id] eq $data[classnow]'>active</if>" href="{$m.url}" title="{$ui.navall}" {$m.urlnew}>{$ui.navall}</a></li>
</if>
<tag action="category" type="son" cid="$data[releclass1]" class="active">
<li><a class="{$m.class}" href="{$m.url}" title="{$m.name}" {$m.urlnew}>{$m.name}</a></li>
</tag>
</ul>
</div>
</div>
</div> 
</div>
</div>
</section>