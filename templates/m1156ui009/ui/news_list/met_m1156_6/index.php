<?php defined('IN_MET') or exit('No permission'); ?>
<?php
header("Content-type: text/html; charset=utf-8");
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
$sql_news_img = "select * from oyds_news limit 7";
$sql_news_title = "select * from oyds_news limit 7";
$rs_img = $conn->query($sql_news_img);
$rs_title = $conn->query($sql_news_title);
?>
<head>
    <meta charset="utf-8">
    <title>layui</title>
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="stylesheet" href="/templates/m1156ui009/static/css/layui.css" media="all">
    <link href="/templates/m1156ui009/bootstrap/css/bootstrap.css" rel="stylesheet">
</head>
<style type="text/css">
    .layui-elem-quote a {
        color: #0C0C0C;
    }

    .layui-elem-quote a:hover {
        color: #9EAA99;
    }

    .layui-elem-quote li {
        list-style-image: url('/templates/m1156ui009/ui/news_list/met_m1156_6/spot.png');
    }

    .layui-elem-quote span {
        font-size: 15px;
        margin-top: 0px;
    }
</style>
<tag action="category" type="current" cid="$data[classnow]"></tag>
<if value="$data[classnow] eq 10001||!$ui[bgcolumn]||strstr('|'.strip_tags($ui[bgcolumn]).'|','|'.strip_tags($m[name]).'|')">
    <section class="$uicss lazy {$ui.bgfull}" m-id="{$ui.mid}" data-title="{$ui.bgtitle}"
    <if value='$ui[bgimg] && !strstr($ui[bgimg],$c[met_agents_img])'>data-background="{$ui.bgimg}"</if>
    >
    <script src="/templates/m1156ui009/static/jquery.js"></script>
    <script src="/templates/m1156ui009/bootstrap/js/bootstrap.js"></script>
    <div class="news-box">
        <h2 style="text-align: center">{$ui.title}</h2>
        <table width="100%">
            <tr>
                <td style="border-bottom:2px solid  #0C0C0C;width: 42px;height: 30px;display:block;margin:0 auto"></td>
            </tr>
        </table>
        <div class="info-list container table-responsive" style="padding-top: 20px">
            <table class="table">
                <tr>
                    <td class="hidden-xs" style="border: 0px;width: 550px">
                        <div class="layui-carousel" id="test10">
                            <div carousel-item>
                                <?php
                                if ($rs_img->num_rows > 0) {
                                    while ($row_img = $rs_img->fetch_assoc()) { ?>
                                        <div><a href="/news/shownews.php?id=<?php echo $row_img['id'] ?>"><img src="<?php echo $row_img['imgurl'] ?>"></a></div>
                                    <?php }
                                } ?>
                            </div>
                        </div>
                    </td>
                    <td style="border: none">
                        <div class="layui-elem-quote" style="font-size: 17px;padding-top: 0px;">
                            <ul>
                                <?php if ($rs_title->num_rows > 0) {
                                    while ($row_title = $rs_title->fetch_assoc()) {
                                        ?>
                                        <span><?php $time= explode(' ',$row_title['updatetime'])  ;echo $time[0]  ?></span><br>
                                        <li><a href="/news/shownews.php?id=<?php echo $row_title['id']?>"><?php echo $row_title['title']?></a></li>
                                    <?php }
                                } ?>
                            </ul>
                        </div>
                    </td>
                </tr>
            </table>
        </div>
        <div style="width: 100%">
            <a href="/news">
                <button class="layui-btn layui-btn-primary layui-btn-lg" style="display:block;margin:0 auto">
                    {$ui.morework}
                </button>
            </a>
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
                    , height: '325px'
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
    </div>
    </section>
    <elseif value="$_GET[pageset]"/>
    <section class="$uicss" m-id="{$ui.mid}" m-type="nocontent"
             style="background:#263238;max-height:40px;text-align:center;color:#fff;line-height:40px;display:block;border-bottom:1px solid #888;">
        该栏目设置了限制显示，可在“区块显示的栏目”中添加显示（该文字仅“可视化”模式下可见）
    </section>
</if>