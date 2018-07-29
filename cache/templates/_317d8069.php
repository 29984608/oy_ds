
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
