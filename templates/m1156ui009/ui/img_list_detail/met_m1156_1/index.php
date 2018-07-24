<?php defined('IN_MET') or exit('No permission'); ?>
<section class="$uicss lazy" m-id="{$ui.mid}" 
<if value='$ui[bgimg] && !strstr($ui[bgimg],$c[met_agents_img])'>data-background="{$ui.bgimg}"</if>>
  <div class="met-shownews animsition">
    <div class="container">
      <div class="row">
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
            <div class="shownews-container">
              <div class="shownews-wrapper">
                <list data="$data[displayimgs]" name="$val">
                <div class="shownews-slide">
                  <img class="shownews-lazy" data-src="{$val.img|thumb:$c[met_imgdetail_x],$c[met_imgdetail_y]}" data-gallery="{$val.img}" alt="{$val.title}" />
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
                  <img class="shownews-lazy" data-src="{$val.img|thumb:$c[met_imgdetail_x],$c[met_imgdetail_y]}" alt="{$val.title}" />
                </div>
                </list>
              </div> 
            </div>
            </if>
            <if value="$data[para]">
            <div class="paralist">
              <dl class="dl-horizontal clearfix">
                <list data="$data[para]" name="$val">
                <if value="$val[name]">
                <dt>{$val.name} :</dt>
                <dd>{$val.value}</dd>
                </if>
                </list>
              </dl> 
            </div>
            </if>
            <div class="met-editor lazyload clearfix">
              {$data.content|preg_replace:'/(<img[^>]*)src(=[^>]*>)/', '\\1class="imgloading" data-original\\2',@@}
            </div>
            <div class="met-shownews-footer"><pagination /></div>
          </div>
        </div>
        <div class="col-lg-3">
          <div class="row">
            <div class="met-news-bar">
              <div class="sidenews-lists">
                <h3><span>{$ui.barlisttitle}</span></h3>
                <ul>
                  <tag action="list" type="$ui[barlisttype]" cid="$ui[barlistid]" num="$ui[barlistnum]">
                    <li>
                      <a href="{$v.url}" title="{$v.title}" {$g.urlnew}>
                        <img class="imgloading" data-original="{$v.imgurl|thumb:145,123}">
                        <b>{$v.title}</b>
                        <p>{$v.updatetime}</p>
                      </a>
                    </li>
                  </tag>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>