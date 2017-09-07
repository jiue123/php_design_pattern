<?php
include ("./singleton.php");

class Res
{
    public static function getResInfo()
    {
        $arrResInfo[] = Singleton::getInstance();

        $arrResInfo['name'] = "01";
        $arrResInfo['password'] = "09201AX937232";

        return $arrResInfo;
    }
}

$a = new Res();
$b = $a->getResInfo();

var_dump($b);