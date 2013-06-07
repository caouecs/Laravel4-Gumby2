<?php

namespace Caouecs\Gumby2;

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
     * Call an icon
     *
     * @access public
     * @param string $method Method called
     * @param array $params Params of method
     * @return string
     */
    public static function __callStatic($method, $params)
    {
        return self::show($method);
    }

    /**
     * Create a new Icon
     *
     * @access public
     * @param string $name Name of icon
     * @return \Icon
     */
    public static function show($name)
    {
        $icon = new Icon;

        $icon->name = e($name);

        return $icon;
    }

    /**
     * Display icon
     *
     * @access public
     * @return string
     */
    public function __toString()
    {
        if ($this->link != null)
            return '<a href="'.$this->link.'"><i class="icon-'.$this->name.'"></i></a>';

        return '<i class="icon-'.$this->name.'"></i>';
    }
}
