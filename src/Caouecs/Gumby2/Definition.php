<?php namespace Caouecs\Gumby2;

use \HTML;

class Definition {

    /**
     * Data
     *
     * @access protected
     * @var array
     */
    protected $data = array();

    /**
     * Attributes
     *
     * @access protected
     * @var array
     */
    protected $attributes = array();


    /**
     * Create a normal description
     *
     * @access public
     * @param array $data Data
     * @param array $attributes Attributes of dl
     * @return \Definition
     */
    public static function normal(array $data, $attributes = array())
    {
        return self::show($data, $attributes);
    }

    /**
     * Create a horizontal description
     *
     * @access public
     * @param array $data Data
     * @param array $attributes Attributes of dl
     * @return \Definition
     */
    public static function horizontal(array $data, $attributes = array())
    {
        $attributes = Helpers::add_class($attributes, "horizontal");

        return self::show($data, $attributes);
    }

    /**
     * Create a new Definition
     *
     * @access private
     * @param array $data Data
     * @param array $attributes Attributes of dl
     * @return \Definition
     */
    private static function show(array $data, $attributes = array())
    {
        $definition = new Definition;

        $definition->data = $data;
        $definition->attributes = $attributes;

        return $definition;
    }

    /**
     * Display definition
     *
     * @access public
     * @return string
     */
    public function __toString()
    {
        $res = '<dl'.HTML::attributes($this->attributes).'>';

        foreach ($this->data as $key => $value) {
            $res .= '<dt>'.$key.'</dt><dd>'.$value.'</dd>';
        }

        $res .= '</dl>';

        return '<'.$this->tag.HTML::attributes($attributes).'>'.$this->message.'</'.$this->tag.'>';
    }
}