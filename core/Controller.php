<?php


namespace app\core;


class Controller
{
    public function render($view,$params)
    {
        $app = Application::$app;
        return $app->router->viewRender($view, $params);
    }

    public function renderAdmin($view, $params)
    {
        $app = Application::$app;
        return $app->router->viewRenderAdmin($view, $params);
    }

    public function renderEmpty($view, $params)
    {
        $app = Application::$app;
        return $app->router->viewRenderEmpty($view, $params);
    }
}