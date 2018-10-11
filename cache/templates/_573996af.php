<?php defined('IN_MET') or exit('No permission'); ?>
<?php $met_page = "index";?>
<?php
$metinfover_v2=$c["metinfover"]=="v2"?true:false;
$met_file_version=str_replace(".","",$c["metcms_v"]).$c["met_patch"];
$lang_json_file_ok=file_exists(PATH_WEB."cache/lang_json_".$_M["lang"].".js");
if(!$lang_json_file_ok){
    echo "<meta http-equiv='refresh' content='0'/>";
}
$html_hidden=$lang_json_file_ok?"":"hidden";
if(!$data["module"] || $data["module"]==10){
    $nofollow=1;
}
$user_name=$_M["user"]?$_M["user"]["username"]:"";
?>
<!DOCTYPE HTML>
<html class="<?php echo $html_class;?>" <?php echo $html_hidden;?>>
<head>
<meta charset="utf-8">
<?php if($nofollow){ ?>
<meta name="robots" content="noindex,nofllow" />
<?php } ?>
<meta name="renderer" content="webkit">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=0,minimal-ui">
<meta name="format-detection" content="telephone=no">
<title><?php echo $data['page_title'];?></title>
<meta name="description" content="<?php echo $data['page_description'];?>">
<meta name="keywords" content="<?php echo $data['page_keywords'];?>">
<meta name="generator" content="MetInfo <?php echo $c['metcms_v'];?>" data-variable="<?php echo $c['met_weburl'];?>|<?php echo $data['lang'];?>|<?php echo $data['synchronous'];?>|<?php echo $c['met_skin_user'];?>|<?php echo $data['module'];?>|<?php echo $data['classnow'];?>|<?php echo $data['id'];?>" data-user_name="<?php echo $user_name;?>">
<link href="<?php echo $c['met_weburl'];?>favicon.ico" rel="shortcut icon" type="image/x-icon">
<?php
if($lang_json_file_ok){
    $basic_css_name=$metinfover_v2?"":"_web";
    $isLteIe9=strpos($_SERVER["HTTP_USER_AGENT"],"MSIE 9")!==false || strpos($_SERVER["HTTP_USER_AGENT"],"MSIE 8")!==false;
    if($isLteIe9){
?>
<link href="<?php echo $url['site'];?>app/system/include/static2/css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="<?php echo $url['site'];?>app/system/include/static2/css/bootstrap-extend.min.css" rel="stylesheet" type="text/css">
<link href="<?php echo $url['site'];?>app/system/include/static2/assets/css/site.min.css" rel="stylesheet" type="text/css">
<link href="<?php echo $url['site'];?>public/ui/v2/static/css/basic<?php echo $basic_css_name;?>-lteie9-1.css?<?php echo $met_file_version;?>" rel="stylesheet" type="text/css">
<?php }else{ ?>
<link rel="stylesheet" type="text/css" href="<?php echo $url['site'];?>public/ui/v2/static/css/basic<?php echo $basic_css_name;?>.css?<?php echo $met_file_version;?>">
<?php
    }
    if($metinfover_v2){
        if(file_exists(PATH_TEM."cache/common.css")){
            $common_css_time = filemtime(PATH_TEM."cache/common.css");
?>
<link rel="stylesheet" type="text/css" href="<?php echo $c['met_weburl'];?>templates/<?php echo $c['met_skin_user'];?>/cache/common.css?<?php echo $common_css_time;?>">
<?php
        }
        if($met_page){
            if($met_page == 404) $met_page = "show";
            $page_css_time = filemtime(PATH_TEM."cache/".$met_page."_".$_M["lang"].".css");
?>
<link rel="stylesheet" type="text/css" href="<?php echo $c['met_weburl'];?>templates/<?php echo $c['met_skin_user'];?>/cache/<?php echo $met_page;?>_<?php echo $_M["lang"];?>.css?<?php echo $page_css_time;?>">
<?php
        }
    }
    if(is_mobile() && $c["met_headstat_mobile"]){
?>
<?php echo $c['met_headstat_mobile'];?>

<?php }else if(!is_mobile() && $c["met_headstat"]){?>
<?php echo $c['met_headstat'];?>

<?php
    }
    if($_M["html_plugin"]["head_script"]){
?>
<?php echo $_M["html_plugin"]["head_script"];?>

<?php } ?>
<style>
body{
<?php if($g["bodybgimg"]){ ?>
    background-image: url(<?php echo $g['bodybgimg'];?>) !important;background-position: center;background-repeat: no-repeat;
<?php } ?>
    background-color:<?php echo $g['bodybgcolor'];?> !important;font-family:<?php echo $g['met_font'];?> !important;}
</style>
<!--[if lte IE 9]>
<script src="<?php echo $_M["url"]["site"];?>public/ui/v2/static/js/lteie9.js"></script>
<![endif]-->
</head>
<!--[if lte IE 8]>
<div class="text-xs-center m-b-0 bg-blue-grey-100 alert">
    <button type="button" class="close" aria-label="Close" data-dismiss="alert">
        <span aria-hidden="true">×</span>
    </button>
    <?php echo $word['browserupdatetips'];?>
</div>
<![endif]-->
<body>
<?php } ?>
        <?php
            $id = 35;
            $style = "met_m1156_6";
            if(!isset($ui_compile)){
                load::sys_class('view/ui_compile');
                $ui_compile = new ui_compile();
            }
            $ui = $ui_compile->list_local_config($id);
            $ui['has'] =$ui_compile->list_page_config($met_page);
            ?>
