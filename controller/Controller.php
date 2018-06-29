<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Controller
{
    //Knapsack_model instance
    public $ks;

    //FileLoader instance
    public $fl;

    //View instance
    public $view;

    //Instance of current algorithm
    public $alg;

    public function __construct()
    {
        $this->ks = new Knapsack_model();
        $this->fl = new FileLoader();
        $this->view = new View();
    }

    public function start()
    {
        $this->view->intro($this->ks->getAlgList());

        $this->view->showDefaultFile($this->fl->getDefaultFile());
        $this->getArgument('fileName');

        $this->getArgument('knapsackCap');

        $this->getArgument('algorithm');

        // Dynamically defined algorithm 
        $alg = $this->ks->getAlgorithm();
        $calculate = new $alg();

        $data = $this->fl->getData();
        $ksCap = $this->ks->getKnapsackCap();

        $calculate->setData(
            $data,
            $ksCap
        );

        $calculate->calculate();
        $ksContent['item_id'] = $calculate->getResult();
        $ksContent['item_weight'] = [];
        $ksContent['item_value'] = [];

        foreach ($ksContent['item_id'] as $id){
            array_push( $ksContent['item_weight'], (float)$data['item_weight'][$id-1]);
            array_push( $ksContent['item_value'], (int)$data['item_value'][$id-1]);
        }

        $this->view->showResult(
            $ksContent,
            $ksCap
        );
    }

    public function getArgument($arg)
    {
        $flag = true;
        while ($flag){
            $input = $this->view->getArgument($arg);

            switch($arg){
                case 'fileName':
                    $result = $this->fl->readFile($input);
                    $error = $this->fl->getError();
                    break;
                case 'knapsackCap':
                    $result = $this->ks->setKnapsackCap($input);
                    $error = $this->ks->getError();
                    break;
                case 'algorithm':
                    $result = $this->ks->setAlgorithm($input);
                    $error = $this->ks->getError();
                    break;
                default:
                    $result = false;
                    $error = 'Argument not defined';
            }

            if ($result === true)
                $flag = false;

            $this->view->showError($error);
        }
    }
}