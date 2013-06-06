<?php

namespace Caouecs\Gumby2;
use \HTML;

class Tabs {

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
     * Create a new Tabs
     *
     * @access public
     * @param array $attributes Attributes of tabs
     * @return \Tabs
     */
    public static function show($attributes = array())
    {
        $tabs = new Tabs;

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
        $this->elements[] = array("title" => (string) $title, "text" => (string) $text, "active" => $active);

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

        $attributes = Helpers::add_class($this->attributes, "tabs");

        $res = '<div'.HTML::attributes($attributes).'>
            <ul class="tab-nav">';

        foreach ($this->elements as $element)
        {
            $res .= '<li';
            if ($element['active'] === true)
                $res .= ' class="active"';
            $res .= '><a href="#">'.$element['title'].'</a></li>';
        }

        $res .= '</ul>';

        foreach ($this->elements as $element) {
            $res .= '<div class="tab-content';
            if ($element['active'] === true)
                $res .= ' active';
            $res .= '">'.$element['text'].'</div>';
        }

        $res .= '</div>';

        return $res;
    }
}
