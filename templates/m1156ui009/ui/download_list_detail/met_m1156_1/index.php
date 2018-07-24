<?php defined('IN_MET') or exit('No permission'); ?>
<section class="$uicss lazy" m-id="{$ui.mid}" 
<if value='$ui[bgimg] && !strstr($ui[bgimg],$c[met_agents_img])'>data-background="{$ui.bgimg}"</if>>
  <div class="met-download animsition">
    <div class="container">
      <div class="row">
        <div class="col-lg-9 met-download-body">
          <div class="row">
            <div class="met-download-header">
              <h1>{$data.title}</h1>
              <div class="info">
                <span><i class="fa fa-clock-o"></i> {$data.updatetime}</span>
                <if value="$data[issue]">
                <span><i class="fa fa-user-plus"></i> {$data.issue}</span>
                </if>
                <span><i class="icon wb-eye margin-right-5" aria-hidden="true"></i> {$data.hits}</span>
              </div>
            </div>
            <div class="paralist">
              <dl class="dl-horizontal clearfix">
                <list data="$data[para]" name="$val">
                <dt>{$val.name} :</dt>
                <dd>{$val.value}</dd>
                </list>
              </dl>
              <a class="btn btn-outline btn-primary btn-squared met-download-btn" target="_blank"
                href="{$data.downloadurl}" title="{$data.title}">{$ui.downloadword}</a>
            </div>
            <div class="met-editor lazyload clearfix">{$data[content]}</div>
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
                        <if value="$v[downloadurl]">
                        <i class="img-icon fa fa-file-archive-o"></i>
                        <else/>
                        <img class="imgloading" data-original="{$v.imgurl|thumb:145,123}">
                        </if>
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