<?php namespace Caouecs\Gumby2;

use \HTML;

/**
 * Display text
 *
 * @todo add lead and fittext
 */
class Typography extends Core {

    /**
     * Class of text
     *
     * @access protected
     * @var string
     */
    protected $class = 'default';

    /**
     * Tag of text
     *
     * @access protected
     * @var string
     */
    protected $tag = "p";

    /**
     * Message
     *
     * @access protected
     * @var string
     */
    protected $message = null;

    /**
     * Attributes of text
     *
     * @access protected
     * @var array
     */
    protected $attributes = array();

    /**
     * Construct
     *
     * @access public
     * @param string $class Class of text
     * @param string $message Message in text
     * @param array $attributes Attributes of text
     * @return void
     */
    public function __construct($class, $message = null, $attributes = array())
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
     * Create a new Typography
     *
     * @access protected
     * @param string $class Class of text
     * @param string $message Message in text
     * @param array $attributes Attributes of text
     * @return Typography
     */
    protected static function create($class, $message, $attributes = array())
    {
        return new Typography($class, $message, $attributes);
    }

    /**
     * Create an text by color
     *
     * @access public
     * @param string $method Method called
     * @param array $params Params of method
     * @return Typography
     */
    public static function __callStatic($method, $params)
    {
        // verif if color exists
        if (!in_array($method, Helpers::$colors) || $method == "normal") {
            $method = "default";
        }

        array_unshift($params, $method);

        return call_user_func_array('static::create', $params);
    }

    /**
     * Create a custom Typography
     *
     * @access public
     * @param string $class Class custom of typography
     * @param string $message Message in typography
     * @param array $attributes Attributes of typography
     * @return Typography
     */
    public static function custom($class, $message, $attributes = array())
    {
        return static::create($class, $message, $attributes);
    }

    /**
     * Update tag
     *
     * @access public
     * @param string $tag Tag
     * @return Typography
     */
    public function tag($tag)
    {
        if (ctype_alpha($tag)) {
            $this->tag = $tag;
        }

        return $this;
    }

    /**
     * Display typography
     *
     * @access public
     * @return string
     */
    public function show()
    {
        $attributes = Helpers::addClass($this->attributes, 'text-'.$this->class);

        return '<'.$this->tag.HTML::attributes($attributes).'>'.$this->message.'</'.$this->tag.'>';
    }
}