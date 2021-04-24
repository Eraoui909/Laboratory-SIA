<?php

namespace app\core;

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