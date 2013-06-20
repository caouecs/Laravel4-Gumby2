<?php namespace Caouecs\Gumby2;

use \HTML;

class Indicator {

    /**
     * Class of indicator
     *
     * @access private
     * @var string
     */
    protected $class = 'default';

    /**
     * Message in indicator
     *
     * @access private
     * @var string
     */
    protected $message = null;

    /**
     * Attributes of indicator
     *
     * @access private
     * @var array
     */
    protected $attributes = array();

    /**
     * Call an indicator by color
     *
     * @access public
     * @param string $method Method called
     * @param array $params Params of method
     * @return \Indicator
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
     * Update tag
     *
     * @access public
     * @param string $tag Tag
     * @return \Indicator
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
        $attributes = Helpers::add_class($this->attributes, $this->class.' '.$this->type);

        return '<'.$this->tag.HTML::attributes($attributes).'>'.$this->message.'</'.$this->tag.'>';
    }
}