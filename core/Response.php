<?php


namespace app\core;


class Response
{

    public function setHTTPResponseCode($code)
    {
        http_response_code($code);
    }

}