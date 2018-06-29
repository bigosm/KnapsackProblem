<?php

class View
{
    public function intro($algList)
    {
        echo "Knapsack Problem Solver v1.0\n\n";

        echo "List of available algorithms:\n";

        $count = 1;
        foreach ($algList as $key => $item){
            echo "$count: $item\n";
            $count++;
        }
        echo "\n";
    }

    public function showDefaultFile($file)
    {
        echo "Default file:\n";
        echo "$file \n\n";
    }

    public function getArgument($name)
    {
        switch($name)
        {
            case 'fileName':
                $prompt = 'Please enter file name or leave empty to continue with default file: ';
                break;
            case 'knapsackCap':
                $prompt = 'Please enter knapsack capacity: ';
                break;
            case 'algorithm':
                $prompt = 'Please choose an algorithm to calculate: ';
                break;
            default:
                $prompt = '';
        }
        return $this->readLine($prompt);
    }

    public function showResult($knapsack, $knapsackSize)
    {
        echo "Knapsack problem solved!\n\n";
        
        echo "Knapsack capacity: $knapsackSize\n";
        echo "List of items:\n";
        $totalValue = 0;
        $totalWeight = 0;
        foreach ($knapsack['item_id'] as $key=>$item){
            echo $key+1 . ": $item\n";
            $totalValue += $knapsack['item_value'][$key];
            $totalWeight += $knapsack['item_weight'][$key];
        }

        echo "\nTotal Value of Knapsack = $totalValue";
        echo "\nTotal Weight of Knapsack = $totalWeight";
    }

    public function readLine($prompt)
    {
        return readline($prompt);
    }

    public function showError($e)
    {
        echo $e . "\n";
    }
}
