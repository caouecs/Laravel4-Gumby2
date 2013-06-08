<?php namespace Caouecs\Gumby2;

class Form extends \Illuminate\Support\Facades\Form {

    static public function label($name, $value = null, $options = array())
    {
        return parent::label($name, $value, Helpers::add_class($options, "inline", "class"));
    }

    static public function text($name, $value = null, $options = array())
    {
        return parent::text($name, $value, Helpers::add_class($options, "wide text input", "class"));
    } 

    static public function password($name, $options = array())
    {
        return parent::password($name, Helpers::add_class($options, "wide password input"));
    }
}