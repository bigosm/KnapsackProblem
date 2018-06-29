<?php
defined('BASEPATH') OR define('BASEPATH', dirname(__FILE__) . '/');

//Load program configuration
require_once (BASEPATH . 'config.php');

$knapsack_problem = new Controller();

//Run Forest, Run!
$knapsack_problem->start();
