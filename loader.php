<?php
defined('BASEPATH') OR exit('No direct script access allowed');

defined('BASEPATH') OR define('BASEPATH', dirname(__FILE__) . '/');
defined('MODEL') OR define('MODEL', BASEPATH . 'model/');
defined('VIEW') OR define('VIEW', BASEPATH . 'view/');
defined('CONTROLLER') OR define('CONTROLLER', BASEPATH . 'controller/');
defined('LIBRARY') OR define('LIBRARY', BASEPATH . 'library/');

defined('SRC') OR define('SRC', BASEPATH . 'src/');
defined('ALG') OR define('ALG', LIBRARY . 'algorithm/');

require_once (MODEL . 'Knapsack_model.php');
require_once (MODEL . 'FileLoader.php');
require_once (VIEW . 'View.php');
require_once (CONTROLLER . 'Controller.php');

//include all algorithms
require_once (ALG . 'Algorithm.php');

foreach ($algorithmList as $key => $item){

    include_once (ALG . $key . '.php');
}
