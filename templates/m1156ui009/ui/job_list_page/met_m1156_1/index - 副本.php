<?php defined('IN_MET') or exit('No permission'); ?>
<section class="$uicss lazy" m-id="{$ui.mid}" 
<if value='$ui[bgimg] && !strstr($ui[bgimg],$c[met_agents_img])'>data-background="{$ui.bgimg}"</if>>
    <div class="met-job animsition">
        <div class="container">
            <div class="row">
                <div class="met-job-list met-pager-ajax">
    				<tag action="job.list">
                    <div class="widget widget-article widget-shadow">
                        <div class="widget-body">
                            <h3 class="widget-title">{$v.position}</h3>
                            <p class="widget-metas">
                                <span><i class="icon wb-time m-r-5" aria-hidden="true"></i>{$v.addtime}</span>
                                <span><i class="icon wb-map m-r-5" aria-hidden="true"></i>{$v.place}</span>
                                <span><i class="icon wb-user m-r-5" aria-hidden="true"></i>{$v.count}</span>
                                <span><i class="icon wb-payment m-r-5" aria-hidden="true"></i>{$v.deal}</span>
                            </p>
                            <hr>
                            <div class="met-editor lazyload clearfix"><p>{$v.content}</p></div>
                            <if value="$ui.cvok">
                            <hr>
                            <div class="widget-body-footer m-t-0">
                            <a class="btn btn-outline btn-squared btn-primary met-job-cvbtn" href="javascript:;" data-toggle="modal" data-target="#met-job-cv" data-jobid="{$v.id}" data-cvurl="cv.php?lang=cn&selected">{$ui.cvtitle}</a>
                            </div>
                            </if>
                        </div>
                    </div>
                    </tag>
                </div>
            </div>
        </div>
        <div class="met-pager-ajax-link hidden-md-up" m-type="nosysdata">
          <button type="button" class="btn btn-primary btn-block btn-squared ladda-button" id="met-pager-btn"  data-page="1">
            <i class="icon wb-chevron-down m-r-5" aria-hidden="true"></i>
          </button>
        </div>
        <div class="page-box" m-type="nosysdata"><pager /></div>
    </div>
    <if value="$sub && $ui[cvok]">
    <div class="modal fade modal-primary" id="met-job-cv" aria-hidden="true" role="dialog" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <h4 class="modal-title">{$ui.cvtitle}</h4>
                </div>
                <div class="modal-body">
                    <tag action='job.form'></tag>
                </div>
            </div>
        </div>
    </div>
    </if> 
</section>