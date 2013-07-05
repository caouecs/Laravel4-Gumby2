<?php namespace Caouecs\Gumby2;

use \HTML;

class Tabs extends Core {

    /**
     * Class of tabs
     *
     * @access protected
     * @var string
     */
    protected $class = null;

    /**
     * Number of columns of links for vertical tabs
     *
     * @access protected
     * @var string
     */
    protected $links_columns = null;

    /**
     * Number of columns of content for vertical tabs
     *
     * @access protected
     * @var string
     */
    protected $content_columns = null;

    /**
     * Elements of tabs
     *
     * @access protected
     * @var array
     */
    protected $elements = array();
 
    /**
     * Attributes of tabs
     *
     * @access protected
     * @var array
     */
    protected $attributes = array();

    /**
     * Construct
     *
     * @access public
     * @param string $class Name of class
     * @param string $links_columns Number of columns of links for vertical tabs
     * @param string $content_columns Number of columns of content for vertical tabs
     * @param array $attributes Attributes of tabs
     * @return void
     */
    public function __construct($class, $links_columns = '', $content_columns = '', $attributes = array())
    {
        if (ctype_alpha(str_replace(array("-", "_", " "), "", $class))) {
            $this->class = $class;
        }
        
        if (str_contains($class, "vertical")) {
            if (!empty($links_columns) && !empty($content_columns) && ctype_alpha($links_columns) && ctype_alpha($content_columns)) {
                $this->links_columns = $links_columns;
                $this->content_columns = $content_columns;
            } else {
                $this->links_columns = "four";
                $this->content_columns = "eight";
            }
        }

        if (!empty($attributes) && is_array($attributes)) {
            $this->attributes = $attributes;
        }
    }

    /**
     * Create a new Tabs
     *
     * @access protected
     * @param string $class Name of class
     * @param string $links_columns Number of columns of links for vertical tabs
     * @param string $content_columns Number of columns of content for vertical tabs
     * @param array $attributes Attributes of tabs
     * @return Tabs
     */
    protected static function create($class, $links_columns = '', $content_columns = '', $attributes = array())
    {
        return new Tabs($class, $links_columns, $content_columns, $attributes);
    }

    /**
     * Call an tabs
     *
     * @access public
     * @param string $method Method called
     * @param array $params Params of method
     * @return Tabs
     */
    public static function __callStatic($method, $params)
    {
        $array_classes = array("normal", "pill", "vertical", "bottom");

        $array_methods = explode("_", $method);

        if (!in_array($array_methods[0], $array_classes)) {
            return null;
        }

        if ($array_methods[0] == "normal") {
            $array_methods[0] = null;
        }

        // vertical, you must indicate columns of ul and div
        if ($array_methods[0] == "vertical") {
            if ( !isset($array_methods[1]) or !isset($array_methods[2]) or !in_array($array_methods[1], Helpers::$columns) or !in_array($array_methods[2], Helpers::$columns)) {
                $array_methods[1] = "four";
                $array_methods[2] = "eight";
            }
        } else {
            $array_methods[1] = null;
            $array_methods[2] = null;
        }

        array_unshift($params, $array_methods[2]);
        array_unshift($params, $array_methods[1]);
        array_unshift($params, $array_methods[0]);

        return call_user_func_array('static::create', $params);

    }

    /**
     * Add element
     *
     * @access public
     * @param string $title Title of element
     * @param string $text Text of element
     * @param boolean $active If element is active
     * @param array $attributes Attributes of element
     * @return Tabs
     */
    public function add($title, $text = null, $active = false, $attributes = array())
    {
        $this->elements[] = array(
            "title" => e($title),
            "text" => $text,
            "active" => $active,
            "attributes" => $attributes
        );

        return $this;
    }

    /**
     * Display tabs
     *
     * @access public
     * @return string
     */
    public function show()
    {
        if (empty($this->elements)) {
            return null;
        }

        // nav
        $nav = '<ul class="tab-nav';

        // vertical
        if ($this->class == "vertical" && $this->links_columns != null) {
           $nav .= ' '.$this->links_columns.' columns';
        }

        $nav .= '">';

        // links
        foreach ($this->elements as $element) {
            $nav .= '<li';

            // active
            if ($element['active'] === true) {
                $nav .= ' class="active" ';
            }

            $nav .= '><a href="#">'.$element['title'].'</a></li>';
        }

        $nav .= '</ul>';

        // content
        $content = null;
        foreach ($this->elements as $element) {

            // class of content
            $_class = "tab-content";

            // active
            if ($element['active'] === true) {
                $_class .= ' active';
            }

            // vertical
            if ($this->class == "vertical" && $this->content_columns != null) {
                $_class .= ' '.$this->content_columns.' columns'; 
            }

            // attributes
            $_attributes = Helpers::addClass($element['attributes'], $_class);

            $content .= '<div'.HTML::attributes($_attributes).'>'.$element['text'].'</div>';
        }


        // return
        $res = null;

        // vertical
        if ($this->class == "vertical") {
            $res .= '<div class="row">';
        }

        // attributes
        $attributes = Helpers::addClass($this->attributes, $this->class." tabs");

        $res .= '<div'.HTML::attributes($attributes).'>';

        if ($this->class == "bottom") {
            $res .= $content . $nav;
        } else {
            $res .= $nav . $content;
        }

        $res .= '</div>';

        // vertical
        if ($this->class == "vertical") {
            $res .= '</div>';
        }

        return $res;
    }
}