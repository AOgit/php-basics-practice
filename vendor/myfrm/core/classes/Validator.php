<?php

namespace myfrm;


class Validator {

    protected $errors = [];
    protected $data_items;
    protected $rules_list = ['required', 'min', 'max', 'email', 'match', 'unique', 'ext', 'size'];
    protected $messages = [
        'required' => 'The :fieldname: is required!',
        'min' => ':fieldname: field must be minimum :rulevalue: characters!',
        'max' => ':fieldname: field must be maximum :rulevalue: characters!',
        'email' => 'Not valid Email',
        'match' => 'The :fieldname: field must match :rulevalue: field',
        'unique' => 'The :fieldname: is already taken',
        'ext' => 'File :fieldname: extention does not match. Allowed :rulevalue:',
        'size' => 'File :fieldname: is too big. Allowed :rulevalue: bytes',

    ];

    public function validate($data = [], $rules = [])
    {
        $this->data_items = $data;
    //    print_arr($data);
    //    print_arr($rules);
       foreach ($data as $fieldname => $value)
       {
            if (isset($rules[$fieldname]))
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

    public function listErrors($fieldname)
    {
       $output = '';
       if (isset($this->errors[$fieldname]))
       {
        $output .= "<div class='invalid-feedback d-block'><ul class='list-unstyled'>";
        foreach ($this->errors[$fieldname] as $error) {
            $output .= "<li>{$error}</li>";
        }
        $output .= "</ul></div>";
       }
       return $output;
    }

    protected function required($value, $rule_value)
    {
        // var_dump(__METHOD__, $value, $rule_value);
        return !empty($value);
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

    protected function match($value, $rule_value)
    {
        // var_dump($this->data_items[$rule_value]);
        return $value === $this->data_items[$rule_value];
    }

    protected function unique($value, $rule_value)
    {
        // dump($value);
        // dd($rule_value);
        $data = explode(":", $rule_value);
        return (!db()->query("SELECT {$data[1]} FROM {$data[0]} WHERE {$data[1]} = ?", [$value])->getColumn());
    }

    protected function ext($value, $rule_value)
    {
        if(empty($value['name'])){
            return true;
        }
        $file_ext = get_file_ext($value['name']);
        $allowed_exts = explode('|', $rule_value);
        return in_array($file_ext, $allowed_exts);
    }

    protected function size($value, $rule_value)
    {
        if(empty($value['size'])){
            return true;
        }
        return $value['size'] <= $rule_value;
    }
}
