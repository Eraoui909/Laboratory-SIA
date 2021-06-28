<?php


namespace app\core;


class Validator
{

    public function require(array $data)
    {
        $errors = array();
        foreach($data as $key => $value)
        {
            //echo $key." => ".$value . "<br>";
            //echo gettype($value);
            if(empty($value))
            {
                $keyy = explode('_',$key);
                $keyyy= implode(' ',$keyy);
                $errors[$key] = $keyyy . " is required";
            }
        }
        return $errors;
    }

    public function sanitize(array $data)
    {
        $params = array();
        foreach ($data as $key => $value)
        {
            //echo $key." => ".$value . "<br>";
            $value = filter_var($value,FILTER_SANITIZE_SPECIAL_CHARS);
            if($key == "email"){
                $value = filter_var($value,FILTER_SANITIZE_EMAIL);
            }

            $params[$key] = $value;
        }
        return $params;
    }

    public function passwordsIdentique($pass1,$pass2)
    {
        ($pass1 == $pass2)?$test=true:$test=false;
        return $test;
    }
}