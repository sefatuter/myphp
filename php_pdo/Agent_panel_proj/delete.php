<?php
require 'pdo_connect.php';
require 'classes/Agent.php';

$agentManager = new Agent($conn);
$agentManager->delete($_GET["id"]);
header("Location: index.php");
exit;