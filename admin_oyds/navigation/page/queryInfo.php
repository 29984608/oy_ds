<?php
header("Content-type: text/html; charset=utf-8");
require_once ("db.php");
$nav_id=$_POST['id'];
$sql = "select * from oyds_admin_nav where nav_id = $nav_id";
$rs = $conn->query($sql);
$arr = array();
class DataDom{
    public $nav_id;
    public $nav_title;
    public $nav_icon;
    public $nav_url;
}
while($row = $rs->fetch_assoc()){
    $datadom = new DataDom();
    $datadom->nav_id = urlencode($row['nav_id']);
    $datadom->nav_title = urlencode($row['nav_title']);
    $datadom->nav_icon = urlencode($row['nav_icon']);
    $datadom->nav_url = urlencode($row['nav_url']);
    $arr[]=$datadom;
}
echo  urldecode(json_encode($arr));
$conn->close();
