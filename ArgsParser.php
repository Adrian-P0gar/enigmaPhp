<?php


class ArgsParser
{
    public $option;
    public $cipher;
    public $file;
    public $key;


    public function __construct($args){

        if($args[0] === "-h")
        {
            $this->option = $args[0];
            $this->cipher = null;
            $this->file = null;
            $this->key = null;
        }
        else {
            try{

                if( count($args) == 3 ) {

                    $this->option = $args[0];
                    $this->cipher = $args[1];
                    $this->file = $args[2];

                }
                elseif (count($args) == 4)
                {
                    $this->option = $args[0];
                    $this->cipher = $args[1];
                    $this->file = $args[2];
                    $this->key = $args[3];
                }
                else
                    {
                        throw new EnigmaException();
                    }
            }
            catch (EnigmaException $ex)
                {
                    echo "Please insert value in all fields";
                }
        }
    }

}