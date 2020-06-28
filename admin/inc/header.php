<?php
header("Expires: Tue, 01 Jan 2000 00:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
?>
<?php
require_once("../lib/Session.php");
require_once("../config/config.php");
require_once("../lib/Database.php");
require_once("../helpers/Format.php");

Session::checkAdminSession();

$db  = new Database();
$fm  = new Format();
?>
<?php


// logout code 

if (isset($_GET['action']) && $_GET['action'] == 'logout') {
    Session::destroy();
    header('location: login.php');
}


?>
<!doctype html>
<html>

<head>
    <title>Admin</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="no-cache">
    <meta http-equiv="Expires" content="-1">
    <meta http-equiv="Cache-Control" content="no-cache">
    <link rel="stylesheet" href="css/admin.css">
</head>

<body>
    <div class="phpcoding">
        <section class="headeroption"></section>
        <section class="maincontent">
            <div class="menu">
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="users.php">Manage user</a></li>
                    <li><a href="quesadd.php">Add Ques</a></li>
                    <li><a href="queslist.php">Ques List</a></li>
                    <li><a href="?action=logout">Logout</a></li>
                </ul>
            </div>