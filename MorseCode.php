<?php



class MorseCode implements Cipher
{
    private $alphabetArray = array('a'=> '.-', 'b'=> '-...', 'c'=>'-.-.', 'd'=>'-..', 'e'=>'.', 'f'=>'..-.', 'g'=>'--.','h'=>'....','i'=>'..', 'j'=>'.---', 'k'=>'-.-',
            'l'=>'.-..', 'm'=>'--', 'n'=>'-.', 'o'=>'---', 'p'=>'.--.', 'q'=>'--.-', 'r'=>'.-.', 's'=>'...', 't'=>'-', 'u'=>'..-', 'v'=>'...-', 'w'=>'.--', 'x'=>'-..-',
            'y'=>'-.--', 'z'=>'--..', ' ' => '/'
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
                    $newText= $newText . $morseCode.' ';
                }
            }
        }
        $newText= $newText .'/';

        return "Encrypt morseCode: ". $newText."\n";
    }

}