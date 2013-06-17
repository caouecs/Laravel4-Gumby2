<?php namespace Caouecs\Gumby2;

class Helpers {

    /**
     * Colors
     *
     * @access public
     * @var array
     *
     * @todo Know why light and dark are just for label and badge
     */
    public static $colors = array("primary", "secondary", "normal", "info", "danger", "warning", "success", "light", "dark");

    /**
     * Designs
     *
     * @access public
     * @var array
     */
    public static $designs = array("metro", "pretty");

    /**
     * Sizes
     *
     * @access public
     * @var array
     */
    public static $sizes = array("xlarge", "large", "medium", "small");

    /**
     * Columns
     *
     * @access public
     * @var array
     */
    public static $columns = array("one", "two", "three", "four", "five", "six", "seven", "eight", "nine", "ten", "eleven", "twelve", "thirteen", "fourteen", "fifteen", "sixteen");

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
        $array[$key] = isset($array[$key]) ? $array[$key].' '.$value : $value;

        return $array;
    }
}