<header class="head_nav_met_m1156_6 swiper-header     <?php if(!$ui[met_member_register]&&!($c[met_lang_mark]&&$ui[langok])&&!($c[met_ch_lang]&&$ui[fontok]&&$data[lang]=="cn")&&!$ui[searchok]){ ?>not-right<?php } ?>" m-id="<?php echo $ui['mid'];?>" m-type="head_nav" role="heading">
  <nav role="navigation">
    <div class="    <?php if($ui[navfull]){ ?>container-fluid<?php }else{ ?>container<?php } ?>">
      <div class="left-box">
        <div class="logo-box">
          <a href="<?php echo $c['index_url'];?>" title="<?php echo $c['met_webname'];?>">
            <img src="<?php echo $c['met_logo'];?>" alt="<?php echo $c['met_webname'];?>">
            <img src="<?php echo $ui['logos'];?>" alt="<?php echo $c['met_webname'];?>">
          </a>
        </div>
        <div class="nav-box nav-fix"> 
          <ul>
                <?php if($ui[navbuttonok]){ ?>
            <li class="m-r-0 phone">
              <a href="<?php echo $ui['navbuttonlink'];?>">
                    <?php if($ui[navbuttonicon]){ ?>
                <i class="<?php echo str_replace('<m',' <m',$ui['navbuttonicon']);?>"></i>
                <?php } ?>
                <span><?php echo $ui['navbuttonfont'];?></span>
              </a>
            </li>
            <?php } ?>
            <?php
    $type=strtolower(trim('head'));
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
            $m['class']="active";
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
?><?php endforeach;?>
            <li class="m-r-<?php echo $ui['navmargin'];?>     <?php if($data[classnow]==10001){ ?>active<?php } ?>">
              <a href="<?php echo $c['index_url'];?>" title="<?php echo $word['home'];?>">
                    <?php if($ui[naviconok]){ ?><i class="icon fa-bank"></i><?php } ?>
                <span><?php echo $word['home'];?></span>
              </a>
            </li>
            <?php
    $type=strtolower(trim('head'));
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
            $m['class']="active";
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
            <li class="m-r-<?php echo $ui['navmargin'];?> <?php echo $m['class'];?>     <?php if($ui[navsonok] && $m[sub]){ ?>nav-sub<?php } ?>">
              <a href="<?php echo $m['url'];?>" title="<?php echo $m['name'];?>">
                    <?php if($ui[naviconok]){ ?><i class="<?php echo $m['icon'];?>"></i><?php } ?>
                <span><?php echo $m['name'];?></span>
              </a>
                  <?php if($ui[navsonok] && $m[sub]){ ?>
              <ul>
                <li class="<?php echo $m['class'];?>">
                  <a href="<?php echo $m['url'];?>" <?php echo $m['urlnew'];?> title="    <?php if($m[module]<>1){ ?><?php echo $ui['navall'];?><?php }else{ ?><?php echo $m['name'];?><?php } ?>">
                        <?php if($ui[naviconok]){ ?><i class="<?php echo $m['icon'];?>"></i><?php } ?>
                    <span>    <?php if($m[module]<>1){ ?><?php echo $ui['navall'];?><?php }else{ ?><?php echo $m['name'];?><?php } ?></span>
                  </a>
                </li>
                <?php
    $type=strtolower(trim('son'));
    $cid=$m['id'];
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
            $m['class']="active";
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
                <li class="<?php echo $m['class'];?>     <?php if($m[sub]){ ?>nav-sub<?php } ?>">
                  <a href="<?php echo $m['url'];?>" <?php echo $m['urlnew'];?> title="<?php echo $m['name'];?>">
                        <?php if($ui[naviconok]){ ?><i class="<?php echo $m['icon'];?>"></i><?php } ?>
                    <span><?php echo $m['name'];?></span>
                  </a>
                      <?php if($m[sub]){ ?>
                  <ul>
                    <li class="<?php echo $m['class'];?>">
                      <a href="<?php echo $m['url'];?>" <?php echo $m['urlnew'];?> title="    <?php if($m[module]<>1){ ?><?php echo $ui['navall'];?><?php }else{ ?><?php echo $m['name'];?><?php } ?>">
                            <?php if($ui[naviconok]){ ?><i class="<?php echo $m['icon'];?>"></i><?php } ?>
                        <span>    <?php if($m[module]<>1){ ?><?php echo $ui['navall'];?><?php }else{ ?><?php echo $m['name'];?><?php } ?></span>
                      </a>
                    </li>
                    <?php
    $type=strtolower(trim('son'));
    $cid=$m['id'];
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
            $m['class']="active";
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
                    <li class="<?php echo $m['class'];?>">
                      <a href="<?php echo $m['url'];?>" <?php echo $m['urlnew'];?> title="<?php echo $m['name'];?>">
                            <?php if($ui[naviconok]){ ?><i class="<?php echo $m['icon'];?>"></i><?php } ?>
                        <span><?php echo $m['name'];?></span>
                      </a>
                    </li>
                    <?php endforeach;?>
                  </ul>
                  <?php } ?>
                </li>
                <?php endforeach;?>
              </ul>
              <?php } ?>
            </li>
            <?php endforeach;?>
          </ul>
        </div>
      </div>
      <div class="right-box">
            <?php if($c[met_member_register]){ ?>
            <?php if($user){ ?>
        <div class="user-box" m-id="member" m-type="member">
          <a href="javascript:void(0);">
            <i class="icon fa-user"></i>
            <span><?php echo $user['username'];?></span>
          </a>
          <ul>
            <li>
              <a href="<?php echo $c['met_weburl'];?>member/basic.php?lang=<?php echo $data['lang'];?>" title="<?php echo $word['memberIndex9'];?>">
                <i class="icon wb-user"></i>
                <span><?php echo $word['memberIndex9'];?></span>
              </a>
            </li>
            <li>
              <a href="<?php echo $c['met_weburl'];?>member/basic.php?lang=<?php echo $data['lang'];?>&a=dosafety" title="<?php echo $word['accsafe'];?>">
                <i class="icon wb-lock"></i>
                <span><?php echo $word['accsafe'];?></span>
              </a>
            </li>
            <li>
              <a href="<?php echo $c['met_weburl'];?>member/login.php?lang=<?php echo $data['lang'];?>&a=dologout" title="<?php echo $word['memberIndex10'];?>">
                <i class="icon wb-power"></i>
                <span><?php echo $word['memberIndex10'];?></span>
              </a>
            </li>
          </ul>
        </div>
        <?php }else{ ?>
        <div class="user-button" m-id="member" m-type="member">
          <a href="<?php echo $c['met_weburl'];?>member/login.php?lang=<?php echo $data['lang'];?>" title="<?php echo $word['login'];?>"><i class="icon fa-user"></i></a>
          <ul>
            <li><a href="<?php echo $c['met_weburl'];?>member/register_include.php?lang=<?php echo $data['lang'];?>" title="<?php echo $word['register'];?>"><?php echo $word['register'];?></a></li>
            <li><a href="<?php echo $c['met_weburl'];?>member/login.php?lang=<?php echo $data['lang'];?>" title="<?php echo $word['login'];?>"><?php echo $word['login'];?></a></li>
          </ul>
        </div>
        <?php } ?>
        <?php } ?>
            <?php if($c[met_lang_mark]&&$ui[langok]){ ?>
        <div class="lang-box" m-type="lang">
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
          <a href="javascript:void(0);">
                <?php if($ui[langimgok]){ ?>
            <img src="<?php echo $v['flag'];?>" alt="<?php echo $v['name'];?>">
            <?php } ?>
            <span><?php echo $v['name'];?></span>
          </a>
          <?php } ?>
          <?php endforeach;?>
          <ul>
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
            <li>
              <a href="<?php echo $v['met_weburl'];?>" title="<?php echo $v['name'];?>">
                    <?php if($ui[langimgok]){ ?>
                <img src="<?php echo $v['flag'];?>" alt="<?php echo $v['name'];?>">
                <?php } ?>
                <span><?php echo $v['name'];?></span>
              </a>
            </li>
            <?php endforeach;?>
          </ul>
          <?php } ?>
        </div>
        <?php } ?>
            <?php if($c[met_ch_lang]&&$ui[fontok]&&$data[lang]=='cn'){ ?> 
        <div class="font-box" m-id="0" m-type="lang">
          <a href="javascript:void(0);">
            <i>繁</i>
          </a> 
        </div>
        <?php } ?>
            <?php if($ui[searchok]){ ?>
        <div class="search-box">
          <a href="javascript:void(0);"><i class="icon fa-search"></i></a>
          <?php
    $type=strtolower(trim('current'));
    $cid=$ui[searchid];
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
?><?php endforeach;?>
              <?php if($m['module']==3){ ?>
          <form method="get" action="    <?php if($data[classnow]<>10001){ ?>../<?php } ?><?php echo $m['foldername'];?>/">
            <button class="icon fa-search" type="submit"></button>
            <input type="hidden" name="search" value="search">
            <input type="hidden" name="lang" value="<?php echo $data['lang'];?>">
            <input type="text" name="content" value="<?php echo $data['content'];?>" placeholder="<?php echo $ui['searchkeyword'];?>">
          </form>
          <?php }else{ ?>
          <form method="get" action="    <?php if($data[classnow]<>10001){ ?>../<?php } ?>search/">
            <button class="icon fa-search" type="submit"></button>
            <input type="hidden" name="lang" value="<?php echo $data['lang'];?>">
            <input type="hidden" name="class1" value="<?php echo $data['class1'];?>">
            <input type="text" name="searchword" value="<?php echo $data['searchword'];?>" placeholder="<?php echo $ui['searchkeyword'];?>">
          </form>
          <?php } ?>
        </div>
        <?php } ?>
      </div>
    </div>
  </nav>
  <section class="box-ok     <?php if($ui[boxok]==2){ ?>mobile<?php } ?>"></section>
