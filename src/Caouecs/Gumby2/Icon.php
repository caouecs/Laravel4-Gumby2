<?php namespace Caouecs\Gumby2;

use \HTML;

class Icon {

    /**
     * Name of icon
     *
     * @access protected
     * @var string
     */
    protected $name = null;

    /**
     * Link on Icon
     *
     * @access protected
     * @var string
     */
    protected $link = null;

    /**
     * Attributes of icon
     *
     * @access protected
     * @var array
     */
    protected $attributes = array();

    /**
     * Attributes of link
     *
     * @access protected
     * @var array
     */
    protected $link_attributes = array();

    /**
     * Call an icon
     *
     * @access public
     * @param string $method Method called
     * @param array $params Params of method
     * @return \Icon
     */
    public static function __callStatic($method, $params)
    {
        return self::show($method, $params);
    }

    /**
     * Create a new Icon
     *
     * @access public
     * @param string $name Name of icon
     * @param array $attributes Attributes
     * @return \Icon
     */
    public static function show($name, $attributes = array())
    {
        $icon = new Icon;

        $icon->name = e($name);
        $icon->attributes = $attributes;

        return $icon;
    }

    /**
     * Add a link
     *
     * @access public
     * @param string $link
     * @param array $link_attributes
     * @return \Object
     */
    public function link($link, $link_attributes = array())
    {
        $this->link = (string) $link;
        $this->link_attributes = $link_attributes;

        return $this;
    }

    /**
     * Display icon
     *
     * @access public
     * @return string
     */
    public function __toString()
    {
        $attributes = Helpers::add_class($this->attributes, 'entypo icon-'.$this->name);

        if ($this->link != null)
            return '<a href="'.$this->link.'"'.HTML::attributes($this->link_attributes).'><i'.HTML::attributes($attributes).'></i></a>';

        return '<i'.HTML::attributes($attributes).'></i>';
    }
}