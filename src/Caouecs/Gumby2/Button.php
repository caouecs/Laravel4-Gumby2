<?php namespace Caouecs\Gumby2;

use \HTML;

class Button extends Core {

    /**
     * Tag of button
     *
     * @access protected
     * @var string
     */
    protected $tag = 'div';

    /**
     * Class of button
     *
     * @access protected
     * @var string
     */
    protected $class = 'default';

    /**
     * Message in button
     *
     * @access protected
     * @var string
     */
    protected $message = null;

    /**
     * Attributes of button
     *
     * @access protected
     * @var array
     */
    protected $attributes = array();

    /**
     * Icon of button
     *
     * @access protected
     * @var string
     */
    protected $icon = null;

    /**
     * Link of button
     *
     * @access protected
     * @var string
     */
    protected $link = null;

    /**
     * Construct
     *
     * @access public
     * @param string $class Class of button
     * @param string $message Message in button
     * @param array $attributes Attributes of button
     * @return void
     */
    public function __construct($class, $message = '', $attributes = array())
    {
        if (ctype_alpha(str_replace(array("-", "_", " "), "", $class))) {
            $this->class = $class;
        }

        $this->message = $message;

        if (!empty($attributes) && is_array($attributes)) {
            $this->attributes = $attributes;
        }
    }

    /**
     * Create a new Button
     *
     * @access protected
     * @param string $class Class of button
     * @param string $message Message in button
     * @param array $attributes Attributes of button
     * @return Button
     */
    protected static function create($class, $message = '', $attributes = array())
    {
        return new Button($class, $message, $attributes);
    }

    /**
     * Call an button
     *
     * @access public
     * @param string $method Method called
     * @param array $params Params of method
     * @return Button
     */
    public static function __callStatic($method, $params = array())
    {
        $class = null;

        $array_methods = explode("_", $method);

        $array_styles = array("oval", "rounded", "squared", "pillleft", "pillright");

        foreach ($array_methods as $method) {

            // size
            if (in_array($method, Helpers::$sizes)) {
                $class['size'] = $method;

            // color
            } elseif (in_array($method, Helpers::$colors)) {
                if ($method == "normal") {
                    $method = "default";
                }

                $class['color'] = $method;

            // design
            } elseif (in_array($method, Helpers::$designs)) {
                $class['design'] = $method;


            // style
            } elseif (in_array($method, $array_styles)) {
                if ($method == "pillleft") {
                    $method = "pill-left";
                } elseif ($method == "pillright") {
                    $method = "pill-right";
                }

                $class['style'] = $method;
            }
        }

        // color by default if not defined
        if (!isset($class['color'])) {
            $class['color'] = "default";
        }

        // size by default if not defined
        if (!isset($class['size'])) {
            $class['size'] = "medium";
        }

        array_unshift($params, implode(" ", $class));

        return call_user_func_array('static::create', $params);
    }

    /**
     * Create a custom button
     *
     * @access public
     * @param string $class Class custom of button
     * @param string $message Message in button
     * @param array $attributes Attributes of button
     * @return Button
     */
    public static function custom($class, $message, $attributes = array())
    {
        return static::create($class, $message, $attributes);
    }

    /**
     * Add icon at left
     *
     * @access public
     * @param string $icon Name of icon
     * @param boolean $append Situation of icon (true = before, false = after)
     * @return Button
     */
    public function appendIcon($icon, $append = true)
    {
        if (ctype_alpha(str_replace("-", "", $icon))) {
            $icon = " entypo icon-".e($icon);

            if ($append == true) {
                $icon .= " icon-left ";
            } else {
                $icon .= " icon-right ";
            }

            $this->icon = $icon;
        }

        return $this;
    }

    /**
     * Add icon at right
     *
     * @access public
     * @param string $icon Name of icon
     * @return Button
     */
    public function prependIcon($icon)
    {
        return $this->appendIcon($icon, false);
    }

    /**
     * Add link to message
     *
     * @access public
     * @param string $url Url of link
     * @return Button
     */
    public function link($url)
    {
        $this->link = $url;

        return $this;
    }

    /**
     * Update tag
     *
     * @access public
     * @param string $tag Tag
     * @return Button
     */
    public function tag($tag)
    {
        if (ctype_alpha($tag)) {
            $this->tag = $tag;
        }

        return $this;
    }

    /**
     * Display button
     *
     * @access public
     * @return string
     */
    public function show()
    {
        $class = $this->class;

        if ($this->icon != null) {
            $class .= $this->icon;
        }

        // link
        if ($this->link != null) {
            $_message = '<a href="'.$this->link.'">'.$this->message.'</a>';
        } else {
            $_message = $this->message;
        }

        $attributes = Helpers::addClass($this->attributes, $class.' btn');

        return '<'.$this->tag.HTML::attributes($attributes).'>'.$_message.'</'.$this->tag.'>';
    }
}