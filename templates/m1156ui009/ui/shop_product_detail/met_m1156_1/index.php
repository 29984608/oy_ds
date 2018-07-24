<?php defined('IN_MET') or exit('No permission'); ?>
<section class="$uicss lazy" m-id="{$ui.mid}"
<if value='$ui[bgimg] && !strstr($ui[bgimg],$c[met_agents_img])'>data-background="{$ui.bgimg}"</if>>
<div class="page met-showproduct pagetype{$ui.pagetype} animsition" id="content-1">
  <if value="$ui[pagetype] eq 1">
  <div class="met-showproduct-head">
    <div class="container">
      <div class="row">
        <div class="col-lg-6">
          <div class="row">
            <div class="shownews-container">
              <div class="shownews-wrapper">
                <list data="$data[displayimgs]" name="$val">
                <div class="shownews-slide">
                  <img class="shownews-lazy" data-src="{$val.img|thumb:$c[met_productdetail_x],$c[met_productdetail_y]}" data-gallery="{$val.img}" alt="{$val.title}" />
                </div>
                </list>
              </div>
              <div class="swiper-button-next swiper-button-white"></div>
              <div class="swiper-button-prev swiper-button-white"></div>
            </div>
            <if value="$val[_index] gt 0">
            <div class="shownews-container-small">
              <div class="shownews-wrapper-small">
                <list data="$data[displayimgs]" name="$val">
                <div class="shownews-slide-small <if value='$val[_first]'>active</if>">
                  <img class="shownews-lazy" data-src="{$val.img|thumb:$c[met_productdetail_x],$c[met_productdetail_y]}" data-gallery="{$val.img}" alt="{$val.title}" />
                </div>
                </list>
              </div>
            </div>
            </if>
          </div>
        </div>
        <div class="col-lg-6 product-intro">
          <div class="row">
            <div class="product-text">
              <h1>{$data.title}</h1>
              <span class="t">
                <i class="fa fa-clock-o"></i> {$data.updatetime} &nbsp;
                <i class="icon wb-eye" aria-hidden="true"></i> {$data.hits}
              </span>
              <if value="$data[description]">
              <p class="description">{$data.description}</p>
              </if>
              <include file='ui_v2/module/shop/shop_option_ui.php'/>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="met-showproduct-body">
    <div class="container not">
      <div class="row no-space">
        <div class="<if value='$ui[hitsok]'>col-lg-9</if> product-content-body">
          <div class="panel product-detail <if value='!$ui[hitsok]'>m-r-0 m-b-0</if>">
            <div class="container">
              <div class="row">
                <div class="panel-body">
                  <ul class="nav nav-tabs nav-tabs-line met-showproduct-navtabs affix-nav">
                    <list data="$data[contents]" name="$s">
                    <if value="$s[content]">
                    <li class="nav-item"><a class="nav-link <if value='$s[_first]'>active</if>" data-toggle="tab" href="#product-content{$s._index}" data-get="product-details">{$s.title}</a></li>
                    </if>
                    </list>
                  </ul>
                  <div class="tab-content">
                    <list data="$data[contents]" name="$s">
                    <if value="$s[_first]">
                    <div class="tab-pane met-editor lazyload clearfix animation-fade active" id="product-content{$s._index}">
                      <if value="$data[para] && 1">
                      <ul class="para blocks-2">
                        <list data="$data[para]" name="$val">
                        <li>{$val.name} : {$val.value}</li>
                        </list>
                      </ul>
                      </if>
                      {$s.content|preg_replace:'/(<img[^>]*)src(=[^>]*>)/', '\\1class="imgloading" data-original\\2',@@}
                    </div>
                    <else/>
                    <div class="tab-pane met-editor lazyload clearfix animation-fade" id="product-content{$s._index}">
                    {$s.content|preg_replace:'/(<img[^>]*)src(=[^>]*>)/', '\\1class="imgloading" data-original\\2',@@}
                    </div>
                    </if>
                    </list>
                    <if value="$ui['tag_ok']">
                    <div class="tag">
                      <span>{$data.tagname}</span>
                      <list data="$data[taglist]" name="$tag" num="$ui[tag_num]">
                      <a href="{$tag.url}" title="{$tag.name}">{$tag.name}</a>
                      </list>
                    </div>
                    </if>
                  </div>
                  <div class="showproduct-pager"><pagination /></div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <if value="$ui[hitsok]">
        <div class="col-lg-3">
          <div class="panel product-hot">
            <div class="container">
              <div class="row">
                <div class="panel-body">
                  <h4 class="example-title">{$ui.hitsname}</h4>
                  <ul class="blocks-2 blocks-sm-3 mob-masonry" data-scale='1'>
                    <tag action="list" type="$ui[hitstype]" cid="$ui[hitsid]" num="$ui[hitsnumber]">
                    <li>
                      <a href="{$v.url}" title="{$v.title}" class="img" {$g.urlnew}>
                        <img class="imgloading" data-original="{$v.imgurl|thumb:$v[displayimgs][0][x],$v[displayimgs][0][y]}">
                      </a>
                      <a href="{$v.url}" title="{$v.title}" class="txt" {$g.urlnew}>{$v.title}</a>
                    </li>
                    </tag>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
        </if>
      </div>
    </div>
  </div>
  <elseif value="$ui[pagetype] eq 2"/>
  <div class="modal fade modal-primary" id="shop-fashion-option" aria-hidden="true" aria-labelledby="shop-fashion-option" role="dialog" tabindex="-1">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
          <h4 class="modal-title">{$ui.shop_modal_title}</h4>
        </div>
        <div class="modal-body">
          <div class="product-intro">
            <h1 class='m-t-0 font-size-24'>{$data.title}</h1>
            <if value="$data['description']">
            <p class='description'>{$data.description}</p>
            </if>
            <include file='ui_v2/module/shop/shop_option_ui.php'/>
           </div>
        </div>
      </div>
    </div>
  </div>
  <nav class="navbar navbar-default" role="navigation" data-class="{$ui.fixedclass}">
    <div class="container not">
      <ul class="nav navbar-toolbar pull-xs-right shop-btn-body">
        <li>
          <div class="h-50 vertical-align">
            <div class="vertical-align-middle">
              <button type="button" class="btn btn-block btn-danger btn-squared shop-btn"
                data-target="#shop-fashion-option" data-toggle="modal">{$word.app_shop_buyimmediately}</button>
            </div>
          </div>
        </li>
      </ul>  
      <div class="row">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-target="#navbar-showproduct-pagetype2" data-toggle="collapse">
            <span class="sr-only">Toggle navigation</span>
            <i class="icon wb-chevron-down" aria-hidden="true"></i>
          </button>
          <h1 class="navbar-brand">{$data.title}</h1>
        </div>
        <div class="collapse navbar-collapse navbar-collapse-toolbar" id="navbar-showproduct-pagetype2">
          <ul class="nav navbar-toolbar navbar-right met-showproduct-navtabs">
            <list data="$data['contents']" name="$s">
            <if value="$s[content]">
            <li class="nav-item"><a class='nav-link' href="#content{$s._index}" data-get="product-details">{$s.title}</a></li>
            </if>
            </list>
            <if value="$data['para']">
            <li class="nav-item"><a class='nav-link' href="#contenti">{$ui.specpara}</a></li>
            </if>
          </ul>
        </div>
      </div>
    </div>
  </nav>
  <div class="shownews-container full">
    <div class="shownews-wrapper">
      <list data="$data[displayimgs]" name="$val">
      <div class="shownews-slide">
        <img class="shownews-lazy" data-src="{$val.img|thumb:$c[met_productdetail_x],$c[met_productdetail_y]}" data-gallery="{$val.img}" alt="{$val.title}" />
      </div>
      </list>
    </div>
    <div class="swiper-button-next swiper-button-white"></div>
    <div class="swiper-button-prev swiper-button-white"></div>
  </div>
  <if value="$val[_index] gt 1">
  <div class="shownews-container-small">
    <div class="shownews-wrapper-small">
      <list data="$data[displayimgs]" name="$val">
      <div class="shownews-slide-small <if value='$val[_first]'>active</if>">
        <img class="shownews-lazy" data-src="{$val.img|thumb:$c[met_productdetail_x],$c[met_productdetail_y]}" data-gallery="{$val.img}" alt="{$val.title}" />
      </div>
      </list>
    </div>
  </div>
  </if>
  <list data="$data['contents']" name="$s">
  <if value="$s[content]">
  <div class="content content{$s._index}" id="content{$s._index}">
    <div class="container">
      <div class="row">
        <div class="met-editor lazyload clearfix">{$s.content|preg_replace:'/(<img[^>]*)src(=[^>]*>)/', '\\1class="imgloading" data-original\\2',@@}</div>
      </div>
    </div>
  </div>
  </if>
  </list>
  <if value="$data['para']">
  <div class="content contenti" id="contenti">
    <div class="container">      
      <ul class="product-para paralist blocks-100 blocks-md-2 blocks-lg-3 blocks-xxl-2">
        <list data="$data['para']" name="$s">
        <li class="p-x-0 m-b-15"><span>{$s.name}：</span> {$s.value}</li>
        </list>
      </ul>
    </div>
  </div>
  </if>
  </if>
</div>
</section>
