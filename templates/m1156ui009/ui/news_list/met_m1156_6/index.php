<?php defined('IN_MET') or exit('No permission'); ?>
<head>
    <meta charset="utf-8">
    <title>layui</title>
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="stylesheet" href="/templates/m1156ui009/static/css/layui.css" media="all">
</head>
<tag action="category" type="current" cid="$data[classnow]"></tag>
<if value="$data[classnow] eq 10001||!$ui[bgcolumn]||strstr('|'.strip_tags($ui[bgcolumn]).'|','|'.strip_tags($m[name]).'|')">
    <section class="$uicss lazy {$ui.bgfull}" m-id="{$ui.mid}" data-title="{$ui.bgtitle}"
    <if value='$ui[bgimg] && !strstr($ui[bgimg],$c[met_agents_img])'>data-background="{$ui.bgimg}"</if>
    >
    <div class="news-box">
        <h2 class="h2">{$ui.title}</h2>
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
          <tag action="list" cid="$ui[column]" type="$ui[type]" num="$ui[number]">
          <li>
            <a href="{$v.url}" title="{$v.title}" {$g.urlnew}>
              <img class="imgloading" data-original="{$v.imgurl|thumb:$ui[width],$ui[height]}" title="{$v.title}" alt="{$v.title}">
            </a>
            <a href="{$v.url}" title="{$v.title}" {$g.urlnew}>
              <strong>{$v.title}</strong>
            </a>
            <font>{$v.updatetime}</font>
            <p>{$v.description|utf8substr:0,$ui[subnum]}</p>
            <if value="$ui[tagok]">
            <span>
            {$ui.tag}
            <list data="$v[tag]" name="$val">
            <if value="$val">
            <a href="search/?searchword={$val}" title="{$val}" {$g.urlnew}>{$val}</a>
            </if>
            </list>
            </span>
            </if>
          </li>
          </tag>
        </ul>-->
        <if value="$ui[moreok]">
            <tag action="category" cid="$ui[imgcolumn]" type="current"></tag>
            <a class="news-button" href="{$m.url}" title="{$ui.title}" {$m.urlnew}>{$ui.morework}</a>
        </if>
    </div>
    </section>
    <elseif value="$_GET[pageset]"/>
    <section class="$uicss" m-id="{$ui.mid}" m-type="nocontent"
             style="background:#263238;max-height:40px;text-align:center;color:#fff;line-height:40px;display:block;border-bottom:1px solid #888;">
        该栏目设置了限制显示，可在“区块显示的栏目”中添加显示（该文字仅“可视化”模式下可见）
    </section>
</if>