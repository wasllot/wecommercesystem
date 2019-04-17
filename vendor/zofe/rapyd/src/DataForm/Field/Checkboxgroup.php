<?php  namespace Zofe\Rapyd\DataForm\Field;

use Collective\Html\FormFacade as Form;

class Checkboxgroup extends Field
{
    public $type = "checks";
    public $multiple = true;
    public $size = null;
    public $description = "";
    public $separator = "&nbsp;&nbsp;";
    public $format = "%s";
    public $css_class = "checkbox";
    public $checked_value = 1;
    public $unchecked_value = 0;
    public $clause = "wherein";

    public function separator($separator)
    {
        $this->separator = $separator;
    }

    public function getValue()
    {
        parent::getValue();

        if (is_array($this->value)) {
            $this->values = $this->value;
        }
        else {
            $this->values = explode($this->serialization_sep, $this->value);
        }

        $description_arr = array();
        foreach ($this->options as $value => $description) {
            if (in_array($value, $this->values)) {
                $description_arr[] = $description;
            }
        }
        $this->description = implode($this->separator, $description_arr);
    }

    public function build()
    {
        $output = "";

        if (!isset($this->style)) {
            $this->style = "margin:0 2px 0 0; vertical-align: middle";
        }
        unset($this->attributes['id']);
        if (parent::build() === false) return;

        switch ($this->status) {
            case "disabled":
            case "show":
                if (!isset($this->value)) {
                    $output = $this->layout['null_label'];
                } else {
                    $output = $this->description;
                }
                $output = "<div class='help-block'>".$output."&nbsp;</div>";
                break;

            case "create":
            case "modify":

                //dd($this->options, $this->values);
                foreach ($this->options as $val => $label) {

                    $this->checked = in_array($val, $this->values);

                    $output .= sprintf($this->format, "<div class=\"cg__item\"><label>" . Form::checkbox($this->name.'[]', $val, $this->checked) . $label . "</label></div>");
                }
                $output .= $this->extra_output;

                break;

            case "hidden":
                $output = Form::hidden($this->name, $this->value);
                break;

            default:
        }
        $this->output = $output;
    }

}
