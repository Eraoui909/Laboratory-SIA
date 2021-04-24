<?php


namespace app\core;


class Controller
{
    public function render($view,$params)
    {
        $app = Application::$app;
        return $app->router->viewRender($view,$params);
    }
}