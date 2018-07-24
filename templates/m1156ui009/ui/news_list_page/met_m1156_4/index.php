<?php defined('IN_MET') or exit('No permission'); ?>
<section class="$uicss lazy" m-id="{$ui.mid}" 
  <if value='$ui[bgimg] && !strstr($ui[bgimg],$c[met_agents_img])'>data-background="{$ui.bgimg}"</if>>
  <if value="$ui[listtype] eq 0">
  <div class="info-box">
	<div class="container">
	  <div class="info-cut">
		<ul class="met-page-ajax met-pager-ajax" data-scale='{$scale}'>
          <tag action="news.list" num="$c[met_news_list]">
          <li>
             <a href="{$v.url}" title="{$v.title}" {$v.urlnew}>
               <img class="imgloadimg" data-original="{$v.imgurl|thumb:$c[met_newsimg_x],$c[met_newsimg_y]}" alt="{$v.title}">
               <span>
                 <p>{$v.description}</p>
                 <i>{$word.AddDate}<em>{$v.updatetime|strtotime|date:'Y.m.d',@@}</em></i>
                 <b>{$v.title}</b>
               </span>
             </a>
          </li>
          </tag>
		</div>
	  </ul>
	</div>
  </div>
  <div class="met-pager-ajax-link hidden-md-up" m-type="nosysdata">
    <button type="button" class="btn btn-primary btn-block btn-squared ladda-button" id="met-pager-btn"  data-page="1">
      <i class="icon wb-chevron-down m-r-5" aria-hidden="true"></i>
    </button>
  </div>
  <div class="page-box" m-type="nosysdata"><pager /></div>
  <else/>
  <section class="met-news animsition type-{$ui.listtype}">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 met-news-body">
              <div class="row">
                <div class="met-news-list">
                  <if value="$ui[listtype] neq 3 && $ui[headlines] && !$data[page] && !$data[class2]">
                  <div class="news-headlines news-headlines-slick" data-scale='0.33333333333333'>
                      <tag action="news.list" num="$c[met_news_list]">
                      <if value="$v[_index]<$ui[headlines_num]">
                      <div class='slick-slide'>
                          <a href="{$v.url}" title="{$v.title}" {$g.urlnew}>
                              <img class="width-full" src="{$v.imgurl|thumb:$ui[headlines_x],$ui[headlines_y]}" alt="{$v.title}">
                              <div class="headlines-text">
                                  <h3>{$v.title}</h3>
                              </div>
                          </a>
                      </div>
                      </if>
                      </tag>
                  </div>
                  </if>
                  <ul class="met-page-ajax met-pager-ajax" data-scale='{$scale}'>
                    <tag action="news.list" num="$c[met_news_list]">
                    <if value="$ui[listtype] eq 1" />
					<if value="($ui['headlines'] && !$data[page] && !$data[class2] && $v['_index'] egt $ui[headlines_num]) || ($ui['headlines'] && !$data[page] && $data[class2]) || $data[page] || !$ui['headlines']">
                        <li>
                            <h4>
                                <a href="{$v.url}" title="{$v.title}" {$g.urlnew}>
                                    {$v.title}
                                </a>
                            </h4>
                            <p class="des">{$v.description}</p>
                            <p class="info">
                                <span>{$_M.word.read} <i class="fa fa-eye m-r-5" aria-hidden="true"></i>{$v.hits}</span>
                                <span>{$_M.word.AddDate} <i class="fa fa-clock-o m-r-5"></i>{$v.updatetime}</span>
                                <if value="$v[issue]">
                                <span><i class="fa fa-user-plus m-r-5"></i>{$v.issue}</span>
                                </if>
                            </p>
                        </li>
                    </if>
                    <elseif value="$ui[listtype] eq 2" />
					<if value="($ui['headlines'] && !$data[page] && !$data[class2] && $v['_index'] egt $ui[headlines_num]) || ($ui['headlines'] && !$data[page] && $data[class2]) || $data[page] || !$ui['headlines']">
                    <li>
                        <div class="media media-lg">
                            <div class="media-left">
                                <a href="{$v.url}" title="{$v.title}" {$g.urlnew}>
                                    <img class="media-object imgloading" data-original="{$v.imgurl|thumb:$c[met_newsimg_x],$c[met_newsimg_y]}" alt="{$v.title}">
                                </a>
                            </div>
                            <div class="media-body">
                                <h4 class="media-heading">
                                    <a href="{$v.url}" title="{$v.title}" {$g.urlnew}>
                                        {$v.title}
                                    </a>
                                </h4>
                                <p class="des">{$v.description}</p> 
                                <p class="info">
                                  <span>{$_M.word.read} <i class="fa fa-eye m-r-5" aria-hidden="true"></i>{$v.hits}</span>
                                  <span>{$_M.word.AddDate} <i class="fa fa-clock-o m-r-5"></i>{$v.updatetime}</span>
                                  <if value="$v[issue]">
                                  <span><i class="fa fa-user-plus m-r-5"></i>{$v.issue}</span>
                                  </if> 
                                </p>
                            </div>
                        </div>
                    </li>
                    </if>
                    <elseif value="$ui[listtype] eq 3" />
                    <div class="widget widget-article widget-shadow ">
                        <div class="widget-header">
                            <a href="{$v.url}" title="{$v.title}" {$g.urlnew}>
                                <img class="cover-image imgloading" data-original="{$v.imgurl|thumb:$ui[ccimg_x],$ui[ccimg_y]}" alt="{$v.title}">
                            </a>
                        </div>
                        <div class="widget-body">
                            <h4 class="widget-title">
                                <a href="{$v.url}" title="{$v.title}" {$g.urlnew}>{$v.title}</a>
                            </h4>
                            <p class="margin-bottom-0">{$v.description}</p>
                            <p class="widget-metas">
                                <span>{$_M.word.read} <i class="fa fa-eye m-r-5" aria-hidden="true"></i>{$v.hits}</span>
                                <span>{$_M.word.AddDate} <i class="fa fa-clock-o m-r-5"></i>{$v.updatetime}</span>
                                <if value="$v[issue]">
                                <span><i class="fa fa-user-plus m-r-5"></i>{$v.issue}</span>
                                </if> 
                            </p>
                        </div>
                    </div>                    
                    </if>
                    </tag>
                     
                  </ul>
                  <div class="met-pager-ajax-link hidden-md-up" m-type="nosysdata">
                    <button type="button" class="btn btn-primary btn-block btn-squared ladda-button" id="met-pager-btn"  data-page="1">
                      <i class="icon wb-chevron-down m-r-5" aria-hidden="true"></i>
                    </button>
                  </div>
                  <div class="page-box" m-type="nosysdata"><pager /></div>
                </div>
              </div>
            </div>
            <div class="col-lg-3">
              <div class="row">
                <div class="met-news-bar">
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
                </div>
              </div>
            </div>
        </div>
    </div>
  </section>
  </if>
</section>