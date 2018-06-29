<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| Algorithm List
|--------------------------------------------------------------------------
| Simple implementation of new algorithms
|
| $key => $item
| where:
| $key - Class/file name, '.php' is included later in loader;
| $item - human readable name;
|
| Loader will automatically load all algorithms.
*/

$algorithmList = [
    'BruteForceAlg' => 'Brute force method (Recursive) ',
    'DynamicProgrammingAlg' => 'Dynamic Programming method'
];

/*
|--------------------------------------------------------------------------
| Default File
|--------------------------------------------------------------------------
|
| enter an empty line to use default file.
*/

$defaultFile = 'zadanie_rekrutacyjne_PHP.csv';

//Load necessary files to run the program
include_once (BASEPATH . 'loader.php');
