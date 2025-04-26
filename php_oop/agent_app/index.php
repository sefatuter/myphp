<?php

spl_autoload_register(function($class) {
    require_once "classes/" . $class . ".php";
});

$agent = new Agent("Sefa");
$agent->identify();

$mission = new Mission("007");
$mission->show();

$spy = new Spyy("James");
$spy->spier();