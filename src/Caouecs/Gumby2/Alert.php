<?php namespace Caouecs\Gumby2;

class Alert extends Indicator {

    /**
     * Type of indicator
     *
     * @access protected
     * @var string
     */
    protected $type = "alert";

    /**
     * Tag
     *
     * @access protected
     * @var string
     */
    protected $tag = "div";

    /**
     * Create a new Alert
     *
     * @access protected
     * @param string $class Class of indicator
     * @param string $message Message in indicator
     * @param array $attributes Attributes of indicator
     * @return \Alert
     */
    protected static function show($class, $message, $attributes = array())
    {
        $indicator = new Alert;

        $indicator->class = $class;
        $indicator->message = $message;
        $indicator->attributes = $attributes;

        return $indicator;
    }
}