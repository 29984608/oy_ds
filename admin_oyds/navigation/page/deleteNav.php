<?php
header("Content-type: text/html; charset=utf-8");
require_once ("db.php");
$nav_id=$_POST['id'];
$del_sql="delete from oyds_admin_nav where nav_id=$nav_id";
if ($conn->query($del_sql) === TRUE) {
    echo "ok";
} else {
    echo "no";
}
$conn->close();