</header>

        <?php
            $id = 2;
            $style = "met_m1156_2";
            if(!isset($ui_compile)){
                load::sys_class('view/ui_compile');
                $ui_compile = new ui_compile();
            }
            $ui = $ui_compile->list_local_config($id);
            $ui['has'] =$ui_compile->list_page_config($met_page);
            ?>
<?php 
    $banner = load::sys_class('label', 'new')->get('banner')->get_column_banner($data['classnow']);
    $sub = count($banner['img']);
    foreach($banner['img'] as $index=>$v):
        $v['_index']   = $index;
        $v['_first']   = $index == 0 ? true:false;
        $v['_last']    = $index == (count($result)-1) ? true : false;
        $v['type'] = $banner['config']['type'];
        $v['y'] = $banner['config']['y'];
        $v['sub'] = $sub;
?><?php endforeach;?>
    <?php if($sub){ ?>
<section class="banner_met_m1156_2     <?php if($ui[heightfull]&&($ui[heightfull]!=2||$data[classnow]==10001)){ ?>full<?php } ?>" 
  data-title="<?php echo $ui['bgtitle'];?>" m-id="<?php echo $ui['mid'];?>" m-type="banner"
      <?php if($array=!$data[id]?$ui[showlist]:$ui[showdetail]){ ?>
          <?php
            $sub = count($array);
            $num = 30;
            if(!is_array($array)){
                $array = explode('|',$array);
            }
            foreach ($array as $index => $val) {
                if($index >= $num){
                    break;
                }
                if($sub <=0){
                    continue;
                }
                if(is_array($val)){
                    $val['_index'] = $index;
                    $val['_first'] = $index == 0 ? true : false;
                    $val['_last']  = $index == (count($array)-1) ? true : false;
                    $val['sub']    = $sub;
                }

                $v = $val;
            ?>
      <?php if(strip_tags($v)=='简介模块'&&$data[module]==1){ ?>hidden<?php } ?>
      <?php if(strip_tags($v)=='新闻模块'&&$data[module]==2){ ?>hidden<?php } ?>
      <?php if(strip_tags($v)=='产品模块'&&$data[module]==3){ ?>hidden<?php } ?>
      <?php if(strip_tags($v)=='下载模块'&&$data[module]==4){ ?>hidden<?php } ?>
      <?php if(strip_tags($v)=='图片模块'&&$data[module]==5){ ?>hidden<?php } ?>
      <?php if(strip_tags($v)=='招聘模块'&&$data[module]==6){ ?>hidden<?php } ?>
      <?php if(strip_tags($v)=='留言模块'&&$data[module]==7){ ?>hidden<?php } ?>
      <?php if(strip_tags($v)=='反馈模块'&&$data[module]==8){ ?>hidden<?php } ?>
      <?php if(strip_tags($v)=='全站搜索'&&$data[module]==11){ ?>hidden<?php } ?>
      <?php if(strip_tags($v)=='网站地图'&&$data[module]==12){ ?>hidden<?php } ?>
  <?php }?>
  <?php } ?> >
  <div class="banner-box     <?php if($v[_index]){ ?>banner-container<?php } ?>">
    <div class="banner-wrapper">
      <?php 
    $banner = load::sys_class('label', 'new')->get('banner')->get_column_banner($data['classnow']);
    $sub = count($banner['img']);
    foreach($banner['img'] as $index=>$v):
        $v['_index']   = $index;
        $v['_first']   = $index == 0 ? true:false;
        $v['_last']    = $index == (count($result)-1) ? true : false;
        $v['type'] = $banner['config']['type'];
        $v['y'] = $banner['config']['y'];
        $v['sub'] = $sub;
?>
      <div class="banner-slide">
            <?php if($v[img_link]){ ?>
        <a href="<?php echo $v['img_link'];?>" title="<?php echo $v['img_title'];?>" target="_blank">
        <?php } ?>
              <?php if(($v[img_title]||$v[img_des])&&$ui[word_ok]){ ?>
          <dl class="H<?php echo $v['img_text_position'];?>">
            <dd class="container">
                  <?php if($v[img_title]){ ?>
              <h3><font     <?php if($v[img_title_color]){ ?>color="<?php echo $v['img_title_color'];?>"<?php } ?>><?php echo $v['img_title'];?></font></h3>
              <?php } ?>
                  <?php if($v[img_des]){ ?>
              <p><font     <?php if($v[img_title_color]){ ?>color="<?php echo $v['img_des_color'];?>"<?php } ?>><?php echo $v['img_des'];?></font></p>
              <?php } ?>
            </dd>
          </dl>
          <?php } ?>
          <ul>
                <?php if($ui[heightfull]){ ?>
            <li class="banner-lazy fullheight" data-background="<?php echo $v['img_path'];?>">
               <img class="banner-lazy" data-src="<?php echo $v['img_path'];?>" alt="<?php echo $v['img_title'];?>">
            </li>
            <?php }else{ ?>
            <li class="pc     <?php if($v['height']){ ?>height<?php } ?>">
              <img     <?php if(!$v[_first]){ ?>data-<?php } ?>src="    <?php if(!$v[height]){ ?><?php echo $v['img_path'];?><?php }else{ ?><?php echo thumb($v['img_path'],0,$v[height]);?><?php } ?>"     <?php if($v['height']){ ?>height="<?php echo $v['height'];?>"<?php } ?> alt="<?php echo $v['img_title'];?>">
            </li>
            <li class="pad     <?php if($v['height_t']){ ?>height<?php } ?>">
              <img data-src="    <?php if(!$v[height_t]){ ?><?php echo $v['img_path'];?><?php }else{ ?><?php echo thumb($v['img_path'],0,$v[height_t]);?><?php } ?>"     <?php if($v['height_t']){ ?>height="<?php echo $v['height_t'];?>"<?php } ?> alt="<?php echo $v['img_title'];?>">
            </li>
            <li class="phone     <?php if($v['height_m']){ ?>height<?php } ?>">
              <img data-src="    <?php if(!$v[height_m]){ ?><?php echo $v['img_path'];?><?php }else{ ?><?php echo thumb($v['img_path'],0,$v[height_m]);?><?php } ?>"     <?php if($v['height_m']){ ?>height="<?php echo $v['height_m'];?>"<?php } ?> alt="<?php echo $v['img_title'];?>">
            </li>
            <?php } ?>
          </ul>
            <?php if($v[img_link]){ ?>
        </a>
        <?php } ?> 
      </div>
      <?php endforeach;?>
    </div>
        <?php if($v[_index]){ ?>
    <div class="banner-pagination"></div>
    <div class="banner-controls left"><i class="icon wb-chevron-left"></i></div>
    <div class="banner-controls right"><i class="icon wb-chevron-right"></i></div>
    <?php } ?>
  </div>
</section>
<?php } ?>


        <?php
            $id = 38;
            $style = "met_m1156_6";
            if(!isset($ui_compile)){
                load::sys_class('view/ui_compile');
                $ui_compile = new ui_compile();
            }
            $ui = $ui_compile->list_local_config($id);
            $ui['has'] =$ui_compile->list_page_config($met_page);
            ?>
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
        $m['urlnew'] = $m['nofollow'] ? $m['urlnew']." rel='nofollow'" :$m['urlnew'];
        $m['_first']=$index==0 ? true:false;
        $m['_last']=$index==(count($result)-1)?true:false;
        $$m = $m;
