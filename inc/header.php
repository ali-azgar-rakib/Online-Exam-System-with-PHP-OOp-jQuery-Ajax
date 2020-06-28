<?php
require_once("lib/Session.php");
session::init();
require_once("config/config.php");
require_once("lib/Database.php");
require_once("helpers/Format.php");


spl_autoload_register(function ($class) {
    require_once "classes/" . $class . ".php";
});

$db      = new Database();
$fm      = new Format();
$user    = new User();
$exam    = new Exam();
$process = new Process();

?>

<!doctype html>
<html>

<head>
    <title>Online Exam System</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="no-cache">
    <meta http-equiv="Expires" content="-1">
    <meta http-equiv="Cache-Control" content="no-cache">
    <link rel="stylesheet" href="css/main.css">
    <script src="js/jquery.js"></script>
    <script src="js/main.js"></script>
</head>

<body>

    <div class="phpcoding">
        <section class="headeroption"></section>
        <section class="maincontent">
            <div class="menu">

                <ul>
                    <?php
                    $login = Session::get('login');
                    // code for logout 
                    if (isset($_GET['action'])) {
                        Session::destroy();
                        header('location: index.php');
                    }

                    // code for dynamic menu 
                    if ($login == true) {

                    ?>
                    <li><a href="profile.php">Profile</a></li>
                    <li><a href="exam.php">Exam</a></li>
                    <li><a href="?action=logout">Logout</a></li>
                    <?php } else { ?>
                    <li><a href="index.php">Login</a></li>
                    <li><a href="register.php">Register</a></li>
                    <?php } ?>
                </ul>
                <?php if ($login == true) { ?>
                <span style='float:right'>Welcome:<?= Session::get('name') ?></span>
                <?php } ?>
            </div>