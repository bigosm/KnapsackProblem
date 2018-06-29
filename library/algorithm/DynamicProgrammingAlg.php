<?php

class DynamicProgrammingAlg extends Algorithm
{
    private $V;

    private $keep;

    public function calculate()
    {
        $result = $this->calcDP(
            $this->knapsackSize,
            count($this->data['item_id'])
        );

        $this->result = $result;
    }

    public function setV($item, $weight, $value) { $this->V[$item][$weight] = $value; }

    public function getV($item, $weight)
    {
        return ($item == 0 or $weight == 0) ? 0 : $this->V[$item][$weight];
    }

    public function setKeep($item, $weight, $value) { $this->keep[$item][$weight] = $value; }

    public function getKeep($item, $weight)
    {
        return ($item == 0 or $weight == 0) ? 0 : $this->keep[$item][$weight];
    }

    public function calcDP($cap, $n)
    {
        for ($i=1 ; $i<=$n ; $i++){
            for ($w=0 ; $w <= $cap ; $w++){
                $yes = 0;
                if (($this->data['item_weight'][$i-1] <= $w))
                    $yes =
                        $this->data['item_value'][$i-1] +
                        $this->getV($i-1, $w-$this->data['item_weight'][$i-1]);

                $no = $this->getV($i-1, $w);

                if ($yes > $no) {
                    $this->setV($i,$w, $yes);
                    $this->setKeep($i,$w, 1);
                } else {
                    $this->setV($i,$w, $no);
                    $this->setKeep($i,$w, 0);
                }
            }
        }
        $tempCap = $cap;
        $knapsack = [];
        for ($i=$n ; $i>=1 ; $i--){
            if ($this->getKeep($i, $tempCap)){
                array_push($knapsack, $this->data['item_id'][$i-1]);
                $tempCap -= $this->data['item_weight'][$i-1];
            }
        }
        return $knapsack;
    }
}