?><?php endforeach;?>
    <?php if($data[classnow]==10001||!$ui[bgcolumn]||strstr('|'.strip_tags($ui[bgcolumn]).'|','|'.strip_tags($m[name]).'|')){ ?>
<section class="column_list_met_m1156_6" m-id="<?php echo $ui['mid'];?>" data-title="<?php echo $ui['bgtitle'];?>" 
      <?php if($ui[bgimg]&&!strstr($ui[bgimg],$c[met_agents_img])){ ?>data-background="<?php echo $ui['bgimg'];?>"<?php } ?>>
  <div class="container">
    <div class="column-box">
      <ul class="blocks-lg-<?php echo $ui['blockslg'];?> blocks-sm-<?php echo $ui['blockssm'];?> blocks-xs-<?php echo $ui['blocksxs'];?> blocks-100 met-grid" id="met-grid">
        <?php
    $type=strtolower(trim('son'));
    $cid=$ui[id];
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
            <?php if($m[_index]<$ui[number]){ ?>
        <li class="shown">
          <a href="<?php echo $m['url'];?>" title="<?php echo $m['name'];?>" <?php echo $m['urlnew'];?>>
                <?php if($ui[type]){ ?>
            <img class="imgloading" data-original="<?php echo $m['columnimg'];?>" alt="<?php echo $m['name'];?>">
            <?php }else{ ?>
            <i class="<?php echo $m['icon'];?>"></i>
            <?php } ?>
            <h3><?php echo $m['name'];?></h3>
                <?php if($ui[textok]<>0){ ?>
            <p     <?php if($ui[textok]==-1){ ?>class="m"<?php } ?>><?php echo str_replace("\n",'<br>',$m['description']);?></p>
            <?php } ?>
          </a>
        </li>
        <?php } ?>
        <?php endforeach;?>
      </ul>
    </div>
  </div>
</section>
<?php }else if($_GET[pageset]){ ?>
<section class="column_list_met_m1156_6 not-slide" m-id="<?php echo $ui['mid'];?>" m-type="nocontent" 
  style="background:#263238;max-height:40px;text-align:center;color:#fff;line-height:40px;display:block;border-bottom:1px solid #888;">
  该栏目设置了限制显示，可在“区块显示的栏目”中添加显示（该文字仅“可视化”模式下可见）
</section>
<?php } ?>

        <?php
            $id = 39;
            $style = "met_m1156_6";
            if(!isset($ui_compile)){
                load::sys_class('view/ui_compile');
                $ui_compile = new ui_compile();
            }
            $ui = $ui_compile->list_local_config($id);
            $ui['has'] =$ui_compile->list_page_config($met_page);
            ?>
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
        $m['urlnew'] = $m['nofollow'] ? $m['urlnew']." rel='nofollow'" :$m['urlnew'];
        $m['_first']=$index==0 ? true:false;
        $m['_last']=$index==(count($result)-1)?true:false;
        $$m = $m;
