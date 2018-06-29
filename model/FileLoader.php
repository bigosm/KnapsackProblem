<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class FileLoader
{
    private $filePath;

    private $data;

    private $error;

    private $defaultFile;

    public function __construct()
    {
        $this->setDefaultFile((isset($GLOBALS['defaultFile']) ? $GLOBALS['defaultFile'] : 'data.csv' ));
    }

    public function setDefaultFile($df) { $this->defaultFile = $df; }

    public function getDefaultFile() { return $this->defaultFile; }

    public function setData($data) { $this->data = $data; }

    public function getData() { return $this->data; }

    public function setError($e) { $this->error = $e; }

    public function getError() { return $this->error; }

    public function setFilePath($path)
    {
        if ($path === "")
            $path = $this->getDefaultFile();

        if (file_exists(SRC . $path)){
            $this->filePath = SRC . $path;
            return true;
        } elseif (file_exists(BASEPATH . $path)){
            $this->filePath = BASEPATH . $path;
            return true;
        }
        return false;
    }

    public function readFile($path)
    {
        try {
            $fp = $this->setFilePath($path);
            if (!$fp)
                throw new Exception('There is no such file in src or main directory!');

            if (!is_readable($this->filePath))
                throw new Exception('File failed to open!');
            $file = fopen( $this->filePath, 'r');

            $preparedLine = ['item_id' => [], 'item_weight' => [], 'item_value' => []];
            $this->data = [];
            $firstLine = true;
            while (($rawLine = fgets($file, 4096)) !== false) {
                if ($firstLine === true){
                    $firstLine = false;
                    continue;
                }
                $explodedLine = explode(';', $rawLine);

                if (count($explodedLine) === 3){

                    for ($i=0; $i < count($explodedLine); $i++){
                        if (!is_numeric(str_replace("\r\n", '',$explodedLine[$i]))) {
                            var_dump($explodedLine[$i]);
                            throw new Exception("Cant solve this line: {$explodedLine[$i]}");
                        }
                    }
                } else {
                    throw new Exception('File is corrupted or does not contain data to solve!');
                }

                array_push($preparedLine['item_id'], (int)$explodedLine[0]);
                array_push($preparedLine['item_weight'], (float)$explodedLine[1]);
                array_push($preparedLine['item_value'], (int)$explodedLine[2]);
            }
            $this->data =  $preparedLine;
            fclose($file);

        } catch (Exception $e) {
            $error = "Error occurred: " . $e->getMessage();
            $this->setError($error);
            return false;
        }
        $this->setError('');
        return true;
    }
}
