<?php
namespace Application\Validator;

class Validator
{
    public $_instances = [];
    public $hasError = false;

    public function __construct($fields)
    {
        foreach ($fields as $key => $field) {
            $this->_instances[] = new Field(...$field);
        }
    }

    public function checkFieldsHasError()
    {
        $this->hasError = false;
        $instances = $this->_instances;
        foreach ($instances as $key => $field) {
            if ($field->check()) {
                $this->$hasError = true;
            }
        }

        return $this->$hasError;
    }

    public function getFields()
    {
        $result = [];
        $instances = $this->_instances;
        foreach ($instances as $key => $field) {
            $result[] = $field;
        }

        return $result;
    }

    public function getFieldByName($field_name)
    {
        $result = null;
        $instances = $this->_instances;
        foreach ($instances as $key => $field) {
            if ($field_name == $field->name) {
                $result = $field;
            }
        }
        if (isset($result)) {
            return $result;
        }

        return 'Поле не найдено';
    }
}
