<?php


namespace app\core;


class Router
{

    protected $routes;
    protected $request;
    protected $response;
    protected $ROOT_PATH;

    public function __construct(Request $re, Response $resp, $ROOT_PATH)
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

    /**
     * @return false|mixed|string|string[]
     * this method it's the core of Router class, it's trait all request and redirect the user to the right way
     * if ( $callback not found )   => render the __404 page
     * if ( $callback is string )   => this means that the user will redirect to a view directly
     * if ( $callback is array )    => this means that the request will be trait in the controller <$callback[0]>
     *                                 specifically in the method <$callback[1]> inside this controller
     */
    public function resolve()
    {

        $path       = $this->request->getPath();
        $method     = $this->request->getMethod();
        $callback   = $this->routes[$method][$path] ?? false;

        if($callback === false)
        {
            $this->response->setHTTPResponseCode(404);
            $title['title'] = "404";
            return $this->viewRender("__404",$title);

        }else if(is_string($callback))
        {
            return $this->viewRender($callback, array('title' => $callback));

        }else if(is_array($callback)){

            $callback[0] = new $callback[0];
        }

        return call_user_func($callback, $this->request);

    }

    /**
     * @param $view
     * @param array $params
     * @return string|string[]
     *
     * this function will be return a view without master layout
     */
    public function viewRenderEmpty($view, $params = [])
    {
        return $this->viewContent($view, $params);
    }

    /**
     * @param $view
     * @param array $params
     * @return string|string[]
     *
     * this function will be return a view with master layout
     */
    public function viewRender($view, $params = [])
    {
        $mainView   = $this->mainLayoutContent($params);
        $currentView    = $this->viewContent($view, $params);
        return str_replace("{{ content }}", $currentView, $mainView);
    }

    /**
     * @param $view
     * @param array $params
     * @return string|string[]
     *
     * this function it's used to return the view inside admin folder
     */
    public function viewRenderAdmin($view, $params = [])
    {
        $mainView   = $this->mainLayoutAdmin();
        $currentView    = $this->viewAdmin($view, $params);
        return str_replace("{{ content }}", $currentView, $mainView);
    }

    protected function mainLayoutContent($params = [])
    {
        $null  = $params['null'] ?? false;
        $title = $params['title'];
        ob_start();
        include_once $this->ROOT_PATH . "/Views/masterLayout/main.php";
        return ob_get_clean();
    }

    protected function mainLayoutAdmin()
    {
        ob_start();
        include_once $this->ROOT_PATH . "/Views/admin/layout/main.php" ;
        return ob_get_clean();
    }

    protected function viewContent($view, $params)
    {
        foreach ($params as $key => $value)
        {
            $$key = $value;
        }

        ob_start();

        if(file_exists($this->ROOT_PATH . "/Views/" . $view . ".php")){
            include_once $this->ROOT_PATH . "/Views/".$view.".php";
        }else{
            include_once $this->ROOT_PATH . "/Views/__404.php";
        }

        return ob_get_clean();
    }

    /**
     * @param $view
     * @param $params
     * @return false|string
     */
    protected function viewAdmin($view, $params = [])
    {
        if(is_array($params) && @!is_array(array_values($params)[0]))
            foreach ($params as $key => $value)
            {
                $$key = $value;
            }

        ob_start();
        if(file_exists($this->ROOT_PATH . "/Views/admin/".$view.".php")){
            include_once $this->ROOT_PATH . "/Views/admin/".$view.".php";
        }else{
            include_once $this->ROOT_PATH . "/Views/__404.php";
        }
        return ob_get_clean();
    }
}