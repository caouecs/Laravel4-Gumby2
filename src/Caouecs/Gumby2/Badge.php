<?php namespace Caouecs\Gumby2;

class Badge extends Indicator {

    /**
     * Type of indicator
     *
     * @access protected
     * @var string
     */
    protected $type = "badge";

    /**
     * Tag
     *
     * @access protected
     * @var string
     */
    protected $tag = "span";

    /**
     * Create a new Badge
     *
     * @access protected
     * @param string $class Class of indicator
     * @param string $message Message in indicator
     * @param array $attributes Attributes of indicator
     * @return Badge
     */
    protected static function create($class, $message, $attributes = array())
    {
        return new Badge($class, $message, $attributes);
    }
}