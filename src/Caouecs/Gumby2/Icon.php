<?php namespace Caouecs\Gumby2;

use \HTML;

class Icon extends Core {

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
     * Construct
     *
     * @access public
     * @param string $name Name of icon
     * @param array $attributes Attributes
     * @return void
     * @throws Exception
     */
    public function __construct($name, $attributes = array())
    {
        if (ctype_alpha(str_replace("-", "", $name))) {
            $this->name = $name;
        } else {
            throw new \Exception("Name needed for Icon");
        }

        if (!empty($attributes) && is_array($attributes)) {
            $this->attributes = $attributes;
        }
    }

    /**
     * Create a new Icon
     *
     * @access public
     * @param string $name Name of icon
     * @param array $attributes Attributes
     * @return Icon
     */
    public static function create($name, $attributes = array())
    {
        return new Icon($name, $attributes);
    }

    /**
     * Call an icon
     *
     * @access public
     * @param string $method Method called
     * @param array $params Params of method
     * @return Icon
     */
    public static function __callStatic($method, $params)
    {
        return self::create($method, $params);
    }

    /**
     * Add a link
     *
     * @access public
     * @param string $link
     * @param array $link_attributes
     * @return Icon
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
    public function show()
    {
        $attributes = Helpers::addClass($this->attributes, 'entypo icon-'.$this->name);

        if ($this->link != null)
            return '<a href="'.$this->link.'"'.HTML::attributes($this->link_attributes).'><i'.HTML::attributes($attributes).'></i></a>';

        return '<i'.HTML::attributes($attributes).'></i>';
    }
}