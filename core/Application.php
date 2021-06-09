<?php

namespace app\core;


/*
 * this class have to roles :
 *      1 -> create an instance to all attribute
 *      2 -> the method run which handle all [ get & post ] request
 */

class Application
{

    public static $app;
    public  $router;
    public  $request;
    public  $response;

    public function __construct($ROOT_PATH)
    {
        self::$app      = $this;
        $this->request  = new Request();
        $this->response = new Response();
        $this->router   = new Router($this->request,$this->response,$ROOT_PATH);
    }

    public function run()
    {
        echo $this->router->resolve();
    }


}