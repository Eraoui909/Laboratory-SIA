<?php

namespace app\core;


class Router
{

    protected $routes;
    protected $request;
    protected $response;
    protected $ROOT_PATH;

    public function __construct(Request $re,Response $resp,$ROOT_PATH)
    {
        $this->request      = $re;
        $this->response     = $resp;
        $this->ROOT_PATH    = $ROOT_PATH;
    }

    public function get($path,$callback)
    {
        $this->routes["GET"][$path] = $callback;
    }

    public function post($path,$callback)
    {
        $this->routes["POST"][$path] = $callback;
    }

    public function resolve()
    {

        $path       = $this->request->getPath();
        $method     = $this->request->getMethod();
        $callback   = $this->routes[$method][$path]??false;

        if($callback === false)
        {
            $this->response->setHTTPResponseCode(404);
            return $this->viewRender("__404");
        }else if(is_string($callback)){
            return $this->viewRender($callback);
        }else if(is_array($callback)){
            $callback[0] = new $callback[0];
        }

        return call_user_func($callback,$this->request);

    }

    public function viewRender($view,$params = [])
    {
        $mainView   = $this->mainLayoutContent();
        $currentView    = $this->viewContent($view,$params);
        return str_replace("{{ content }}",$currentView,$mainView);
    }

    protected function mainLayoutContent()
    {
        ob_start();
        include_once $this->ROOT_PATH."/Views/masterLayout/main.php" ;
        return ob_get_clean();
    }

    protected function viewContent($view,$params)
    {
        foreach ($params as $key => $value)
        {
            $$key = $value;
        }
        ob_start();
        if(file_exists($this->ROOT_PATH . "/Views/".$view.".php")){
            include_once $this->ROOT_PATH . "/Views/".$view.".php";
        }else{
            include_once $this->ROOT_PATH . "/Views/__404.php";
        }
        return ob_get_clean();
    }
}