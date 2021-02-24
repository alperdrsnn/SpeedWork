<?php

namespace SpeedWeb\helpers;

class ArrayHelper
{

    public static function first($array)
    {
        return $array[array_keys($array)[0]];
    }

    public static function last($array)
    {
        return $array[array_keys($array)[sizeof($array) - 1]];
    }

    public static function get($key, $array)
    {
        if(is_string($key) && is_array($array)){
            $keys = explode('.', $key);
            while (sizeof($keys) >= 1){
                $k = array_shift($keys);
                if(!isset($array[$k])){
                    return null;
                }
                if(sizeof($keys) === 0){
                    return $array[$k];
                }
                $array = &$array[$k];
            }
        }
        return null;
    }

    public static function set($key, $value, &$array)
    {
        if(is_string($key) && !empty($key)){
            $keys = explode('.', $key);
            $arrTmp = &$array;
            while(sizeof($keys) >= 1){
                $k = array_shift($keys);
                if(!is_array($arrTmp)){
                    $arrTmp = [];
                }
                if(!isset($arrTmp[$k])){
                    $arrTmp[$k] = [];
                }
                if(sizeof($keys) === 0){
                    $arrTmp[$k] = $value;
                    return true;
                }
                $arrTmp = &$arrTmp[$k];
            }
        }
        return false;
    }
}