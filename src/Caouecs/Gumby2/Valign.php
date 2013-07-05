<?php namespace Caouecs\Gumby2;

use \HTML;

class Valign extends Core {

    /**
     * Attributes of valign
     *
     * @access protected
     * @var array
     */
    protected $attributes = array();

    /**
     * Img of valign
     *
     * @access protected
     * @var string
     */
    protected $img = null;

    /**
     * Text of valign
     *
     * @access protected
     * @var array
     */
    protected $text = array();

    /**
     * Construct
     *
     * @access public
     * @param array $attributes Attributes of valign
     * @return void
     */
    public function __construct($attributes = array())
    {
        if (!empty($attributes) && is_array($attributes)) {
            $this->attributes = $attributes;
        }
    }

    /**
     * Create a new Valign
     *
     * @access public
     * @param array $attributes Attributes of valign
     * @return Valign
     */
    public static function create($attributes = array())
    {
        return new Valign($attributes);
    }

    /**
     * Img of valign
     *
     * @access public
     * @param string $path Path of image
     * @param string $alt Alt of image
     * @param string $class Class on image
     * @param array $attributes Attributes on image
     * @return Valign
     */
    public function img($path, $alt = '', $class = "rounded", $attributes = array())
    {
        $this->img = Image::custom($class, $path, $alt, $attributes);

        return $this;
    }

    /**
     * Text of valign
     *
     * @access public
     * @param string $text Text
     * @param array $attributes Attributes on text
     * @return Valign
     */
    public function text($text, $attributes = array())
    {
        $this->text = array(
            "text" => $text,
            "attributes" => $attributes
        );

        return $this;
    }

    /**
     * Display valign
     *
     * @access public
     * @return string
     */
    public function show()
    {
        if (empty($this->img) || empty($this->text)) {
            return null;
        }

        $attributes = Helpers::addClass($this->attributes, "valign row");

        $res = '<article'.HTML::attributes($attributes).'>';

        // img
        $res .= '<figure>'.$this->img.'</figure>';

        // txt
        $res .= '<div'.HTML::attributes($this->text['attributes']).'>'.$this->text['text'].'</div>';

        $res .= '</article>';

        return $res;
    }
}