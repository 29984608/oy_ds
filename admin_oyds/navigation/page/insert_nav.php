<?php
header("Content-type: text/html; charset=utf-8");
require_once ("db.php");
$add_navTitle = $_POST['add_navTitle'];
$add_navIcon = $_POST['add_navIcon'];
$add_navUrl = $_POST['add_navUrl'];
$insert_sql = "INSERT INTO oyds_admin_nav (nav_title,nav_icon,nav_url) values ('$add_navTitle','$add_navIcon','$add_navUrl')";
$conn->query($insert_sql);
$conn->close();
header('location:index.php');