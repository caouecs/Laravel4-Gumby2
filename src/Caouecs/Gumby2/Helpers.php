<?php

namespace Caouecs\Gumby2;

class Helpers {

    /**
     * Add value in an array
     *
     * @access public
     * @param array $array Array object
     * @param string $value Value to add
     * @param string $key Array key to use
     * @return array
     */
    public static function add_class($array, $value, $key = 'class')
    {
        // function of Laravel4
        return array_add($array, $key, $value);

        /*$array[$key] = isset($array[$key]) ? $array[$key].' '.$value : $value;

        return $array;*/
    }
}