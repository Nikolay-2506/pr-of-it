<?php

require __DIR__ . '/../../autoload.php';

$ctrlName = isset($_GET['ctrl']) ? ucfirst($_GET['ctrl']) : 'Index';
$ctrlClass = '\App\AdminPanel\Controllers\\' . $ctrlName;

$ctrl = new $ctrlClass;
$ctrl->action();