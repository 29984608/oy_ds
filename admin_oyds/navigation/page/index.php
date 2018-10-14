<?php
require_once("db.php");
header("Content-type: text/html; charset=utf-8");
$query_title = "select name from oyds_column where id=177";
$query_nav = "select * from oyds_admin_nav";
$query_Count = "select count(*) from oyds_admin_nav";
$rs_title = $conn->query($query_title);
$rs_nav = $conn->query($query_nav);
 while ($row_title = $rs_title->fetch_assoc()) {
     $title = $row_title['name'];
 }
$conn->close();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>layui</title>
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="stylesheet" href="../static/css/layui.css" media="all">
</head>
<body>

<fieldset class="layui-elem-field layui-field-title" style="margin-top: 20px;">

    <legend>编辑<?php echo $title?></legend>
</fieldset>

<fieldset class="layui-elem-field site-demo-button" style="margin-top: 30px;">
    <br/>
    <legend>编辑标题</legend>
    <form class="layui-form" action="update_title.php" method="post">
        <div class="layui-form-item">
            <div class="layui-inline">
                <label class="layui-form-label">标题</label>
                <div class="layui-input-inline">
                        <input type="text" name="nav_title" class="layui-input" value="<?php echo $title ?>">
                </div>
            </div>
            <div class="layui-inline">
                <div class="layui-input-inline">
                    <button class="layui-btn" type="submit">保存</button>
                </div>
            </div>
        </div>
    </form>
</fieldset>


<fieldset class="layui-elem-field site-demo-button" style="margin-top: 30px;">
    <legend>编辑导航</legend>
    <br/>
    <blockquote class="layui-elem-quote">
        <div>
            <button class="layui-btn" id="add_nav" style="margin-left: 20px">添加导航</button>
            <a href="http://www.fontawesome.com.cn/faicons/" target="_blank" style="margin-left: 20px">参照:图标选择</a></div>
    </blockquote>
    <table class="layui-table" lay-size="lg">
        <colgroup>
            <col>
            <col>
            <col>
            <col>
            <col>
        </colgroup>
        <thead>
        <tr>
            <th>标题</th>
            <th>图标</th>
            <th>链接</th>
            <th>操作</th>
        </tr>
        </thead>
        <tbody>
        <?php
        while ($row_nav = $rs_nav->fetch_assoc()) {
            ?>
            <tr>
                <td><?php echo $row_nav['nav_title'] ?></td>
                <td><?php echo $row_nav['nav_icon'] ?></td>
                <td><?php echo $row_nav['nav_url'] ?></td>
                <td>
                    <button class="layui-btn layui-btn-sm layui-icon"
                            onclick="updata_nav(<?php echo $row_nav['nav_id'] ?>)">&#xe642;编辑
                    </button>
                    <button class="layui-btn layui-btn-danger layui-btn-sm layui-icon"
                            onclick="deleteNav(<?php echo $row_nav['nav_id'] ?>)">&#xe640;删除
                    </button>
                </td>
            </tr>
            <?php
        }
        ?>


        </tbody>
    </table>
</fieldset>

<script src="../static/layui.js" charset="utf-8"></script>
<script src="../static/jquery.js"></script>
<script>
    layui.use(['form', 'layedit', 'laydate'], function () {
        var form = layui.form
            , layer = layui.layer
            , layedit = layui.layedit
            , laydate = layui.laydate;
    });
    $(function () {
        $("#add_nav").click(function () {
            layer.open({
                type: 1,
                title: '添加导航',
                area: ['400px', '320px'],
                content: $('#add_navContent')
            });
        });
    });

    function updata_nav(id) {
        $.ajax({
            type: 'post',
            url: 'queryInfo.php',
            data: {id: id},
            dataType: 'json',
            success: function (msg) {
                $("input[name='upd_navId']").val(msg[0]['nav_id']);
                $("input[name='upd_navTitle']").val(msg[0]['nav_title']);
                $("input[name='upd_navIcon']").val(msg[0]['nav_icon']);
                $("input[name='upd_navUrl']").val(msg[0]['nav_url']);
                layer.open({
                    type: 1,
                    title: "编辑导航",
                    area: ['400px', '400px'],
                    content: $('#upd_navContent')
                })
            }
        })
    }

    function deleteNav(id) {
        layer.confirm("是否删除？", {icon: 3, title: '删除'}, function (index) {
            $.ajax({
                type: "post",
                url: "deleteNav.php",
                data: {id: id},
                dataType: 'text',
                success: function (data) {
                    if (data === "ok") {
                        layer.msg('删除成功', {icon: 6, time: 500}, function () {
                            location.reload();
                        });
                    } else {
                        layer.msg('删除失败', {icon: 7, time: 500}, function () {
                        });
                    }
                },
                error: function () {
                    layer.msg('删除失败', {icon: 7, time: 500}, function () {
                    });
                }
            });

            layer.close(index);
        })
    }
</script>
</body>

<div id="add_navContent" style="display: none">
    <form class="layui-form" action="insert_nav.php" method="post">
        <div style="width: 20px;"></div>
        <br/><br/>
        <div class="layui-form-item">
            <label class="layui-form-label">标题</label>
            <div class="layui-input-inline">
                <input name="add_navTitle" class="layui-input" type="text">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">图标</label>
            <div class="layui-input-inline">
                <input name="add_navIcon" class="layui-input" type="text">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">链接</label>
            <div class="layui-input-inline">
                <input name="add_navUrl" class="layui-input" type="text">
            </div>
        </div>
        <div style="width: 20px;"></div>
        <div class="layui-input-block huan_center">
            <button id="add_navSub" class="layui-btn" type="submit">立即提交</button>
            <button  class="layui-btn layui-btn-primary">退出</button>
        </div>
    </form>
</div>

<div id="upd_navContent" style="display: none">
    <form class="layui-form" action="update_nav.php" method="post">
        <div style="width: 20px;"></div>
        <br/><br/><br/>
        <div class="layui-form-item">
            <label class="layui-form-label">ID</label>
            <div class="layui-input-inline">
                <input name="upd_navId" class="layui-input" type="text" readonly>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">标题</label>
            <div class="layui-input-inline">
                <input name="upd_navTitle" class="layui-input" type="text">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">图标</label>
            <div class="layui-input-inline">
                <input name="upd_navIcon" class="layui-input" type="text">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">链接</label>
            <div class="layui-input-inline">
                <input name="upd_navUrl" class="layui-input" type="text">
            </div>
        </div>
        <div style="width: 20px;"></div>
        <div class="layui-input-block huan_center">
            <button id="upd_navSub" class="layui-btn" type="submit">立即提交</button>
            <button class="layui-btn layui-btn-primary">退出</button>
        </div>
    </form>
</div>
</html>