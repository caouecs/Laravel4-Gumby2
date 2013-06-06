<?php

namespace Caouecs\Gumby2;

class Icon {

    /**
     * Name of icon
     *
     * @access protected
     * @var string
     */
    protected $name;


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

        $icon->name = (string) $name;

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
        return '<i class="icon-'.(string) $this->name.'"></i>';
    }
}
