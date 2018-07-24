
        <?php
            $id = 36;
            $style = "met_m1156_6";
            if(!isset($ui_compile)){
                load::sys_class('view/ui_compile');
                $ui_compile = new ui_compile();
            }
            $ui = $ui_compile->list_local_config($id);
            $ui['has'] =$ui_compile->list_page_config($met_page);
            ?>
    <?php if(($ui[showtype]&&$data[classnow]==10001)||!$ui[showtype]){ ?>
<section class="foot_contact_met_m1156_6 met-footer" m-id="<?php echo $ui['mid'];?>" m-type="foot">
  <div class="container">
    <div class="row" data-plugin="appear" data-animate="slide-bottom" data-repeat="false">
	  <div class="col-md-4">
	    <h4><?php echo $ui['title1'];?></h4>
        <div class="description"><?php echo $ui['description1'];?></div>
		<div class="social-box">
          <?php
    $type=strtolower(trim('son'));
    $cid=$ui[iconid];
    $column = load::sys_class('label', 'new')->get('column');
    
    unset($result);
    switch ($type) {
            case 'son':
                $result = $column->get_column_son($cid);   
                break;
            case 'current':
                $result[0] = $column->get_column_id($cid);
                break;
            case 'head':
                $result = $column->get_column_head();
                break;
            case 'foot':
                $result = $column->get_column_foot();
                break;
            default:
                $result[0] = $column->get_column_id($cid);
                break;
        }
    $sub = count($result);
    foreach($result as $index=>$m):
        $hides = 1;
        $hide = explode("|",$hides);
        $m['_index']= $index;
        if($data['classnow']==$m['id'] || $data['class1']==$m['id'] || $data['class2']==$m['id']){
            $m['class']="";
        }else{
            $m['class'] = '';
        }
        if(in_array($m['name'],$hide)){
            unset($m['id']);
            unset($m['class']);
            $m['hide'] = $hide;
            $m['sub'] = 0;
        }
    

        if(substr(trim($m['icon']),0,1) == 'm' || substr(trim($m['icon']),0,1) == ''){
            $m['icon'] = 'icon fa-pencil-square-o '.$m['icon'];
        }
        $m['urlnew'] = $m['new_windows'] ? "target='_blank'" :"target='_self'";
        $m['_first']=$index==0 ? true:false;
        $m['_last']=$index==(count($result)-1)?true:false;
        $$m = $m;
?>
          <a     <?php if($_GET[pageset]||($m[columnimg]&&!strstr($m[columnimg],'public/images/metinfo.gif'))){ ?>href="javascript:void(0);"<?php }else{ ?>href="<?php echo $m['url'];?>"<?php } ?> data-id="<?php echo $m['id'];?>" rel="nofollow" target="_blank">
                <?php if($_GET[pageset]||($m[columnimg]&&!strstr($m[columnimg],'public/images/metinfo.gif'))){ ?>
            <span><img src="<?php echo $m['columnimg'];?>" alt="<?php echo $m['name'];?>"></span>
            <?php } ?>
            <i class="<?php echo $m['icon'];?>"></i>
          </a>
          <?php endforeach;?>
		</div>
	  </div>
	  <div class="col-md-4">
	    <h4><?php echo $ui['title2'];?></h4>
		<dl class="dl-contact">
		  <dt><i class="<?php echo str_replace('<m',' <m',$ui['icon1']);?>"></i></dt>
		  <dd><?php echo $ui['contact1'];?></dd>
		</dl>
		<dl class="dl-contact">
		  <dt><i class="<?php echo str_replace('<m',' <m',$ui['icon2']);?>"></i></dt>
		  <dd><?php echo $ui['contact2'];?></dd>
		</dl>
		<dl class="dl-contact">
		  <dt><i class="<?php echo str_replace('<m',' <m',$ui['icon3']);?>"></i></dt>
		  <dd><?php echo $ui['contact3'];?></dd>
		</dl>
		<dl class="dl-contact">
		  <dt><i class="<?php echo str_replace('<m',' <m',$ui['icon4']);?>"></i></dt>
		  <dd><?php echo $ui['contact4'];?></dd>
		</dl>
		<dl class="dl-contact">
		  <dt><i class="<?php echo str_replace('<m',' <m',$ui['icon5']);?>"></i></dt>
		  <dd><?php echo $ui['contact5'];?></dd>
		</dl>
	  </div>
	  <div class="col-md-4">
	    <h4><?php echo $ui['title3'];?></h4> 
        <?php
    $cid=$ui[column3];

    $num = $ui[number3];
    $module = "";
    $type = $ui[type3];
    $para = "";
    if(!$module){
        if(!$cid){
            $value = $m['classnow'];  
        }else{
            $value = $cid;
        }
    }else{
        $value = $module;
    }
   
    $result = load::sys_class('label', 'new')->get('tag')->get_list($value, $num, $type, $order, $para);
    $sub = count($result);
    foreach($result as $index=>$v):
        $id = $v['id'];
        $v['sub'] = $sub;
        $v['_index']= $index;
        $v['_first']= $index==0 ? true:false;
        $v['_last']=$index==(count($result)-1)?true:false;
        $$v = $v;
?>
		<dl class="dl-news">
         
			<?php echo $v['content'];?>
	
		</dl>
        <?php endforeach;?>
	  </div>
	</div>
  </div>
</section>
<?php } ?>

        <?php
            $id = 37;
            $style = "met_m1156_5";
            if(!isset($ui_compile)){
                load::sys_class('view/ui_compile');
                $ui_compile = new ui_compile();
            }
            $ui = $ui_compile->list_local_config($id);
            $ui['has'] =$ui_compile->list_page_config($met_page);
            ?>
