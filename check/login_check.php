<?php
require_once("../lib/Session.php");
require_once("../config/config.php");
require_once("../lib/Database.php");
require_once("../helpers/Format.php");
require_once('../classes/User.php');
$user       = new User();
$response = $user->checkLogin($_POST);