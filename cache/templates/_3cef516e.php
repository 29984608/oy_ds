<?php defined('IN_MET') or exit('No permission'); ?>
<header class="$uicss swiper-header     <?php if(!$ui[met_member_register]&&!($c[met_lang_mark]&&$ui[langok])&&!($c[met_ch_lang]&&$ui[fontok]&&$data[lang]=="cn")&&!$ui[searchok]){ ?>not-right<?php } ?>" m-id="<?php echo $ui['mid'];?>" m-type="head_nav" role="heading">
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