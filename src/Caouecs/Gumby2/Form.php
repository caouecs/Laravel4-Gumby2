<?php namespace Caouecs\Gumby2;

class Form extends \Illuminate\Support\Facades\Form {

    static public function label($name, $value = null, $options = array())
    {
        return parent::label($name, $value, Helpers::addClass($options, "inline"));
    }

    static public function text($name, $value = null, $options = array())
    {
        return parent::text($name, $value, Helpers::addClass($options, "wide text input"));
    } 

    static public function password($name, $options = array())
    {
        return parent::password($name, Helpers::addClass($options, "wide password input"));
    }
}