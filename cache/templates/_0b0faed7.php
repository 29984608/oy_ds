<?php defined('IN_MET') or exit('No permission'); ?>
<footer class="$uicss     <?php if($ui[contenttype]){ ?>lr<?php } ?>" m-id="<?php echo $ui['mid'];?>" m-type="foot">
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