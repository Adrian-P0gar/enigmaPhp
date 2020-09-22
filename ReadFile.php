<?php

class ReadFile
{
    public $path;

    public function __construct($path){
        $this->path = $path;


    }


    public function readFile(){

            $file = fopen($this->path, "r") or die("Unable to open file!");
            $text = fread($file,filesize($this->path));
//             echo "Wrong path! \n";
            fclose($file);
            return $text;
    }
}
