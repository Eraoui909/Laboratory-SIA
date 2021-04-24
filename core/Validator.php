<?php


namespace app\core;


class Validator
{

    public function require(array $data)
    {
        $errors = array();
        foreach($data as $key => $value)
        {
            echo $key." => ".$value . "<br>";
            //echo gettype($value);
            if(empty($value))
            {
                $errors[] = $key . " is required";
            }
        }
        return $errors;
    }
}