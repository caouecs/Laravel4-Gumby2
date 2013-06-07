<?php

namespace Caouecs\Gumby2;
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
     * Number of columns of ul for vertical tabs
     *
     * @access protected
     * @var string
     */
    protected $ul = null;

    /**
     * Number of columns of div for vertical tabs
     *
     * @access protected
     * @var string
     */
    protected $div = null;

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
        $class = null;

        $array_classes = array("normal", "pill", "vertical");
        $array_columns = array("one", "two", "three", "four", "five", "six", "seven", "eight", "nine", "ten", "eleven", "twelve", "thirteen", "fourteen", "fifteen", "sixteen");

        $array_methods = explode("_", $method);

        // class
        if (!in_array($array_methods[0], $array_classes))
            return null;

        if ($array_methods[0] == "normal")
            $array_methods[0] = null;

        $class['class'] = $array_methods[0];


        // vertical, you must indicate columns of ul and div
        if ($array_methods[0] == "vertical")
        {
            if (isset($array_methods[1]) && in_array($array_methods[1], $array_columns) && isset($array_methods[2]) && in_array($array_methods[2], $array_columns))
            {
                $class['ul'] = $array_methods[1];
                $class['div'] = $array_methods[2];
            }
            else
            {
                $class['ul'] = "four";
                $class['div'] = "eight";
            }
        }
        else
        {
            $class['ul'] = null;
            $class['div'] = null;
        }

        array_unshift($params, implode(" ", $class));

        return call_user_func_array('static::show', $params);

    }

    /**
     * Create a new Tabs
     *
     * @access private
     * @param string $class Name of class
     * @param string $ul Number of columns of ul for vertical tabs
     * @param string $div Number of columns of div for vertical tabs
     * @param array $attributes Attributes of tabs
     * @return \Tabs
     */
    private static function show($class, $ul = '', $div = '', $attributes = array())
    {
        $tabs = new Tabs;

        $tabs->class = $class;
        $tabs->ul = $ul;
        $tabs->div = $div;
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
        if (empty($this->elements))
            return null;

        $attributes = Helpers::add_class($this->attributes, $this->class." tabs");

        $res = '<div'.HTML::attributes($attributes).'>
            <ul class="tab-nav';
        // vertical
        if ($this->class == "vertical" && $this->ul != null)
            $res .= ' '.$this->ul.' columns';

        $res .= '">';

        foreach ($this->elements as $element)
        {
            $res .= '<li';
            // active
            if ($element['active'] === true)
                $res .= ' class="active" ';
            $res .= '><a href="#">'.$element['title'].'</a></li>';
        }

        $res .= '</ul>';

        foreach ($this->elements as $element) {
            $res .= '<div class="tab-content';
            if ($element['active'] === true)
                $res .= ' active';
            // vertical
            if ($this->class == "vertical" && $this->div != null)
                $res .= ' '.$this->div.' columns'; 
            $res .= '">'.$element['text'].'</div>';
        }

        $res .= '</div>';

        return $res;
    }
}
