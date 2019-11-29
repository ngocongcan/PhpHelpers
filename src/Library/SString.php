<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace PhpHelpers\Library;

/**
 * Description of SString
 *
 * @author can.ngo
 */
class SString {
    
    /**
    * Replace the last occurrence of a string
    *
    * @param string $search
    * @param string $replace
    * @param string $subject
    *
    * @return string
    *
    */
    public static function str_replace_last($search, $replace, $subject)
    { 
        $length_of_search = strlen( $search );
        $position_of_search = strrpos( $subject, $search );
    if($position_of_search!==false)
    {
        $subject = substr_replace($subject, $replace, $position_of_search, $length_of_search );
    }
    return $subject;
    }
    /**
     * Checks whether a string starts with given chars
     *
     * @param string $haystack
     * @param string $needle
     *
     * @return bool starts_with
     *
     */
    public static function starts_with($haystack, $needle)
    {
         $length = strlen($needle);
         return (substr($haystack, 0, $length) === $needle);
    }
    /**
     * Checks whether a string ends with given chars
     *
     * @param string $haystack
     * @param string $needle
     *
     * @return bool ends_with
     *
     */
    public static function ends_with($haystack, $needle)
    {
        $length = strlen($needle);
        if ($length == 0)
        {
            return true;
        }
        return (substr($haystack, -$length) === $needle);
    }
    /**
     * Find the position of the Xth occurrence of a substring in a string
     * @param $haystack
     * @param $needle
     * @param $number integer > 0
     * @return int
     */
    public static function strposX($haystack, $needle, $number)
    {
        if($number == '1')
        {
            return strpos($haystack, $needle);
        }
        elseif($number > '1')
        {
            return strpos($haystack, $needle, strposX($haystack, $needle, $number - 1) + strlen($needle));
        }
        else
        {
            return error_log('Error: Value for parameter $number is out of range');
        }
    }
    /**
     * Replace accented characters in string by non-accented
     *
     * @param string $str
     *
     * @return string $string without accents
     *
     * @todo To be really hard tested for reliability ...
     */
    public static function remove_accents($str)
    {
        $string = strtr(utf8_decode($str), utf8_decode('àáâãäçèéêëìíîïñòóôõöùúûüýÿÀÁÂÃÄÇÈÉÊËÌÍÎÏÑÒÓÔÕÖÙÚÛÜÝ'), utf8_decode('aaaaaceeeeiiiinooooouuuuyyAAAAACEEEEIIIINOOOOOUUUUY'));
        return $string;
    }
}
