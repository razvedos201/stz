<?php

$ctrl = !empty($_GET['ctrl'])? $_GET['ctrl']:'News';
$act = !empty($_GET['act'])? $_GET['act']:'All';

$method = 'action'.$act;
$ControllerClass = $ctrl.'Controller';
require_once __DIR__.'/controllers/'.$ControllerClass.'.php';

$news = new  $ControllerClass;
$news->$method();


