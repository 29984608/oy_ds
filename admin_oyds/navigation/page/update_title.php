<?php
header("Content-type: text/html; charset=utf-8");
require_once ("db.php");
$nav_title = $_POST['nav_title'];
$update_sql = "update oyds_column set name='$nav_title' where id=177";
$conn->query($update_sql);
$conn->close();
header('location:index.php');