?><?php endforeach;?>
    <?php if($data[classnow]==10001||!$ui[bgcolumn]||strstr('|'.strip_tags($ui[bgcolumn]).'|','|'.strip_tags($m[name]).'|')){ ?>
<section class="about_list_met_m1156_6 lazy <?php echo $ui['bgfull'];?>" m-id="<?php echo $ui['mid'];?>" data-title="<?php echo $ui['bgtitle'];?>" 
      <?php if($ui[bgimg] && !strstr($ui[bgimg],$c[met_agents_img])){ ?>data-background="<?php echo $ui['bgimg'];?>"<?php } ?>>
  <div class="only-box">
    <div class="only-img"><span data-original="<?php echo $ui['aboutimg'];?>"></span>    <?php if($_GET[pageset]){ ?><img src="<?php echo $ui['aboutimg'];?>" /><?php } ?></div>
    <div class="only-cut">
        <h2 class="h2"><?php echo $ui['abouttitle'];?></h2>
        <?php echo $ui['abouttext'];?>
            <?php if($ui[aboutmoreok]){ ?>
        <a class="only-button" href="<?php echo $ui['aboutmorelink'];?>" title="<?php echo $ui['abouttitle'];?>"><?php echo $ui['aboutmorework'];?></a>
        <?php } ?>
    </div> 
  </div>
</section>
<?php }else if($_GET[pageset]){ ?>
<section class="about_list_met_m1156_6" m-id="<?php echo $ui['mid'];?>" m-type="nocontent" 
  style="background:#263238;max-height:40px;text-align:center;color:#fff;line-height:40px;display:block;border-bottom:1px solid #888;">
  该栏目设置了限制显示，可在“区块显示的栏目”中添加显示（该文字仅“可视化”模式下可见）
</section>
<?php } ?>

        <?php
            $id = 40;
            $style = "met_m1156_6";
            if(!isset($ui_compile)){
                load::sys_class('view/ui_compile');
                $ui_compile = new ui_compile();
            }
            $ui = $ui_compile->list_local_config($id);
            $ui['has'] =$ui_compile->list_page_config($met_page);
            ?>
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
        $m['urlnew'] = $m['nofollow'] ? $m['urlnew']." rel='nofollow'" :$m['urlnew'];
        $m['_first']=$index==0 ? true:false;
        $m['_last']=$index==(count($result)-1)?true:false;
        $$m = $m;
?><?php endforeach;?>
    <?php if($data[classnow]==10001||!$ui[bgcolumn]||strstr('|'.strip_tags($ui[bgcolumn]).'|','|'.strip_tags($m[name]).'|')){ ?>
<section class="show_list_met_m1156_6 lazy <?php echo $ui['bgfull'];?>" m-id="<?php echo $ui['mid'];?>" data-title="<?php echo $ui['bgtitle'];?>" 
      <?php if($ui[bgimg] && !strstr($ui[bgimg],$c[met_agents_img])){ ?>data-background="<?php echo $ui['bgimg'];?>"<?php } ?>>

  <div class="multi-box">
    <div class="multi-cut">
      <h2 class="h2"><?php echo $ui['abouttitle'];?></h2> 
      <?php echo $ui['abouttext'];?>
          <?php if($ui[aboutmoreok]){ ?>
      <a class="multi-button" href="<?php echo $ui['aboutmorelink'];?>" title="<?php echo $ui['abouttitle'];?>"><?php echo $ui['aboutmorework'];?></a>
      <?php } ?>
    </div>
    <div class="multi-move     <?php if(!$ui[imagetype]){ ?>multi-fixed<?php } ?> ">
      <div class="multi-left"><i class="wb-chevron-left"></i></div>
      <div class="multi-right"><i class="wb-chevron-right"></i></div>
      <?php
    $cid=$ui[imgcolumn];

    $num = $ui[imgnumber];
    $module = "";
    $type = $ui[imgtype];
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
      
          <?php if($v[_first]){ ?>
      
          <?php if($ui[imagetype]){ ?>
      <img src="<?php echo thumb($v['imgurl'],$ui[imgwidth],$ui[imgheight]);?>" style="width:100%; opacity:0; position:relative; z-index:1;" alt="<?php echo $v['title'];?>">
      <?php } ?>
      <div class="multi-wrapper">
      
      <?php } ?>
      
        <div class="multi-slide">
              <?php if($ui[imglinkok]){ ?>
          <a title="<?php echo $v['title'];?>" href="<?php echo $v['url'];?>" <?php echo $g['urlnew'];?>>
          <?php } ?>
          
          
          
            
            
            <span class="multi-lazy" data-background="<?php echo $v['imgurl'];?>"></span>
            
              <?php if($ui[imglinkok]){ ?>
          </a>
          <?php } ?>
        </div>
        
        
          <?php if($v[_last]){ ?>
      </div>
      <?php } ?>
      <?php endforeach;?>
      
      
    </div>
  </div>
  
</section>
<?php }else if($_GET[pageset]){ ?>
<section class="show_list_met_m1156_6" m-id="<?php echo $ui['mid'];?>" m-type="nocontent" 
  style="background:#263238;max-height:40px;text-align:center;color:#fff;line-height:40px;display:block;border-bottom:1px solid #888;">
  该栏目设置了限制显示，可在“区块显示的栏目”中添加显示（该文字仅“可视化”模式下可见）
</section>
<?php } ?>

        <?php
            $id = 41;
            $style = "met_m1156_6";
            if(!isset($ui_compile)){
                load::sys_class('view/ui_compile');
                $ui_compile = new ui_compile();
            }
            $ui = $ui_compile->list_local_config($id);
            $ui['has'] =$ui_compile->list_page_config($met_page);
            ?>
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
        $m['urlnew'] = $m['nofollow'] ? $m['urlnew']." rel='nofollow'" :$m['urlnew'];
        $m['_first']=$index==0 ? true:false;
        $m['_last']=$index==(count($result)-1)?true:false;
        $$m = $m;
