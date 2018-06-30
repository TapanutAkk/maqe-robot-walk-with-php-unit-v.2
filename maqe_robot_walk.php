#!/usr/bin/php
<?php

namespace Net;

require_once __DIR__."/app/autoload.php";

$walkingOrders = $argv[1];

$maqeRobot = new MaqeRobot($walkingOrders);
$maqeRobotWalk = $maqeRobot->walk();
echo "$maqeRobotWalk\n";
