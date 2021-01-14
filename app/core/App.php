<?php

class App extends Base
{
    /**
     * This is the URL used to fetch the controller, method and params.
     *
     * @var
     */
    protected $url;

    /**
     * The default controller.
     *
     * @var string
     */
    protected $controller = 'HomeController';

    /**
     * The default method.
     *
     * @var string
     */
    protected $method = 'index';

    /**
     * Params from the URI; default empty array.
     *
     * @var array
     */
    protected $params = [];

    /**
     * App constructor.
     */
    public function __construct()
    {
        $this->url = $this->parseUrl();
    }

    /**
     * Run the app by calling the controller method and passing it
     * any given params.
     */
    public function dispatch()
    {
        $this->setController();

        $this->setMethod();

        $this->setParams();

        call_user_func_array([$this->controller, $this->method], $this->params);
    }

    /**
     * Parse the url into an array so we can access the indexes as a
     * controller, method and optional params.
     *
     * @return array
     */
    private function parseUrl()
    {
        $url = explode('/', filter_var("$_SERVER[REQUEST_URI]", FILTER_SANITIZE_URL));
        if (!empty($url) && count($url) > 2) {
            return $url;
        }
    }

    /**
     * Set the controller using the first index of the url.
     */
    private function setController()
    {
        $path = '../app/controllers/' . $this->url[2] . 'Controller.php';

        if (file_exists($path)) {
            $this->controller = $this->url[2] . 'Controller';
            unset($this->url[2]);
        }
        else if (!file_exists($path) && !empty($this->url[2])) {
            $this->respondNotFound();
        }

        require_once '../app/controllers/' . $this->controller . '.php';

        $this->controller = new $this->controller();
    }

    /**
     * Set the method using the second index of the url.
     */
    private function setMethod()
    {
        if (isset($this->url[3]) && method_exists($this->controller, $this->url[3])) {
            $this->method = $this->url[3];
            unset($this->url[3]);
        }
    }

    /**
     * Set the params to pass to the controller method.
     *
     * Params equal the remaining values in the url array rebased.
     *
     * Additionally, we pass the $_POST super global for any optional
     * POST data
     */
    private function setParams()
    {
        $this->params = $this->url ? [array_values($this->url), $_POST] : [$_POST];
    }
}