<?php


class EnigmaException extends Exception
{

    //since no constructor is provided, it will inherit Exception's constructors. Note the difference from Java, where
    //constructors are not inherited !!!
    public function errorMessage ()
    {
        $errorMsg = 'Mesaj de eroare';
        return $errorMsg;
    }

}