<?php defined('IN_MET') or exit('No permission'); ?>
<section class="$uicss lazy img{$ui.full}" m-id="{$ui.mid}" 
<if value='$ui[bgimg] && !strstr($ui[bgimg],$c[met_agents_img])'>data-background="{$ui.bgimg}"</if>>



<div class="met-img animsition">
    <div class="<if value='!$ui[full]'>container</if>">
	    <div class="row">
         
            <ul class="blocks-{$ui.blocksxs} blocks-md-{$ui.blockssm} blocks-lg-{$ui.blocksmd} blocks-xxl-{$ui.blocksxlg} <if value='$ui[full]'>no-space</if> met-page-ajax met-pager-ajax" data-scale="{$c.met_imgs_y}x{$c.met_imgs_x}">



<tag action="img.list" para="true">
          <li class="widget animate">
            <a href="{$v.url}" title="{$v.title}" {$g.urlnew}>
              <div class="cover overlay overlay-hover">
                <img class="cover-image overlay-scale imgloading" data-original="{$v.imgurl|thumb:$c[met_imgs_x],$c[met_imgs_y]}" alt="{$v.title}">
                <div class="overlay-panel overlay-fade overlay-background overlay-background-fixed text-center vertical-align">
                  <div class="vertical-align-middle">
				<h4 class="widget-title margin-bottom-10 font-weight-300">{$v.title}</h4> 
                
				<button type="button" class="btn btn-outline btn-squared btn-inverse">{$ui.looktext}</button>
                  </div>
                </div>
              </div>
            </a>
          </li>
          </tag>

  

            </ul> 
            
            
            
    <div class="page-box" m-type="nosysdata"><pager /></div>
    <div class="met-pager-ajax-link hidden-md-up" m-type="nosysdata">
      <button type="button" class="btn btn-primary btn-block btn-squared ladda-button" id="met-pager-btn"  data-page="1">
        <i class="icon wb-chevron-down m-r-5" aria-hidden="true"></i>
      </button>
    </div> 
            
            
 
         </div>
    </div>
</div>






  
   
</section>