?><?php endforeach;?>
    <?php if($data[classnow]==10001||!$ui[bgcolumn]||strstr('|'.strip_tags($ui[bgcolumn]).'|','|'.strip_tags($m[name]).'|')){ ?>
<section class="img_list_met_m1156_6 lazy <?php echo $ui['bgfull'];?>" m-id="<?php echo $ui['mid'];?>" data-title="<?php echo $ui['bgtitle'];?>" 
      <?php if($ui[bgimg] && !strstr($ui[bgimg],$c[met_agents_img])){ ?>data-background="<?php echo $ui['bgimg'];?>"<?php } ?>>
  <div class="case-box">
    <h2 class="h2"><?php echo $ui['title'];?></h2> 
    <span></span>
    <div class="case-container">
      <div class="case-left"><i class="wb-chevron-left"></i></div>
      <div class="case-right"><i class="wb-chevron-right"></i></div>
      <div class="case-wrapper">
        <?php
    $cid=$ui[imgcolumn];

    $num = $ui[imgnumber];
    $module = "";
    $type = $ui[imgtype];
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
        <div class="case-slide">
          <a title="<?php echo $v['title'];?>" 
                <?php if($ui[type]){ ?>
            class="met-img-showbtn" data-imglist="        <?php
            $sub = count($v[displayimgs]);
            $num = 30;
            if(!is_array($v[displayimgs])){
                $v[displayimgs] = explode('|',$v[displayimgs]);
            }
            foreach ($v[displayimgs] as $index => $val) {
                if($index >= $num){
                    break;
                }
                if($sub <=0){
                    continue;
                }
                if(is_array($val)){
                    $val['_index'] = $index;
                    $val['_first'] = $index == 0 ? true : false;
                    $val['_last']  = $index == (count($v[displayimgs])-1) ? true : false;
                    $val['sub']    = $sub;
                }

                $val = $val;
            ?><?php echo $val['title'];?>*-=<?php echo $val['img'];?>+|-<?php }?>"
            <?php }else{ ?>
            href="<?php echo $v['url'];?>" <?php echo $g['urlnew'];?>
            <?php } ?>
            > 
            <p>
              <span><?php echo $v['title'];?></span>
              <font><?php echo $ui['looktext'];?></font>
            </p>
            <img class="case-lazy" data-src="<?php echo thumb($v['imgurl'],$ui[width],$ui[height]);?>" title="<?php echo $v['title'];?>" alt="<?php echo $v['title'];?>">
          </a>
        </div>
        <?php endforeach;?>
      </div>
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
        $m['urlnew'] = $m['nofollow'] ? $m['urlnew']." rel='nofollow'" :$m['urlnew'];
        $m['_first']=$index==0 ? true:false;
        $m['_last']=$index==(count($result)-1)?true:false;
        $$m = $m;
?><?php endforeach;?>
    <a class="case-button" href="<?php echo $m['url'];?>" title="<?php echo $ui['title'];?>" <?php echo $m['urlnew'];?>><?php echo $ui['morework'];?></a>
    <?php } ?>
  </div>
</section>
<?php }else if($_GET[pageset]){ ?>
<section class="img_list_met_m1156_6" m-id="<?php echo $ui['mid'];?>" m-type="nocontent" 
  style="background:#263238;max-height:40px;text-align:center;color:#fff;line-height:40px;display:block;border-bottom:1px solid #888;">
  该栏目设置了限制显示，可在“区块显示的栏目”中添加显示（该文字仅“可视化”模式下可见）
</section>
<?php } ?>

        <?php
            $id = 42;
            $style = "met_m1156_6";
            if(!isset($ui_compile)){
                load::sys_class('view/ui_compile');
                $ui_compile = new ui_compile();
            }
            $ui = $ui_compile->list_local_config($id);
            $ui['has'] =$ui_compile->list_page_config($met_page);
            ?>
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
        $m['urlnew'] = $m['nofollow'] ? $m['urlnew']." rel='nofollow'" :$m['urlnew'];
        $m['_first']=$index==0 ? true:false;
        $m['_last']=$index==(count($result)-1)?true:false;
        $$m = $m;
?><?php endforeach;?>
    <?php if($data[classnow]==10001||!$ui[bgcolumn]||strstr('|'.strip_tags($ui[bgcolumn]).'|','|'.strip_tags($m[name]).'|')){ ?>
<section class="video_list_met_m1156_6 lazy <?php echo $ui['bgfull'];?>" m-id="<?php echo $ui['mid'];?>" data-title="<?php echo $ui['bgtitle'];?>" 
      <?php if($ui[bgimg] && !strstr($ui[bgimg],$c[met_agents_img])){ ?>data-background="<?php echo $ui['bgimg'];?>"<?php } ?>>
  <div class="case-box">
    <h2 class="h2"><?php echo $ui['title'];?></h2> 
    <span></span>
    <div class="prices-video container">
      <div class="video-content">
        <span>
          <p><i class="fa-play"></i></p> 
        </span>
        <video src="<?php echo str_replace('<m','?<m',$ui['video']);?>" poster="<?php echo $ui['image'];?>" data-play="<?php echo $ui['type'];?>"></video>
      </div>
      <?php echo $ui['description'];?>
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
        $m['urlnew'] = $m['nofollow'] ? $m['urlnew']." rel='nofollow'" :$m['urlnew'];
        $m['_first']=$index==0 ? true:false;
        $m['_last']=$index==(count($result)-1)?true:false;
        $$m = $m;
?><?php endforeach;?>
    <a class="case-button" href="<?php echo $m['url'];?>" title="<?php echo $ui['title'];?>" <?php echo $m['urlnew'];?>><?php echo $ui['morework'];?></a>
    <?php } ?>
  </div>
</section>
<?php }else if($_GET[pageset]){ ?>
<section class="video_list_met_m1156_6" m-id="<?php echo $ui['mid'];?>" m-type="nocontent" 
  style="background:#263238;max-height:40px;text-align:center;color:#fff;line-height:40px;display:block;border-bottom:1px solid #888;">
  该栏目设置了限制显示，可在“区块显示的栏目”中添加显示（该文字仅“可视化”模式下可见）
</section>
<?php } ?>

        <?php
            $id = 43;
            $style = "met_m1156_6";
            if(!isset($ui_compile)){
                load::sys_class('view/ui_compile');
                $ui_compile = new ui_compile();
            }
            $ui = $ui_compile->list_local_config($id);
            $ui['has'] =$ui_compile->list_page_config($met_page);
            ?>
