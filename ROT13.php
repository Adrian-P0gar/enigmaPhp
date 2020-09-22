<?php

include("Cipher.php");

class ROT13 implements Cipher
{
    private $alphabetArray = array('a'=> 'n', 'b'=> 'o', 'c'=>'p', 'd'=>'q', 'e'=>'r', 'f'=>'s', 'g'=>'t','h'=>'u','i'=>'v', 'j'=>'w', 'k'=>'x',
        'l'=>'y', 'm'=>'z', 'n'=>'a', 'o'=>'b', 'p'=>'c', 'q'=>'c', 'r'=>'e', 's'=>'f', 't'=>'g', 'u'=>'h', 'v'=>'i', 'w'=>'j', 'x'=>'k',
        'y'=>'l', 'z'=>'m', ' ' => ' '
    );
    public function decrypt($message)
    {

        $newText = '';
        foreach ( explode(" ", $message) as $character){
            foreach ($this->alphabetArray as $letter => $morseCode ){
                if(strtolower($character) === $morseCode){
                    $newText= $newText . $letter;
                }
            }
        }

        return "Decrypt morseCode ".$newText."\n";
    }

    public function encrypt($message)
    {
        $newText = '';
        foreach (str_split($message) as $character){
            foreach ($this->alphabetArray as $letter => $morseCode ){
                if(strtolower($character) === $letter){
                    $newText= $newText . $morseCode;
                }
            }
        }
        $newText= $newText .' ';
        return "Encrypt morseCode: ". $newText."\n";
    }


}