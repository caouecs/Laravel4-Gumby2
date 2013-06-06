<?php

namespace Caouecs\Gumby2;

class Badge extends Indicator {

    /**
     * Type of indicator
     *
     * @access protected
     * @var string
     */
    protected $type = "badge";

    /**
     * Html
     *
     * @access protected
     * @var string
     */
    protected $html = "span";

    /**
     * Create a new Badge
     *
     * @access protected
     * @param string $class Class of indicator
     * @param string $message Message in indicator
     * @param array $attributes Attributes of indicator
     * @return \Badge
     */
    protected static function show($class, $message, $attributes = array())
    {
        $indicator = new Badge;

        $indicator->class = $class;
        $indicator->message = $message;
        $indicator->attributes = $attributes;

        return $indicator;
    }
}