<footer class="foot_info_met_m1156_5     <?php if($ui[contenttype]){ ?>lr<?php } ?>" m-id="<?php echo $ui['mid'];?>" m-type="foot">
  <div class="container">
    <div class="foot-left">
      <div class="foot-nav" m-id="noset" m-type="foot_nav">
        <?php
    $type=strtolower(trim('foot'));
    $cid=0;
    $column = load::sys_class('label', 'new')->get('column');
    
    unset($result);
    switch ($type) {
            case 'son':
                $result = $column->get_column_son($cid);   
                break;
            case 'current':
                $result[0] = $column->get_column_id($cid);
                break;
            case 'head':
                $result = $column->get_column_head();
                break;
            case 'foot':
                $result = $column->get_column_foot();
                break;
            default:
                $result[0] = $column->get_column_id($cid);
                break;
        }
    $sub = count($result);
    foreach($result as $index=>$m):
        $hides = 1;
        $hide = explode("|",$hides);
        $m['_index']= $index;
        if($data['classnow']==$m['id'] || $data['class1']==$m['id'] || $data['class2']==$m['id']){
            $m['class']="";
        }else{
            $m['class'] = '';
        }
        if(in_array($m['name'],$hide)){
            unset($m['id']);
            unset($m['class']);
            $m['hide'] = $hide;
            $m['sub'] = 0;
        }
    

        if(substr(trim($m['icon']),0,1) == 'm' || substr(trim($m['icon']),0,1) == ''){
            $m['icon'] = 'icon fa-pencil-square-o '.$m['icon'];
        }
        $m['urlnew'] = $m['new_windows'] ? "target='_blank'" :"target='_self'";
        $m['_first']=$index==0 ? true:false;
        $m['_last']=$index==(count($result)-1)?true:false;
        $$m = $m;
