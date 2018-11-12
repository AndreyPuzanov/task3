<?php

class Validation
{
    private $rules = [];
    private $data = [];
    public $valid_data = [];
    public $errors = [];

    public function __construct(array $rules, array $data)
    {
        $this->data = $data;
        $this->rules = $rules;

        $this->length();
        $this->isInt();
        $this->isEmail();
    }

    public function length()
    {
        foreach ($this->rules as $rule => $val){
            foreach ($this->data as $key => $value){
                if($rule == $key){
                    if ($value == '') {
                        $this->errors[$key] = $key . ' поле пустое !';
                    } elseif($val['maxLength'] < strlen($value)){
                        $this->errors[$key] = $key . ' большое кол-во символов ?';
                    } elseif ($val['minLength'] > strlen($value)){
                        $this->errors[$key] = $key . ' вы что то написали ?';
                    } else {
                        if($val['type'] == 'email'){
                            continue;
                        } else {
                            $this->valid_data[$key] = $value;
                        }
                    }
                }
            }
        }

        return $this->errors;
    }

    public function isInt()
    {
        foreach ($this->rules as $rule => $val){
            foreach ($this->data as $key => $value){
                if($rule == $key){
                    if($val['type'] == 'int'){
                        if(!is_int($value)){
                            $this->errors[$key] = $key . ' недопустимые символы !';
                        } else {
                            $this->valid_data[$key] = $value;
                        }
                    }
                }
            }
        }
        return $this->errors;
    }

    public function isEmail()
    {
        foreach ($this->rules as $rule => $val){
            foreach ($this->data as $key => $value){
                if($rule == $key){
                    if($val['type'] == 'email'){
                        if(!empty($this->errors['email'])){
                            continue;
                        } else {
                            if(filter_var($value, FILTER_VALIDATE_EMAIL)){
                                $this->valid_data[$key] = $value;
                            } else {
                                $this->errors[$key] = $key . ' неверно введен email !';
                            }
                        }
                    }
                }
            }
        }
        return $this->errors;
    }
    
    

}