<head>
    <meta charset="utf-8">
    <title>layui</title>
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="stylesheet" href="/templates/m1156ui009/static/css/layui.css" media="all">
</head>
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
        $m['urlnew'] = $m['nofollow'] ? $m['urlnew']." rel='nofollow'" :$m['urlnew'];
        $m['_first']=$index==0 ? true:false;
        $m['_last']=$index==(count($result)-1)?true:false;
        $$m = $m;
?><?php endforeach;?>
    <?php if($data[classnow]==10001||!$ui[bgcolumn]||strstr('|'.strip_tags($ui[bgcolumn]).'|','|'.strip_tags($m[name]).'|')){ ?>
    <section class="news_list_met_m1156_6 lazy <?php echo $ui['bgfull'];?>" m-id="<?php echo $ui['mid'];?>" data-title="<?php echo $ui['bgtitle'];?>"
        <?php if($ui[bgimg] && !strstr($ui[bgimg],$c[met_agents_img])){ ?>data-background="<?php echo $ui['bgimg'];?>"<?php } ?>
    >
    <div class="news-box">
        <h2 class="h2"><?php echo $ui['title'];?></h2>
        <span></span>
        <div class="info-list container">
            <table>
                <tr>
                    <td>
                        <div class="layui-carousel" id="test10">
                            <div carousel-item>
                                <div><img src="http://localhost/upload/201607/1468307527675297.jpg"></div>
                                <div><img src="http://localhost/upload/201607/1468308011101580.png"></div>
                                <div><img src="http://localhost/upload/201607/1468307527675297.jpg"></div>
                                <div><img src="http://localhost/upload/201607/1468312144140292.jpg"></div>
                            </div>
                        </div>
                    </td>
                </tr>
            </table>
        </div>
        <script src="/templates/m1156ui009/static/layui.js" charset="utf-8"></script>
        <script>
            layui.use(['carousel', 'form'], function () {
                var carousel = layui.carousel
                    , form = layui.form;

                //图片轮播
                carousel.render({
                    elem: '#test10'
                    , width: '550px'
                    , height: '300px'
                    , interval: 5000
                });

                //事件
                carousel.on('change(test4)', function (res) {
                    console.log(res)
                });

                var $ = layui.$, active = {
                    set: function (othis) {
                        var THIS = 'layui-bg-normal'
                            , key = othis.data('key')
                            , options = {};

                        othis.css('background-color', '#5FB878').siblings().removeAttr('style');
                        options[key] = othis.data('value');
                        ins3.reload(options);
                    }
                };

                //监听开关
                form.on('switch(autoplay)', function () {
                    ins3.reload({
                        autoplay: this.checked
                    });
                });

                $('.demoSet').on('keyup', function () {
                    var value = this.value
                        , options = {};
                    if (!/^\d+$/.test(value)) return;

                    options[this.name] = value;
                    ins3.reload(options);
                });

                //其它示例
                $('.demoTest .layui-btn').on('click', function () {
                    var othis = $(this), type = othis.data('type');
                    active[type] ? active[type].call(this, othis) : '';
                });
            });
        </script>
        <!--<ul class="blocks-100 blocks-sm-2 blocks-lg-4">
          <?php
    $cid=$ui[column];

    $num = $ui[number];
    $module = "";
    $type = $ui[type];
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
                if($sub <=0){
                    continue;
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
        </ul>-->
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
        $m['urlnew'] = $m['nofollow'] ? $m['urlnew']." rel='nofollow'" :$m['urlnew'];
        $m['_first']=$index==0 ? true:false;
        $m['_last']=$index==(count($result)-1)?true:false;
        $$m = $m;
?><?php endforeach;?>
            <a class="news-button" href="<?php echo $m['url'];?>" title="<?php echo $ui['title'];?>" <?php echo $m['urlnew'];?>><?php echo $ui['morework'];?></a>
        <?php } ?>
    </div>
    </section>
    <?php }else if($_GET[pageset]){ ?>
    <section class="news_list_met_m1156_6" m-id="<?php echo $ui['mid'];?>" m-type="nocontent"
             style="background:#263238;max-height:40px;text-align:center;color:#fff;line-height:40px;display:block;border-bottom:1px solid #888;">
        该栏目设置了限制显示，可在“区块显示的栏目”中添加显示（该文字仅“可视化”模式下可见）
    </section>
<?php } ?>
<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "oy_ds";
// 创建连接
$conn = new mysqli($servername, $username, $password, $dbname);
// 检测连接
if ($conn->connect_error) {
    die("连接失败: " . $conn->connect_error);
}
$sql_nav = "select * from oyds_admin_nav";
$sql_title = "select name from oyds_column where id=177";
$rsNav = $conn->query($sql_nav);
$rsTitle = $conn->query($sql_title);
while ($rowTitle = $rsTitle->fetch_assoc()) {
    $titleName = $rowTitle['name'];
}
$conn->close();
?>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="../../app/system/include/public/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="../../app/system/include/public/bootstrap/css/font-awesome.min.css" rel="stylesheet">
<link href="../../app/system/include/public/bootstrap/css/font-awesome-animation.min.css" rel="stylesheet">
<script src="https://cdn.bootcss.com/jquery/1.12.4/jquery.min.js"></script>
<script src="../../app/system/include/public/bootstrap/js/bootstrap.min.js"></script>
<style type="text/css">
#shotcut {
	color:#999;
	width:100%;
	margin:auto;
	padding-bottom:10px;
	margin-top:30px;
	text-align:center;
	background-color:#F3F3F3;
}

#shotcut .divheight {
	height:8em;
}
#shotcut img {
	width:48px;
	height:48px;
}
#shotcut h2,h3 {
	color:#000;
}
#shotcut a:link,#shotcut a:visited {
	color:#699;
}
</style>

<div class="container" id="shotcut" m-id="{shotcut}" data-title="<?php echo $ui['bgtitle'];?>">
	<div class="row  ">
    	<h2><?php echo $titleName?></h2>
        <h3 >____</h3>
        <br />
    </div>
