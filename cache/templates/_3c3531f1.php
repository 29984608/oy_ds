<?php defined('IN_MET') or exit('No permission'); ?>
<?php
    $type=strtolower(trim('current'));
    $cid=$data[classnow];
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
?><?php endforeach;?>
    <?php if($data[classnow]==10001||!$ui[bgcolumn]||strstr('|'.strip_tags($ui[bgcolumn]).'|','|'.strip_tags($m[name]).'|')){ ?>
<section class="$uicss lazy <?php echo $ui['bgfull'];?>" m-id="<?php echo $ui['mid'];?>" data-title="<?php echo $ui['bgtitle'];?>" 
      <?php if($ui[bgimg] && !strstr($ui[bgimg],$c[met_agents_img])){ ?>data-background="<?php echo $ui['bgimg'];?>"<?php } ?>>
  <div class="news-box">
    <h2 class="h2"><?php echo $ui['title'];?></h2> 
    <span></span>      
    <div class="info-list container">
      <ul class="blocks-100 blocks-sm-2 blocks-lg-4">
        <?php
    $cid=$ui[column];

    $num = $ui[number];
    $module = "";
    $type = $ui[type];
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
        <li>
          <a href="<?php echo $v['url'];?>" title="<?php echo $v['title'];?>" <?php echo $g['urlnew'];?>>
            <img class="imgloading" data-original="<?php echo thumb($v['imgurl'],$ui[width],$ui[height]);?>" title="<?php echo $v['title'];?>" alt="<?php echo $v['title'];?>">
          </a>
          <a href="<?php echo $v['url'];?>" title="<?php echo $v['title'];?>" <?php echo $g['urlnew'];?>>
            <strong><?php echo $v['title'];?></strong>
          </a>
          <font><?php echo $v['updatetime'];?></font>
          <p><?php echo utf8substr($v['description'],0,$ui[subnum]);?></p>
              <?php if($ui[tagok]){ ?>
          <span>
          <?php echo $ui['tag'];?>
                  <?php
            $sub = count($v[tag]);
            $num = 30;
            if(!is_array($v[tag])){
                $v[tag] = explode('|',$v[tag]);
            }
            foreach ($v[tag] as $index => $val) {
                if($index >= $num){
                    break;
                }
                if(is_array($val)){
                    $val['_index'] = $index;
                    $val['_first'] = $index == 0 ? true : false;
                    $val['_last']  = $index == (count($v[tag])-1) ? true : false;
                    $val['sub']    = $sub;
                }

                $val = $val;
            ?>
              <?php if($val){ ?>
          <a href="search/?searchword=<?php echo $val;?>" title="<?php echo $val;?>" <?php echo $g['urlnew'];?>><?php echo $val;?></a>
          <?php } ?>
          <?php }?>
          </span>
          <?php } ?>
        </li>
        <?php endforeach;?>
      </ul>
    </div>    
        <?php if($ui[moreok]){ ?>
    <?php
    $type=strtolower(trim('current'));
    $cid=$ui[imgcolumn];
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
?><?php endforeach;?>
    <a class="news-button" href="<?php echo $m['url'];?>" title="<?php echo $ui['title'];?>" <?php echo $m['urlnew'];?>><?php echo $ui['morework'];?></a>
    <?php } ?>
  </div>
</section>
<?php }else if($_GET[pageset]){ ?>
<section class="$uicss" m-id="<?php echo $ui['mid'];?>" m-type="nocontent" 
  style="background:#263238;max-height:40px;text-align:center;color:#fff;line-height:40px;display:block;border-bottom:1px solid #888;">
  该栏目设置了限制显示，可在“区块显示的栏目”中添加显示（该文字仅“可视化”模式下可见）
</section>
<?php } ?>