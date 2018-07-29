<?php
header("Content-type: text/html; charset=utf-8");
require_once ("db.php");
$upd_navId = $_POST['upd_navId'];
$upd_navTitle = $_POST['upd_navTitle'];
$upd_navIcon = $_POST['upd_navIcon'];
$upd_navUrl = $_POST['upd_navUrl'];
$update_sql = "update oyds_admin_nav set nav_title='$upd_navTitle',nav_icon='$upd_navIcon',nav_url='$upd_navUrl' where nav_id=$upd_navId";
$conn->query($update_sql);
$conn->close();
header('location:index.php');