?>
        <a href="<?php echo $m['url'];?>" <?php echo $m['urlnew'];?> title="<?php echo $m['name'];?>"><?php echo $m['name'];?></a>
        <?php endforeach;?>
      </div>
          <?php if($ui[linkok]){ ?>
      <div class="text-link" m-id="noset" m-type="link">
        <ul>
          <li><?php echo $ui['linktitle'];?></li>
          <?php
    $result = load::sys_class('label', 'new')->get('link')->get_link_list();
    $sub = count($result);
     foreach($result as $index=>$v):
        $v['sub']      = $sub;
        $v['_index']   = $index;
        $v['_first']   = $index == 0 ? true:false;
        $v['_last']    = $index == (count($result)-1) ? true : false;
?>
          <li>
            <a href="<?php echo $v['weburl'];?>" title="<?php echo $v['webname'];?>" target="_blank">
                  <?php if($v['link_type']==1){ ?>
              <img src="<?php echo $v['weblogo'];?>" alt="<?php echo $v['webname'];?>">
              <?php }else{ ?>
              <span><?php echo $v['webname'];?></span>
              <?php } ?>
            </a>
          </li>
          <?php endforeach;?>
        </ul>
      </div>
      <?php } ?>
      <div class="foot-copyright">
            <?php if($c[met_footaddress]){ ?><p><?php echo $c['met_footaddress'];?></p><?php } ?>
            <?php if($c[met_foottel]){ ?><p><?php echo $c['met_foottel'];?></p><?php } ?>
            <?php if($c[met_footother]){ ?><?php echo $c['met_footother'];?><?php } ?>
            <?php if($c[met_footright]||$c[met_footstat]){ ?><p><?php echo $c['met_footright'];?></p><?php } ?>
      </div>
          <?php if(($ui[simok]&&$c[met_ch_lang]&&$data[lang]=='cn')||($c[met_lang_mark]&&$ui[langok])){ ?>
      <div class="foot-lang" m-type="lang" m-id="0">
            <?php if($ui[simok]&&$c[met_ch_lang]&&$data[lang]=='cn'){ ?>
        <a href="javascript:void(0);" class="simplified" title="设置页面显示为繁体中文">
          <i>繁</i>
        </a>
        <?php } ?>
            <?php if($c[met_lang_mark]&&$ui[langok]){ ?>
        <?php
    $language = load::sys_class('label', 'new')->get('language')->get_lang();
    $sub = count($language);
    $i = 0;
    foreach($language as $index=>$v):

        $v['_index']   = $index;
        $v['_first']   = $i == 0 ? true:false;

        $v['_last']    = $index == (count($language)-1) ? true : false;
        $v['sub'] = $sub;
        $i++;
?><?php endforeach;?>
            <?php if($sub>1){ ?>
        <?php
    $language = load::sys_class('label', 'new')->get('language')->get_lang();
    $sub = count($language);
    $i = 0;
    foreach($language as $index=>$v):

        $v['_index']   = $index;
        $v['_first']   = $i == 0 ? true:false;

        $v['_last']    = $index == (count($language)-1) ? true : false;
        $v['sub'] = $sub;
        $i++;
?>
            <?php if($data[lang]==$v[mark]){ ?>
        <a href="javascript:void(0);" class="lang" data-toggle="modal" data-target="#met-langlist-modal">
              <?php if($ui[langqiok]){ ?><i class="flag-icon flag-icon-<?php echo $v['iconname'];?>"></i><?php } ?>
          <b><?php echo $v['name'];?></b>
        </a>
        <?php } ?>
        <?php endforeach;?>
        <?php } ?>
        <?php } ?>
      </div>
      <?php } ?>
    </div>
    <div class="foot-right">
          <?php if($c[met_foottext]||$_GET[pageset]){ ?>
      <div class="foot-text" m-id="noset" m-type="head_seo">
            <?php if($c[met_foottext]){ ?><?php echo $c['met_foottext'];?><?php }else{ ?><u>点击添加【网站底部优化字】内容（该文字仅“可视化”模式下可见）！</u><?php } ?>
      </div>
      <?php } ?>
      <div class="powered_by_metinfo">
      <!--  Powered by <a href="http://www.MetInfo.cn/#copyright" target="_blank" title="<?php echo $word['Info1'];?>">MetInfo</a> <?php echo $c['metcms_v'];?> -->	
      </div>
    </div>
  </div>
