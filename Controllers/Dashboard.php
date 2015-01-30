<?php

class Dashboard extends Controller {

    function __construct() {
        Session::init();
        parent::__construct();
        $logIng = Session::get('LogIn');
       print_r($_SESSION);
        if ($logIng == false) {
            
            Session::destroy();
            header('location: http://localhost/basicMvc/login');
            exit;
        }
    }

    function index() {
        $this->view->render('dashboard/index');
    }

    function logout() {
        Session::destroy();
        header('location: http://localhost/basicMvc/login');
        exit;
    }

}
