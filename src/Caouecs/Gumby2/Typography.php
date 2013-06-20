<?php namespace Caouecs\Gumby2;

use \HTML;

/**
 * Display text
 *
 * @todo add lead and fittext
 */
class Typography {

    /**
     * Class of text
     *
     * @access protected
     * @var string
     */
    protected $class = 'default';

    /**
     * Tag of text
     *
     * @access protected
     * @var string
     */
    protected $tag = "p";

    /**
     * Message
     *
     * @access protected
     * @var string
     */
    protected $message = null;

    /**
     * Attributes of text
     *
     * @access protected
     * @var array
     */
    protected $attributes = array();

    /**
     * Create an text by color
     *
     * @access public
     * @param string $method Method called
     * @param array $params Params of method
     * @return \Typography
     */
    public static function __callStatic($method, $params)
    {
        // verif if color exists
        if (!in_array($method, Helpers::$colors) || $method == "normal") {
            $method = "default";
        }

        array_unshift($params, $method);

        return call_user_func_array('static::show', $params);
    }

    /**
     * Create a custom indicator
     *
     * @access public
     * @param string $class Class custom of indicator
     * @param string $message Message in indicator
     * @param array $attributes Attributes of indicator
     * @return \Indicator
     */
    public static function custom($class, $message, $attributes = array())
    {
        return static::show($class, $message, $attributes);
    }

    /**
     * Create a new Typography
     *
     * @access protected
     * @param string $class Class of text
     * @param string $message Message in text
     * @param array $attributes Attributes of text
     * @return \Typography
     */
    protected static function show($class, $message, $attributes = array())
    {
        $text = new Typography;

        $text->class = $class;
        $text->message = $message;
        $text->attributes = $attributes;

        return $text;
    }

    /**
     * Update tag
     *
     * @access public
     * @param string $tag Tag
     * @return \Typography
     */
    public function tag($tag)
    {
        $this->tag = e($tag);

        return $this;
    }

    /**
     * Display indicator
     *
     * @access public
     * @return string
     */
    public function __toString()
    {
        $attributes = Helpers::add_class($this->attributes, 'text-'.$this->class);

        return '<'.$this->tag.HTML::attributes($attributes).'>'.$this->message.'</'.$this->tag.'>';
    }
}