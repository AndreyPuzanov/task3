<?php

class Validation
{
    private $rules = [];
    private $data = [];
    public $errors = [];

    public function __construct(array $rules, array $data)
    {
        $this->data = $data;
        $this->rules = $rules;

        $this->empty();
        //$this->length();
        $this->final();

        echo '<pre>';
        print_r($this->data);
    }

    public function empty()
    {
        foreach ($this->data as $key => $value){
            if(empty($value)){
                $this->errors[] = array($key => ' поле пустое!');
            }
        }

        return $this->errors;
    }

    public function length()
    {
        foreach ($this->rules as $rule => $val){
            foreach ($this->data as $key => $value){
                if($rule == $key){
                    if($val['maxLength'] < strlen($value)){
                        $this->errors[] = array($key => ' большое кол-во символов!');
                    } elseif (($val['minLength'] > strlen($value))){
                        $this->errors[] = array($key => ' вы что то написали ?');
                    }
                }
            }
        }

        return $this->errors;
    }

    public function final()
    {
//        foreach ($this->rules as $rule => $val){
//            foreach ($this->data as $key => $value){
//                if($rule == $key){
//                    if($val['type'] == 'int'){
//                        if(!is_int($value)){
//                            $this->errors[] = array($key => ' недопустимые символы!');
//                        }
//                    }
//                }
//            }
//        }
//        return $this->errors;
    }

}