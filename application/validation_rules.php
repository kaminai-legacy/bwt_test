<?
namespace Validation_Rules;
// класс правил для полей валидации серверной части
class Rules 
{
    public $error = "";

    function __construct($min_value=null, $max_value=null, $reg_exp=null)
	{
        if(isset($min_value))
        {
            $this->min_length =(object)[];
            $this->min_length->value = $min_value;
            $this->min_length->error_message = "Поле имеет длину меньше $min_value симолов";
        }
        if(isset($max_value))
        {
            $this->max_length =(object)[];
            $this->max_length->value = $max_value;
            $this->max_length->error_message = "Поле имеет длину больше $max_value симолов";
        }
        if(isset($reg_exp))
        {
            $this->match =(object)[];
            $this->match->value = $reg_exp->value;
            $this->match->error_message = $reg_exp->error_message;
        }
    }
    
    public function check_field($field)
    {
        $rules = array();
        if(isset($this->min_length))
        {
            $rules[] = 'min_length';
        }
        if(isset($this->max_length))
        {
            $rules[] = 'max_length';
        }
        if(isset($this->match))
        {
            $rules[] = 'match';
        }

        foreach($rules as $value)
        {
            if($value == "min_length")
            {
                if($this->min_length->value > strlen($field))
                {
                    $this->error = $this->min_length->error_message;
                    break;
                }
            }elseif($value == "max_length")
            {
                if($this->max_length->value < strlen($field))
                {
                    $this->error = $this->max_length->error_message;
                    break;
                }
            }elseif($value == "match")
            {
                $field_after_test = filter_var(
					$field, 
					FILTER_VALIDATE_REGEXP, 
					array
					(
						"options" => array("regexp"=>$this->match->value)
					)
                );
                if(!$field_after_test)
                {
                    $this->error = $this->match->error_message;
                    break;
                }
            }
        }
    }

    public function has_error()
    {
        if(strlen($this->error)!=0)
        {
            return true;
        }
        else
        {
            return false;
        }
    }
}

//создание обекта с правилами для полей сервера
$validation_rules = (object)[];

$validation_rules->email = new Rules(3,40);
$validation_rules->name = new Rules(3,40);
$validation_rules->forename = new Rules(3,40);
$reg_exp_for_password = (object)[];
$reg_exp_for_password->value = '/([a-z0-9]){6,}/i';
$reg_exp_for_password->error_message = "Пароль должены быть из цифр или латинских букв";
$validation_rules->password = new Rules(6,40,$reg_exp_for_password);