<!--    <li class='nav-item m-l-<?php echo $lang['nav_ml'];?>'>
        <a href="<?php echo $m['url'];?>" <?php echo $m['urlnew'];?> title="<?php echo $m['name'];?>" class="nav-link <?php echo $m['class'];?>"><?php echo $m['name'];?>
        </a>
    </li>-->
	<div class="row  ">
        <?php
        while ($rowNav = $rsNav->fetch_assoc()) {
            ?>
            <div class="col-md-1 col-sm-3 col-xs-6 divheight"><a href="<?php echo $rowNav['nav_url']?>"><i class=" <?php echo $rowNav['nav_icon'] ?> faa-slow faa-shake animated-hover fa-3x"></i></a><br /><a href="<?php echo $rowNav['nav_url']?>"><?php echo $rowNav['nav_title']?></a></div>
            <!-- <div class="col-md-1 col-sm-3 col-xs-6 divheight"><a href="#"><i class=" fa-calendar faa-slow faa-shake animated-hover fa-3x"></i></a><br /><a href="#">课程中心</a></div>
             <div class="col-md-1 col-sm-3 col-xs-6 divheight"><a href="#"><i class=" fa-group faa-slow faa-shake animated-hover fa-3x"></i></a><br /><a href="#">服务团队</a></div>
             <div class="col-md-1 col-sm-3 col-xs-6 divheight"><a href="#"><i class=" fa-barcode faa-slow faa-shake animated-hover fa-3x"></i></a><br /><a href="#">营销优惠</a></div>
             <div class="col-md-1 col-sm-3 col-xs-6 divheight"><a href="#"><i class=" fa-plus-square faa-slow faa-shake animated-hover fa-3x"></i></a><br /><a href="#">体检医院</a></div>
             <div class="col-md-1 col-sm-3 col-xs-6 divheight"><a href="#"><i class=" fa-compass faa-slow faa-shake animated-hover fa-3x"></i></a><br /><a href="#">办事指南</a></div>
             <div class="col-md-1 col-sm-3 col-xs-6 divheight"><a href="#"><i class=" fa-cogs faa-slow faa-shake animated-hover fa-3x"></i></a><br /><a href="#">后勤服务</a></div>
             <div class="col-md-1 col-sm-3 col-xs-6 divheight"><a href="#"><i class=" fa-building-o faa-slow faa-shake animated-hover fa-3x"></i></a><br /><a href="#">网上看校</a></div>
             <div class="col-md-1 col-sm-3 col-xs-6 divheight"><a href="#"><i class=" fa-edit faa-slow faa-shake animated-hover fa-3x"></i></a><br /><a href="#">考试预约</a></div>
             <div class="col-md-1 col-sm-3 col-xs-6 divheight"><a href="#"><i class=" fa-list-alt faa-slow faa-shake animated-hover fa-3x"></i></a><br /><a href="#">调查问卷</a></div>
             <div class="col-md-1 col-sm-3 col-xs-6 divheight"><a href="#"><i class=" fa-road faa-slow faa-shake animated-hover fa-3x"></i></a><br /><a href="#">乘车路线</a></div>
             <div class="col-md-1 col-sm-3 col-xs-6 divheight"><a href="#"><i class=" fa-map-marker faa-slow faa-shake animated-hover fa-3x"></i></a><br /><a href="#">驾校位置</a></div>
             <div class="col-md-1 col-sm-3 col-xs-6 divheight"><a href="#"><i class=" fa-phone faa-slow faa-shake animated-hover fa-3x"></i></a><br /><a href="#">联系我们</a></div>-->
            <?php
        }
        ?>
    </div>
    
</div>

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
        $m['urlnew'] = $m['nofollow'] ? $m['urlnew']." rel='nofollow'" :$m['urlnew'];
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
        $v['nofollow'] = $v['nofollow'] ? "rel='nofollow'" : '';
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

<?php if($lang_json_file_ok){ ?>
<input type="hidden" name="met_lazyloadbg" value="<?php echo $g['lazyloadbg'];?>">
<?php if($c["shopv2_open"]){ ?>
<script>
var jsonurl="<?php echo $url['shop_cart_jsonlist'];?>",
    totalurl="<?php echo $url['shop_cart_modify'];?>",
    delurl="<?php echo $url['shop_cart_del'];?>",
    price_prefix="<?php echo $c['shopv2_price_str_prefix'];?>",
    price_suffix="<?php echo $c['shopv2_price_str_suffix'];?>";
</script>
<?php
    }
}
$basic_js_name=$metinfover_v2?"":"_web";
?>
<script src="<?php echo $c['met_weburl'];?>public/ui/v2/static/js/basic<?php echo $basic_js_name;?>.js?<?php echo $met_file_version;?>"></script>
<?php
if($lang_json_file_ok){
    if($metinfover_v2){
        if(file_exists(PATH_TEM."cache/common.js")){
            $common_js_time = filemtime(PATH_TEM."cache/common.js");
            $metpagejs="common.js?".$common_js_time;
        }
        if($met_page){
            $page_js_time = filemtime(PATH_TEM."cache/".$met_page."_".$_M["lang"].".js");
            $metpagejs=$met_page."_".$_M["lang"].".js?".$page_js_time;
        }
?>
<script>
var metpagejs="<?php echo $c['met_weburl'];?>templates/<?php echo $c['met_skin_user'];?>/cache/<?php echo $metpagejs;?>";
if(typeof jQuery != "undefined"){
    metPageJs(metpagejs);
}else{
    var metPageInterval=setInterval(function(){
        if(typeof jQuery != "undefined"){
            metPageJs(metpagejs);
            clearInterval(metPageInterval);
        }
    },50)
}
</script>
<?php
    }
    $met_lang_time = filemtime(PATH_WEB."cache/lang_json_".$data["lang"].".js");
?>
<script src="<?php echo $c['met_weburl'];?>cache/lang_json_<?php echo $data['lang'];?>.js?<?php echo $met_lang_time;?>"></script>
<?php
    if($c["shopv2_open"]){
?>
<script src="<?php echo $c['met_weburl'];?>app/app/shop/web/templates/met/js/own.js?<?php echo $met_file_version;?>"></script>
<?php
    }
    if(is_mobile() && $c["met_footstat_mobile"]){
?>
<?php echo $c['met_footstat_mobile'];?>

<?php }else if(!is_mobile() && $c["met_footstat"]){?>
<?php echo $c['met_footstat'];?>

<?php
    }
    if($_M["html_plugin"]["foot_script"]){
?>
<?php echo $_M["html_plugin"]["foot_script"];?>

<?php
    }
}
?>
</body>
</html>