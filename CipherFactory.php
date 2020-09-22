<?php



class CipherFactory
{

    public static function isCipherAvailable($cipherName)
    {
        if ($cipherName === "rot13" or $cipherName === "rail-fence" or $cipherName === "morse" ){
            return true;
        }
        return false;
    }

    public static function getCipherForArgs($argsParser)
    {
        try
        {
            if( self::isCipherAvailable($argsParser->cipher))
            {
                switch ($argsParser->cipher)
                {
                    case "rot13":
                        return new ROT13();
                    case "rail-fence":
                        return new RailFence();
                    case "morse":
                        return new MorseCode();
                }
            }
            else
                {
                    throw new EnigmaException();
                }
        }
        catch (EnigmaException $ewx)
        {
            echo "The cipher name is wrong! \n";
        }

        return null;
    }
}