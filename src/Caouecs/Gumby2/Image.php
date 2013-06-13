<?php namespace Caouecs\Gumby2;

use \HTML;

class Image {

    /**
     * Class of image
     *
     * @access protected
     * @var string
     */
    protected $class = null;

    /**
     * Path of image
     *
     * @access protected
     * @var string
     */
    protected $path = null;

    /**
     * Alt of image
     *
     * @access protected
     * @var string
     */
    protected $alt = null;

    /**
     * Attributes of image
     *
     * @access protected
     * @var array
     */
    protected $attributes = array();

    /**
     * Retina
     *
     * @access protected
     * @var boolean
     */
    protected $retina = false;

    /**
     * Link on image
     *
     * @access protected
     * @var string
     */
    protected $link = null;

    /**
     * Call an image
     *
     * @access public
     * @param string $method Method called
     * @param array $params Params of method
     * @return string
     */
    public static function __callStatic($method, $params)
    {
        $class = null;

        $array_classes = array("circle", "rounded", "photo", "polaroid");

        $array_methods = explode("_", $method);

        foreach ($array_methods as $method) {

            // class
            if (in_array($method, $array_classes)) {
                if ($method == "polaroid")
                    $method = "photo polaroid";
                $class['class'] = $method;

            // columns
            } elseif (in_array($method, Helpers::$columns)) {
                $class['columns'] = $method." columns";
            }
        }

        array_unshift($params, implode(" ", $class));

        return call_user_func_array('static::show', $params);
    }

    /**
     * Add a link
     *
     * @access public
     * @param string $link
     * @return \Object
     */
    public function link($link)
    {
        $this->link = (string) $link;

        return $this;
    }

    /**
     * Create a custom image
     *
     * @access public
     * @param string $class Class of image
     * @param string $path Path of image
     * @param string $alt Alt of image
     * @param array $attributes Attributes of image
     * @return \Image
     */
    public static function custom($class, $path, $alt = '', $attributes = array())
    {
        return static::show($class, $path, $alt, $attributes);
    }

    /**
     * Create a new image
     *
     * @access protected
     * @param string $class Class of image
     * @param string $path Path of image
     * @param string $alt Alt of image
     * @param array $attributes Attributes of image
     * @return \Image
     */
    protected static function show($class, $path, $alt = '', $attributes = array())
    {
        $image = new Image;

        $image->class = e($class);
        $image->path = $path;
        $image->alt = e($alt);
        $image->attributes = $attributes;

        return $image;
    }

    /**
     * Add gumby-retina to display retina
     *
     * @access public
     * @return \Image
     */
    public function retina()
    {
        $this->retina = true;

        return $this;
    }

    /**
     * Display image
     *
     * @access public
     * @return string
     */
    public function __toString()
    {

        $attributes = Helpers::add_class($this->attributes, $this->class." image");

        $res = '<div'.HTML::attributes($attributes).'>';

        // link
        if ($this->link != null) {
            $res .= '<a href="'.$this->link.'">';
        }

        $res .= '<img src="'.$this->path.'" alt="'.$this->alt.'" ';

        // retina
        if ($this->retina === true) {
            $res .= 'gumby-retina';
        }

        $res .= ' />';

        // link
        if ($this->link != null) {
            $res .= '</a>';
        }

        $res .= '</div>';

        return $res;
    }
}