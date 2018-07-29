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
$sql = "select * from oyds_admin_nav";
$rs = $conn->query($sql);
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

<div class="container" id="shotcut" m-id="{shotcut}" data-title="{$ui.bgtitle}">
	<div class="row  ">
    	<h2>快捷导航</h2>
        <h3 >____</h3>
        <br />
    </div>
    <li class='nav-item m-l-{$lang.nav_ml}'>
        <a href="{$m.url}" {$m.urlnew} title="{$m.name}" class="nav-link {$m.class}">{$m.name}
        </a>
    </li>
	<div class="row  ">
        <?php
        while ($row = $rs->fetch_assoc()) {
            ?>
            <div class="col-md-1 col-sm-3 col-xs-6 divheight"><a href="#"><i class=" <?php echo $row['nav_icon'] ?> faa-slow faa-shake animated-hover fa-3x"></i></a><br /><a href="<?php echo $row['nav_url']?>"><?php echo $row['nav_title']?></a></div>
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