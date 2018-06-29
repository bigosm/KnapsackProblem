<?php
defined('BASEPATH') OR exit('No direct script access allowed');

abstract class Algorithm
{
    //TODO: Would be great to return $result in the same pattern as $data.
    /*
     * data = [ 'item_id' =     [ 'item_id_1', 'item_id_2'...],
     *          'item_weight' = [ 'item_weight_1', 'item_weight_2'...],
     *          'item_value' =  [ 'item_value_1', 'item_value_2'...],
     *        ]
     */
    protected $data;

    protected $knapsackSize; //float

    /*
     * result =   ['0' => 'item_id_1',
     *             '1' => 'item_id_2',
     *             ...]
     */
    protected $result;

    public function setData($data, $knapsackSize)
    {
        $this->data = $data;
        $this->knapsackSize = $knapsackSize;
    }

    abstract function calculate();

    public function getResult() { return $this->result; }
}