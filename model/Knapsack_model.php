<?php

class Knapsack_model
{
    private $knapsackCap;

    private $algList;

    private $algorithm;

    private $error;

    public function __construct()
    {
        $this->setAlgList($GLOBALS['algorithmList']);
    }

    public function setKnapsackCap($ksCap) {

        if (!is_float($ksCap)){
            //TODO: check if input variable is negative and show appropriate message.
            //Current: script drop "-" and take value as positive number
            try {
                if(preg_match("#([0-9\.]+)#", $ksCap, $match)) {
                    $tmpCap = (float)$match[0];
                } else {
                    $tmpCap = (float)$ksCap;
                }

                if ($tmpCap <= 0)
                    throw new Exception('Sorry but the Value is not correct!');

                $ksCap = $tmpCap;

            } catch (Exception $e) {
                $error = "Error occurred: " . $e->getMessage();
                $this->setError($error);
                return false;
            }
        }

        $this->knapsackCap = $ksCap;
        return true;
    }

    public function getKnapsackCap() { return $this->knapsackCap; }

    public function setAlgList($algList) { $this->algList = $algList; }

    public function getAlgList() { return $this->algList; }

    public function setAlgorithm($alg)
    {
        $alg = (int)$alg;

        try {
            if ($alg < 1 or $alg > (count($this->algList)))
                throw new Exception('Please choose algorithm from list.');

        } catch (Exception $e) {
            $error = "Error occurred: " . $e->getMessage();
            $this->setError($error);
            return false;
        }
        $alg = array_keys($this->algList)[$alg-1];
        $this->algorithm = $alg;
        return true;
    }

    public function getAlgorithm() { return $this->algorithm; }

    public function setError($e) { $this->error = $e; }

    public function getError() { return $this->error; }

}