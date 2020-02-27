<?php
namespace Application\Validator;

class Field
{
    public $name;
    public $value;
    public $type;
    public $error = null;

    public function __construct($name = null, $value = null, $type = null, $min_value = 3, $max_value = 40, $reg_exp = null)
    {
        $this->name = $name;
        $this->value = $value;
        $this->type = $type;

        if (isset($min_value)) {
            $this->min_length = (object) [];
            $this->min_length->value = $min_value;
            $this->min_length->error_message = "Поле имеет длину меньше $min_value симолов";
        }
        if (isset($max_value)) {
            $this->max_length = (object) [];
            $this->max_length->value = $max_value;
            $this->max_length->error_message = "Поле имеет длину больше $max_value симолов";
        }
        if (isset($reg_exp)) {
            $this->match = (object) [];
            $this->match->value = $reg_exp->value;
            $this->match->error_message = $reg_exp->error_message;
        }
    }

    public function check()
    {
        $this->error = null;

        switch ($this->type) {
            case'email':
                $checked_email = filter_var(
                    $this->value,
                    FILTER_VALIDATE_EMAIL
                );
                if ($checked_email != $this->value) {
                    $this->error = 'Почта имеет неправильный формат';
                }

                break;

            default:
                $rules = [];

                if (isset($this->min_length)) {
                    $rules[] = 'min_length';
                }
                if (isset($this->max_length)) {
                    $rules[] = 'max_length';
                }
                if (isset($this->match)) {
                    $rules[] = 'match';
                }

                foreach ($rules as $key => $rule) {
                    if ($rule == 'min_length') {
                        if ($this->min_length->value > strlen($this->value)) {
                            $this->error = $this->min_length->error_message;

                            break;
                        }
                    } elseif ($rule == 'max_length') {
                        if ($this->max_length->value < strlen($this->value)) {
                            $this->error = $this->max_length->error_message;

                            break;
                        }
                    } elseif ($rule == 'match') {
                        $field_after_test = filter_var(
                            $this->value,
                            FILTER_VALIDATE_REGEXP,
                            [
                                'options' => ['regexp' => $this->match->value],
                            ]
                        );
                        if (!$field_after_test) {
                            $this->error = $this->match->error_message;

                            break;
                        }
                    }
                }

                break;
        }

        if (isset($this->error)) {
            return true;
        }

        return false;
    }

    public function hasConfirmError($valueToConfirm)
    {
        $this->error = null;

        if ($this->value != $valueToConfirm) {
            $this->error = 'Поля не совпадают';
        }

        if (isset($this->error)) {
            return true;
        }

        return false;
    }
}
