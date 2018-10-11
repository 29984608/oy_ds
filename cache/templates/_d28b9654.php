<?php defined('IN_MET') or exit('No permission'); ?>
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
    <section class="$uicss lazy <?php echo $ui['bgfull'];?>" m-id="<?php echo $ui['mid'];?>" data-title="<?php echo $ui['bgtitle'];?>"
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
    <section class="$uicss" m-id="<?php echo $ui['mid'];?>" m-type="nocontent"
             style="background:#263238;max-height:40px;text-align:center;color:#fff;line-height:40px;display:block;border-bottom:1px solid #888;">
        该栏目设置了限制显示，可在“区块显示的栏目”中添加显示（该文字仅“可视化”模式下可见）
    </section>
<?php } ?>