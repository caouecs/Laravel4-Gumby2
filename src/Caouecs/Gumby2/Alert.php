<?php namespace Caouecs\Gumby2;

class Alert extends Indicator {

    /**
     * Type of indicator
     *
     * @access protected
     * @var string
     */
    protected $type = "alert";

    /**
     * Tag
     *
     * @access protected
     * @var string
     */
    protected $tag = "div";

    /**
     * Close
     *
     * @access protected
     * @var boolean
     */
    protected $close = false;

    /**
     * Create a new Alert
     *
     * @access protected
     * @param string $class Class of indicator
     * @param string $message Message in indicator
     * @param array $attributes Attributes of indicator
     * @return \Alert
     */
    protected static function show($class, $message, $attributes = array())
    {
        $indicator = new Alert;

        $indicator->class = $class;
        $indicator->message = $message;
        $indicator->attributes = $attributes;

        return $indicator;
    }

    /**
     * Add link for close
     *
     * @access public
     * @return \Alert
     */
    public function close()
    {
        $this->close = true;

        return $this;
    }

    /**
     * Display Alert
     *
     * @access public
     * @return string
     */
    public function __toString()
    {
        // number for close and multi alert
        $drawer_id = rand(1, 15);

        $attributes = Helpers::add_class($this->attributes, $this->class.' '.$this->type.' alert_'.$drawer_id);

        $res = '<'.$this->tag.HTML::attributes($attributes).'>';

        // close
        if ($this->close === true) {
            $res .= '<a href="#" gumby-trigger=".alert_'.$drawer_id.'" class="switch close">&times;</a>';
        }

        $res .= $this->message.'</'.$this->tag.'>';
    }
}