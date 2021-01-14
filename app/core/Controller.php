<?php

require_once __DIR__.'/../core/DB.php';

class Controller extends Base
{
    public $db;

    public function __construct() {
        $this->db = new DB();
    }
    /**
     * Return a new instance of a model or throw an exception.
     *
     * @param $model
     * @return mixed
     * @throws Exception
     */
    public function model($model)
    {
        if (is_readable('../app/models/' . $model . '.php')) {
            require_once '../app/models/' . $model . '.php';

            return new $model();
        }

        throw new Exception("The model $model does not exist or is not readable.");
    }

    /**
     * Return the master view with data containing the view
     * being requested as well as optional data.
     *
     * @param $view
     * @param array $data
     */
    public function view($view, $data = [])
    {
        $data['view'] = $view;

        extract($data);

        if (is_readable('../app/views/' . $view . '.php')) {
            require_once '../app/views/' . $view . '.php';
        } else {
            $this->respondNotFound();
        }
    }
}