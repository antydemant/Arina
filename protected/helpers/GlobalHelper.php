<?php
/**
 *
 * @author Dmytro Karpovych <ZAYEC77@gmail.com>
 */
class GlobalHelper
{
    public static function getCurrentYear($number)
    {
        switch ($number) {
            case 1: return date('Y', time())-1;
            case 2: return date('Y', time());
        }
    }
   // public static function getNu
}