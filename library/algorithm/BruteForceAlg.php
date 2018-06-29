<?php

class BruteForceAlg extends Algorithm
{
    public function calculate()
    {
        $result = $this->calcRecursive(
            $this->knapsackSize,
            count($this->data['item_id'])
        );

        $this->result = $result;
    }

    public function calcRecursive($cap, $n, $knapsack = [])
    {
        if ($n == 0 or $cap == 0){
            return $knapsack;

        } else if ($this->data['item_weight'][$n-1] > $cap) {
            return $this->calcRecursive($cap,$n-1, $knapsack);

        } else {
            $tmp1 = $this->calcRecursive($cap-$this->data['item_weight'][$n-1], $n-1, $knapsack);
            array_push($tmp1, $this->data['item_id'][$n-1]);

            $value1 = 0;
            foreach ($tmp1 as $item){
                $value1 += $this->data['item_value'][$item-1];
            }

            $tmp2 = $this->calcRecursive($cap, $n-1, $knapsack);

            $value2 = 0;
            foreach ($tmp2 as $item){
                $value2 += $this->data['item_value'][$item-1];
            }

            $knapsack = ($value1 > $value2 ? $tmp1 : $tmp2);
            return $knapsack;
        }
    }
}