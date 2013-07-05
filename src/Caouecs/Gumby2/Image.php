<?php namespace Caouecs\Gumby2;

use \HTML;

class Image extends Core {

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
     * Construct
     *
     * @access public
     * @param string $class Class of image
     * @param string $path Path of image
     * @param string $alt Alt of image
     * @param array $attributes Attributes of image
     * @return void
     * @throws Exception
     */
    public function __construct($class, $path, $alt = '', $attributes = array())
    {
        if (ctype_alpha(str_replace("-", "", $class))) {
            $this->class = $class;
        } else {
            throw new Exception("Class needed for Image");
        }

        $this->path = $path;

        $this->alt = e($alt);

        if (!empty($attributes) && is_array($attributes)) {
            $this->attributes = $attributes;
        }
    }

    /**
     * Create a new image
     *
     * @access protected
     * @param string $class Class of image
     * @param string $path Path of image
     * @param string $alt Alt of image
     * @param array $attributes Attributes of image
     * @return Image
     * @throws Exception
     */
    protected static function create($class, $path, $alt = '', $attributes = array())
    {
        $array_classes = array("circle", "rounded", "photo", "polaroid");
        if (in_array($class, $array_classes)) {
            return new Image($class, $path, $alt, $attributes);
        }

        throw new Exception("Class valid needed for Image");
    }

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

        return call_user_func_array('static::create', $params);
    }

    /**
     * Add a link
     *
     * @access public
     * @param string $link
     * @return Image
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
     * @return Image
     */
    public static function custom($class, $path, $alt = '', $attributes = array())
    {
        return new Image($class, $path, $alt, $attributes);
    }

    /**
     * Add gumby-retina to display retina
     *
     * @access public
     * @return Image
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
    public function show()
    {
        // attributes
        $attributes = Helpers::addClass($this->attributes, $this->class." image");

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