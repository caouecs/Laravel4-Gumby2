<?php namespace Caouecs\Gumby2;

use \HTML;

class Definition extends Core {

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
     * Construct
     *
     * @access public
     * @param array $data Data
     * @param array $attributes Attributes of dl
     * @return void
     */
    public function __construct(array $data, $attributes = array())
    {
        $this->data = $data;

        if (!empty($attributes) && is_array($attributes)) {
            $this->attributes = $attributes;
        }
    }

    /**
     * Create a new Definition
     *
     * @access public
     * @param array $data Data
     * @param array $attributes Attributes of dl
     * @return Definition
     */
    public static function create(array $data, $attributes = array())
    {
        return new Definition($data, $attributes);
    }

    /**
     * Create a normal description
     *
     * @access public
     * @param array $data Data
     * @param array $attributes Attributes of dl
     * @return Definition
     */
    public static function normal(array $data, $attributes = array())
    {
        return self::create($data, $attributes);
    }

    /**
     * Create a horizontal description
     *
     * @access public
     * @param array $data Data
     * @param array $attributes Attributes of dl
     * @return Definition
     */
    public static function horizontal(array $data, $attributes = array())
    {
        $attributes = Helpers::addClass($attributes, "horizontal");

        return self::create($data, $attributes);
    }

    /**
     * Display definition
     *
     * @access public
     * @return string
     */
    public function show()
    {
        $res = '<dl'.HTML::attributes($this->attributes).'>';

        foreach ($this->data as $key => $value) {
            $res .= '<dt>'.$key.'</dt><dd>'.$value.'</dd>';
        }

        $res .= '</dl>';

        return $res;
    }
}