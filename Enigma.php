<?php

include("CipherFactory.php");
include("ArgsParser.php");
include("ROT13.php");
include("MorseCode.php");
include("RailFence.php");
include("EnigmaException.php");
include ("ReadFile.php");

class Enigma
{
    public static $menu="Enigma Manual\n" .
    "Run options: [-h | -e | -d] {CipherName} {FileName} {EncryptionKey}\n" .
    "   -h : displays this menu; other arguments are ignored.\n" .
    "   -e : encrypt and display\n" .
    "   -d : decrypt and display\n" .
    "   CipherName      : cipher to use when encrypting/decrypting; [rot13, rail-fence, morse]\n" .
    "   FileName        : path to file to encrypt/decrypt\n" .
    "   EncryptionKey   : Optional -> must be provided if cipher requires a key\n";



    public static function handleCipherOperation($argsParser)
    {
        try
        {
            if($argsParser->option === "-h" or $argsParser->option === "-e" or $argsParser->option === "-d" )
            {
                if($argsParser->option === "-h" )
                {
                     echo self::$menu;
                }
                else
                    {
                        $cipher = CipherFactory::getCipherForArgs($argsParser);
                        if($cipher != Null & $argsParser->option === "-e"){
                            $reader = new ReadFile($argsParser->file);
                            $message =  $reader->readFile();
                            echo $cipher->encrypt($message);
                        }
                        elseif($cipher != Null & $argsParser->option === "-d")
                        {
                            $reader = new ReadFile($argsParser->file);
                            $message =  $reader->readFile();
                            echo $cipher->decrypt($message);
                        }
                }
            }
            else
                {
                  throw new EnigmaException();
                }
        }
        catch (EnigmaException $ex)
        {
            echo "The option is not valid! \n";
        }
        // use cipher and display result or display menu if no args or wrong args provided
    }


}

//do not modify this code, but please understand it :)
$args=array_slice($argv,1);
$argsParser=new ArgsParser($args);
Enigma::handleCipherOperation($argsParser);

