<?php defined('IN_MET') or exit('No permission'); ?>
    <?php if(($ui[showtype]&&$data[classnow]==10001)||!$ui[showtype]){ ?>
<section class="$uicss met-footer" m-id="<?php echo $ui['mid'];?>" m-type="foot">
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
        $m['urlnew'] = $m['nofollow'] ? $m['urlnew']." rel='nofollow'" :$m['urlnew'];
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
    $order = 'no_order asc';
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