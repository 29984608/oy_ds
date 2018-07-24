<?php defined('IN_MET') or exit('No permission'); ?>
<section class="$uicss lazy" m-id="{$ui.mid}" 
<if value='$ui[bgimg] && !strstr($ui[bgimg],$c[met_agents_img])'>data-background="{$ui.bgimg}"</if>>
  <if value="$ui[showtype] eq 0"/>
  <div class="container">
	<div class="host-cut">
	  <div class="host-list active">
        <ul class="blocks-{$ui.blocksxs} blocks-md-{$ui.blockssm} blocks-lg-{$ui.blocksmd} blocks-xxl-{$ui.blocksxlg}  met-page-ajax  met-pager-ajax met-grid imagesize" id="met-grid" data-scale='{$c.met_productimg_y}x{$c.met_productimg_x}'>
          <tag action="product.list">
		  <li class=" shown">
            <a href="{$v.url}" title="{$v.title}" {$g.urlnew}>
              <img class="imgloading" data-original="{$v.imgurl|thumb:$c[met_productimg_x],$c[met_productimg_y]}" alt="{$v.title}">
              <span <if value="!$v[price_str]">class="price"</if>>
                <b>{$v.title}</b>
                <i><list data="$v[tag]" name="$val"><if value="$val">{$val}、</if></list>&nbsp;</i>
                <p class="price"><if value="$v[price_str]">{$v.price_str}</if>&nbsp;</p>
              </span>
			  <dl>
                <list data="$v[displayimgs]" name="$val">
			    <dd src="{$val.img|thumb:$c[met_productimg_x],$c[met_productimg_y]}" title="{$val.title}"
                    class="imgloading" data-original="{$val.img|thumb:34,34}"></dd>
                </list>
              </dl>
            </a>
		  </li>
          </tag>
        </ul>
      </div>
    </div>
  </div>
  <div class="page-box" m-type="nosysdata"><pager /></div>
  <div class="met-pager-ajax-link hidden-md-up" m-type="nosysdata">
    <button type="button" class="btn btn-primary btn-block btn-squared ladda-button" id="met-pager-btn"  data-page="1">
      <i class="icon wb-chevron-down m-r-5" aria-hidden="true"></i>
    </button>
  </div>
  <else/>
  <div class="met-product animsition type-{$ui.showtype}">
    <div class="<if value='$ui[showfull]'>container-fluid<else/>container</if>">
      <div class="row">
        <ul class="<if value='$ui[showtype] eq 2'>no-space</if> blocks-{$ui.blocksxs} blocks-md-{$ui.blockssm} blocks-lg-{$ui.blocksmd} blocks-xxl-{$ui.blocksxlg}  met-pager-ajax met-grid imagesize" id="met-grid"
        data-scale="{$c.met_productimg_y}x{$c.met_productimg_x}">
          <tag action="product.list">
            <if value="$ui[showtype] eq 1"/>
            <li class="shown">
              <div class="widget widget-shadow">
                <figure class="widget-header cover">
                  <a href="{$v.url}" title="{$v.title}" {$g.urlnew}>
                    <img class="cover-image imgloading" data-original="{$v.imgurl|thumb:$c[met_productimg_x],$c[met_productimg_y]}" alt="{$v.title}">
                  </a>
                </figure>
                <h4 class="widget-title">
                  <a href="{$v.url}" title="{$v.title}" {$g.urlnew}>{$v.title}</a>
                  <if value="$v[price_str]">
                  <p class="price">{$v.price_str}</p>
                  </if>
                </h4>
              </div>
            </li>
            <elseif value="$ui[showtype] eq 2"/>
            <li class="widget shown">
              <div class="cover-body">
                <div class="cover overlay overlay-hover animation-hover">
                  <a href="{$v.url}" title="{$v.title}" {$g.urlnew}>
                    <img class="cover-image imgloading" data-original="{$v.imgurl|thumb:$c[met_productimg_x],$c[met_productimg_y]}" alt="{$v.title}">
                    <figcaption class="overlay-panel overlay-background overlay-fade text-center vertical-align">
                      <div class="vertical-align-middle">
                        <h4 class="animation-slide-bottom">
                          {$v.title}
                          <if value="$v[price_str]">
                          <p class="price">{$v.price_str}</p>
                          </if>
                        </h4>
                      </div>
                    </figcaption>
                  </a>
                </div>
              </div>
            </li>
            <elseif value="$ui[showtype] eq 3"/>
            <li class="shown">
              <div class="widget widget-shadow">
                <figure class="widget-header cover">
                  <a href="{$v.url}" title="{$v.title}" >
                    <img class="cover-image imgloading" data-original="{$v.imgurl|thumb:$c[met_productimg_x],$c[met_productimg_y]}"  alt="{$v.title}">
                  </a>
                </figure>
                <div class="widget-body">
                  <h4 class="widget-title">{$v.title}</h4>
                  <if value="$v[price_str]">
                  <p class="price">{$v.price_str}</p>
                  </if>
                  <list data="$v[para]" name="$p">
                  <p class="widget-metas"><span>{$p.name}：{$p.value}</span></p>
                  </list>
                  <p>{$v.description}</p>
                  <div class="widget-body-footer">
                    <div class="widget-actions pull-right">
                      <a href="{$v.url}" title="{$v.title}" >
                        <i class="icon wb-eye" aria-hidden="true"></i>
                        <span>{$v.hits}</span>
                      </a>
                    </div>
                    <a href="{$v.url}" title="{$v.title}" {$g.urlnew} class="btn btn-outline btn-primary btn-squared">{$word.Detail}</a>
                  </div>
                </div>
              </div>
            </li>
            </if>
          </tag>
        </ul>
      </div>
    </div>
    <div class="page-box" m-type="nosysdata"><pager /></div>
    <div class="met-pager-ajax-link hidden-md-up" m-type="nosysdata">
      <button type="button" class="btn btn-primary btn-block btn-squared ladda-button" id="met-pager-btn"  data-page="1">
        <i class="icon wb-chevron-down m-r-5" aria-hidden="true"></i>
      </button>
    </div>
  </div>
  </if>
</section>