<?php
namespace Application\Validator;
use Application\Validator\Rule;

class Validator{
    public $_instances = [];
    public $hasError = false;

    function __construct($fields)
	{
        foreach ($fields as $key => $field) {
            $this->_instances[] = new Rule(...$field);
        }
    }

    function checkFields()
	{
        $this->hasError = false;
        $instances = $this->_instances;
        foreach ($instances as $key => $rule) {
            if($rule->check()) {
                $this->$hasError = true;
            }
        }
        return $this->$hasError;
    }

}