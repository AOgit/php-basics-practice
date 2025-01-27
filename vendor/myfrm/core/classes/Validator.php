<?php

namespace myfrm;


class Validator {

    protected $errors = [];
    protected $rules_list = ['required', 'min', 'max', 'email'];
    protected $messages = [
        'required' => 'The :fieldname: is required!',
        'min' => ':fieldname: field must be minimum :rulevalue: characters!',
        'max' => ':fieldname: field must be maximum :rulevalue: characters!',
        'email' => 'Not valid Email',
    ];

    public function validate($data = [], $rules = [])
    {
       // print_arr($data);
       // print_arr($rules);
       foreach ($data as $fieldname => $value)
       {
            if (in_array($fieldname, array_keys($rules)))
            {
                // dump($fieldname);
                $this->check(
                        [
                            'fieldname' => $fieldname,
                            'value' => $value,
                            'rules' => $rules[$fieldname],
                        ]
                    );
            }
       }

       return $this;
    }

    protected function check ($field)
    {
        // print_arr($field);
        foreach($field['rules'] as $rule => $rule_value)
            {
                if (in_array($rule, $this->rules_list))
                {
                    if (!call_user_func_array([$this, $rule], [$field['value'], $rule_value]))
                    {
                        // echo "{$field['fieldname']}: {$rule} - fail! <br>";
                        // echo "{$field['fieldname']}: {$rule} - sucess! <br>";

                        $this->addError($field['fieldname'],
                            str_replace(
                                [':fieldname:', ':rulevalue:'],
                                [$field['fieldname'], $rule_value],
                                $this->messages[$rule])
                            );
                    }
                }
            }
    }

    protected function addError($fieldname, $error)
    {
        $this->errors[$fieldname][] = $error;
    }

    public function getErrors()
    {
        return $this->errors;
    }

    public function hasErrors()
    {
        return !empty($this->errors);
    }

    protected function required($value, $rule_value)
    {
        // var_dump(__METHOD__, $value, $rule_value);
        return !empty(trim($value));
    }

    protected function min($value, $rule_value)
    {
        // var_dump(__METHOD__, $value, $rule_value);
        return mb_strlen($value, 'UTF-8') >= $rule_value;
    }

    protected function max($value, $rule_value)
    {
        // var_dump(__METHOD__, $value, $rule_value);
        return mb_strlen($value, 'UTF-8') <= $rule_value;
    }

    protected function email($value, $rule_value)
    {
        // var_dump(__METHOD__, $value, $rule_value);
        return filter_var($value, FILTER_VALIDATE_EMAIL);
    }



}