</footer>
    <?php if($c[met_lang_mark]&&$ui[langok]){ ?>
<div class="modal fade modal-3d-flip-vertical" id="met-langlist-modal" aria-hidden="true" role="dialog" tabindex="-1">
  <div class="modal-dialog modal-center modal-lg">
    <div class="modal-content">
      <div class="modal-body">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">×</span>
        </button>
        <div class="row">
          <?php
    $language = load::sys_class('label', 'new')->get('language')->get_lang();
    $sub = count($language);
    $i = 0;
    foreach($language as $index=>$v):

        $v['_index']   = $index;
        $v['_first']   = $i == 0 ? true:false;

        $v['_last']    = $index == (count($language)-1) ? true : false;
        $v['sub'] = $sub;
        $i++;
?>              
          <div class="col-md-4 col-sm-6 col-xs-12 lang-button">
            <a href="<?php echo $v['met_weburl'];?>" class="btn btn-block btn-outline btn-default btn-squared text-nowrap" title="<?php echo $v['name'];?>">
                  <?php if($ui[langqiok]){ ?><i class="flag-icon flag-icon-<?php echo $v['iconname'];?>"></i><?php } ?>
              <b><?php echo $v['name'];?></b>
            </a>
          </div>
          <?php endforeach;?>
        </div>
      </div>
    </div>
  </div>
</div>
<?php } ?>
</body>
</html>

        <?php
            $id = 32;
            $style = "met_m1156_1";
            if(!isset($ui_compile)){
                load::sys_class('view/ui_compile');
                $ui_compile = new ui_compile();
            }
            $ui = $ui_compile->list_local_config($id);
            $ui['has'] =$ui_compile->list_page_config($met_page);
            ?>
<button class="back_top_met_m1156_1     <?php if($_GET[pageset]){ ?>active<?php } ?>" number="<?php echo $ui['number'];?>" m-id="<?php echo $ui['mid'];?>" m-type="nocontent"></button>
<input type="hidden" name="met_lazyloadbg" value="<?php echo $g['lazyloadbg'];?>">
<?php if($c["shopv2_open"]){ $shop_lang_time = filemtime(PATH_WEB."app/app/shop/lang/shop_lang_cn.js"); ?>
<script>
var jsonurl="<?php echo $url['shop_cart_jsonlist'];?>",
    totalurl="<?php echo $url['shop_cart_modify'];?>",
    delurl="<?php echo $url['shop_cart_del'];?>",
    price_prefix="<?php echo $c['shopv2_price_str_prefix'];?>",
    price_suffix="<?php echo $c['shopv2_price_str_suffix'];?>";
</script>
<?php }?>
<script src="<?php echo $c['met_weburl'];?>public/ui/v2/static/js/basic.js"></script>
<?php if(file_exists(PATH_TEM."cache/common.js")){ $common_js_time = filemtime(PATH_TEM."cache/common.js");?>
<script src="<?php echo $c['met_weburl'];?>templates/<?php echo $c['met_skin_user'];?>/cache/common.js?<?php echo $common_js_time;?>"></script>
<?php } ?>
<?php if($met_page){ $page_js_time = filemtime(PATH_TEM."cache/".$met_page."_".$_M[lang].".js");?>
<script src="<?php echo $c['met_weburl'];?>templates/<?php echo $c['met_skin_user'];?>/cache/<?php echo $met_page;?>_<?php echo $_M[lang];?>.js?<?php echo $page_js_time;?>"></script>
<?php }?>
<?php if($c["shopv2_open"]){ ?>
<script src="<?php echo $c['met_weburl'];?>app/app/shop/lang/shop_lang_<?php echo $data['lang'];?>.js?<?php echo $shop_lang_time;?>"></script>
<script src="<?php echo $c['met_weburl'];?>app/app/shop/web/templates/met/static/js/own.js"></script>
<?php }?>
</body>
<?php if(is_mobile()){ ?>
<?php echo $c['met_footstat_mobile'];?>
<?php }else{?>
<?php echo $c['met_footstat'];?>
<?php }?>
<?php echo $_M[html_plugin][foot_script];?>
</html>