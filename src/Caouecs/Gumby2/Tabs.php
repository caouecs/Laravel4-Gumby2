<?php namespace Caouecs\Gumby2;

use \HTML;

class Tabs {

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
     * Call an tabs
     *
     * @access public
     * @param string $method Method called
     * @param array $params Params of method
     * @return \Tabs
     */
    public static function __callStatic($method, $params)
    {
        $array_classes = array("normal", "pill", "vertical");
        $array_columns = array("one", "two", "three", "four", "five", "six", "seven", "eight", "nine", "ten", "eleven", "twelve", "thirteen", "fourteen", "fifteen", "sixteen");

        $array_methods = explode("_", $method);

        // class
        if (!in_array($array_methods[0], $array_classes))
            return null;

        if ($array_methods[0] == "normal")
            $array_methods[0] = null;

        // vertical, you must indicate columns of ul and div
        if ($array_methods[0] == "vertical") {
            if ( !isset($array_methods[1]) or !isset($array_methods[2]) or !in_array($array_methods[1], $array_columns) or !in_array($array_methods[2], $array_columns)) {
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

        return call_user_func_array('static::show', $params);

    }

    /**
     * Create a new Tabs
     *
     * @access protected
     * @param string $class Name of class
     * @param string $links_columns Number of columns of links for vertical tabs
     * @param string $content_columns Number of columns of content for vertical tabs
     * @param array $attributes Attributes of tabs
     * @return \Tabs
     */
    protected static function show($class, $links_columns = '', $content_columns = '', $attributes = array())
    {
        $tabs = new Tabs;

        $tabs->class = $class;
        $tabs->links_columns = $links_columns;
        $tabs->content_columns = $content_columns;
        $tabs->attributes = $attributes;

        return $tabs;
    }

    /**
     * Add element
     *
     * @access public
     * @param string $title Title of element
     * @param string $text Text of element
     * @param boolean $active If element is active
     * @return \Tabs
     */
    public function add($title, $text = null, $active = false)
    {
        $this->elements[] = array("title" => e($title), "text" => (string) $text, "active" => $active);

        return $this;
    }

    /**
     * Display tabs
     *
     * @access public
     * @return string
     */
    public function __toString()
    {
        if (empty($this->elements)) {
            return null;
        }

        $res = null;

        $attributes = Helpers::add_class($this->attributes, $this->class." tabs");

        if ($this->class == "vertical")
            $res .= '<div class="row">';

        $res .= '<div'.HTML::attributes($attributes).'>
            <ul class="tab-nav';

        // vertical
        if ($this->class == "vertical" && $this->links_columns != null) {
            $res .= ' '.$this->links_columns.' columns';
        }

        $res .= '">';

        // links
        foreach ($this->elements as $element) {
            $res .= '<li';

            // active
            if ($element['active'] === true) {
                $res .= ' class="active" ';
            }

            $res .= '><a href="#">'.$element['title'].'</a></li>';
        }

        $res .= '</ul>';

        // content
        foreach ($this->elements as $element) {
            $res .= '<div class="tab-content';

            // active
            if ($element['active'] === true) {
                $res .= ' active';
            }

            // vertical
            if ($this->class == "vertical" && $this->content_columns != null) {
                $res .= ' '.$this->content_columns.' columns'; 
            }

            $res .= '">'.$element['text'].'</div>';
        }

        $res .= '</div>';

        if ($this->class == "vertical") {
            $res .= '</div>';
        }

        return $res;
    }
}