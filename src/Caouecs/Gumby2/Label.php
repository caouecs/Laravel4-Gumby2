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
     * @return Label
     */
    protected static function create($class, $message, $attributes = array())
    {
        return new Label($class, $message, $attributes);
    }

}