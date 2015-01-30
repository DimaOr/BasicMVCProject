<?php

class Controller {

    function __construct() {
        $this->view = new View();
    }

    function loadModel($name) {
        $path = 'Model/'.$name.'_Model.php';
        if (file_exists($path)) {
            require $path;
            $model = $name . '_Model';
            $this->model = new $model;
        }
    }

}
