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
    <legend>编辑快捷导航</legend>
</fieldset>

<fieldset class="layui-elem-field site-demo-button" style="margin-top: 30px;">
    <br/>
    <legend>编辑标题</legend>
    <form class="layui-form" action="">
        <div class="layui-form-item">
            <div class="layui-inline">
                <label class="layui-form-label">标题</label>
                <div class="layui-input-inline">
                    <input type="text" name="title" class="layui-input">
                </div>
            </div>
            <div class="layui-inline">
                <div class="layui-input-inline">
                    <button class="layui-btn">保存</button>
                </div>
            </div>
        </div>
    </form>
</fieldset>


<fieldset class="layui-elem-field site-demo-button" style="margin-top: 30px;">
    <legend>编辑导航</legend>
    <br/>
    <blockquote class="layui-elem-quote">
        <div><button class="layui-btn" id="add_nav" style="margin-left: 20px">添加导航</button>
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
            <th>ID</th>
            <th>标题</th>
            <th>图标</th>
            <th>链接</th>
            <th>操作</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>1</td>
            <td>课程中心</td>
            <td>.jpg</td>
            <td>########</td>
            <td>
                <button class="layui-btn layui-btn-sm layui-icon" id="upd_nav">&#xe642;编辑</button>
                <button class="layui-btn layui-btn-danger layui-btn-sm layui-icon">&#xe640;删除</button>
            </td>
        </tr>
        <tr>
            <td>2</td>
            <td>服务团队</td>
            <td>.jpg</td>
            <td>########</td>
            <td>
                <button class="layui-btn layui-btn-sm layui-icon">&#xe642;编辑</button>
                <button class="layui-btn layui-btn-danger layui-btn-sm layui-icon">&#xe640;删除</button>
            </td>
        </tr>
        <tr>
            <td>3</td>
            <td>营销优惠</td>
            <td>.jpg</td>
            <td>########</td>
            <td>
                <button class="layui-btn layui-btn-sm layui-icon">&#xe642;编辑</button>
                <button class="layui-btn layui-btn-danger layui-btn-sm layui-icon">&#xe640;删除</button>
            </td>
        </tr>
        <tr>
            <td>4</td>
            <td>体检医院</td>
            <td>.jpg</td>
            <td>########</td>
            <td>
                <button class="layui-btn layui-btn-sm layui-icon">&#xe642;编辑</button>
                <button class="layui-btn layui-btn-danger layui-btn-sm layui-icon">&#xe640;删除</button>
            </td>
        </tr>
        <tr>
            <td>5</td>
            <td>办事指南</td>
            <td>.jpg</td>
            <td>########</td>
            <td>
                <button class="layui-btn layui-btn-sm layui-icon">&#xe642;编辑</button>
                <button class="layui-btn layui-btn-danger layui-btn-sm layui-icon">&#xe640;删除</button>
            </td>
        </tr>
        <tr>
            <td>6</td>
            <td>后勤服务</td>
            <td>.jpg</td>
            <td>########</td>
            <td>
                <button class="layui-btn layui-btn-sm layui-icon">&#xe642;编辑</button>
                <button class="layui-btn layui-btn-danger layui-btn-sm layui-icon">&#xe640;删除</button>
            </td>
        </tr>

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
        $(function () {
            $("#add_nav").click(function () {
                layer.open({
                    type: 1,
                    title: '添加导航',
                    area: ['400px', '400px'],
                    content: $('#add_navContent')
                });
            });
            $("#upd_nav").click(function () {
                layer.open({
                    type: 1,
                    title: '编辑导航',
                    area: ['400px', '400px'],
                    content: $('#add_navContent')
                });
            });
        });
        //创建一个编辑器
        var editIndex = layedit.build('LAY_demo_editor');

        //自定义验证规则
        form.verify({
            title: function (value) {
                if (value.length < 5) {
                    return '标题至少得5个字符啊';
                }
            }
            , pass: [/(.+){6,12}$/, '密码必须6到12位']
            , content: function (value) {
                layedit.sync(editIndex);
            }
        });
        //监听指定开关
        form.on('switch(switchTest)', function (data) {
            layer.msg('开关checked：' + (this.checked ? 'true' : 'false'), {
                offset: '6px'
            });
            layer.tips('温馨提示：请注意开关状态的文字可以随意定义，而不仅仅是ON|OFF', data.othis)
        });

        //监听提交
        form.on('submit(demo1)', function (data) {
            layer.alert(JSON.stringify(data.field), {
                title: '最终的提交信息'
            })
            return false;
        });
    });
</script>
</body>

<div id="add_navContent" style="display: none">
    <form class="layui-form" action="" method="post">
        <div style="width: 20px;"></div><br/><br/><br/>
        <div class="layui-form-item">
            <label class="layui-form-label">ID</label>
            <div class="layui-input-inline">
                <input name="add_navId" class="layui-input" type="text" readonly>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">标题</label>
            <div class="layui-input-inline">
                <input name="add_navTitle"  class="layui-input" type="text">
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
                <button type="reset" class="layui-btn layui-btn-primary">重置</button>
            </div>
    </form>
</div>

<div id="upd_navContent" style="display: none">
    <form class="layui-form" action="" method="post">
        <div style="width: 20px;"></div><br/><br/><br/>
        <div class="layui-form-item">
            <label class="layui-form-label">ID</label>
            <div class="layui-input-inline">
                <input name="upd_navId" class="layui-input" type="text" readonly>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">标题</label>
            <div class="layui-input-inline">
                <input name="upd_navTitle"  class="layui-input" type="text">
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
            <button type="reset" class="layui-btn layui-btn-primary">重置</button>
        </div>
    </form>
</div>
</html>