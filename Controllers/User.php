<?php

class User extends Controller {

    public function __construct() {
        Session::init();
        parent::__construct();
        $logIng = Session::get('LogIn');
        $rol = trim(Session::get('role'));
        if ($logIng == false || $rol != 'owner') {
            Session::destroy();
            header('location: ../basicMvc/login');
            exit;
        }
    }

    public function index() {
        $this->view->userList = $this->model->userList();
        $this->view->render('user/index');
    }

    public function create() {
        $data = array();
        $data['login'] = $_POST['login'];
        $data['role'] = $_POST['role'];
        $data['pass'] = $_POST['password'];
        $this->model->create($data);
        header('location: http://localhost/basicMvc/user');
    }

    public function delete($id) {

        $this->model->delete($id);
        header('location: http://localhost/basicMvc/user');
    }

    public function edit($id) {
        $this->view->user = $this->model->userSingleList($id);
        $this->view->render('user/edit');
    }

    public function editSave($id) {
        $data = array();
        $data['id'] = $id;
        $data['login'] = $_POST['login'];
        $data['pass'] = $_POST['password'];
        $data['role'] = $_POST['role'];


        $this->model->editSave($data);
        header('location: ' . URL . 'user');
    }

}
