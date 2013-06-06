<?php

namespace Caouecs\Gumby2;
use \HTML;

class Breadcrumb {

    /**
     * Elements of breadcrumb
     *
     * @access protected
     * @var array
     */
    protected $elements = array();
 
    /**
     * Attributes of breadcrumb
     *
     * @access protected
     * @var array
     */
    protected $attributes = array();

    /**
     * Create a new Breadcrumb
     *
     * @access public
     * @param array $attributes Attributes of breadcrumb
     * @return \Breadcrumb
     */
    public static function show($attributes = array())
    {
        $breadcrumb = new Breadcrumb;

        $breadcrumb->attributes = $attributes;

        return $breadcrumb;
    }

    /**
     * Add element
     *
     * @access public
     * @param string $title Title of element
     * @param string $url Url of element
     * @return \Breadcrumb
     */
    public function add($title, $url = null)
    {
        $this->elements[] = array("title" => (string) $title, "url" => (string) $url);

        return $this;
    }

    /**
     * Display breadcrumb
     *
     * @access public
     * @return string
     */
    public function __toString()
    {
        if (empty($this->elements))
            return null;

        $attributes = Helpers::add_class($this->attributes, "breadcrumb");

        $res = '<ul'.HTML::attributes($attributes).'>';

        $count = count($this->elements);
        $i = 0;

        foreach ($this->elements as $element)
        {
            $res .= '<li>';
            // url
            if (isset($element['url']) && $element['url'] != null)
                $res .= '<a href="'.$element['url'].'">'.$element['title'].'</a>';
            else
                $res .= $element['title'];
            // divider
            if ($count > ($i+1))
                $res .= ' <span class="divider">/</span>';
            $res .= '</li>';

            $i++;
        }
        $res .= '</ul>';

        return $res;
    }
}
