<?php
session_start();
require 'classes/Auth.php';

$auth = new Auth();
$auth->logout();

header("Location: login.php");
exit;
