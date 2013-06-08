<?php namespace Caouecs\Gumby2;

class Label extends Indicator {

    /**
     * Type of indicator
     *
     * @access protected
     * @var string
     */
    protected $type = "label";

    /**
     * Tag
     *
     * @access protected
     * @var string
     */
    protected $tag = "span";

    /**
     * Create a new Label
     *
     * @access protected
     * @param string $class Class of indicator
     * @param string $message Message in indicator
     * @param array $attributes Attributes of indicator
     * @return \Label
     */
    protected static function show($class, $message, $attributes = array())
    {
        $indicator = new Label;

        $indicator->class = (string) $class;
        $indicator->message = $message;
        $indicator->attributes = $attributes;

        return $indicator;
    }

}