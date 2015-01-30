<?php

class Login_Model extends Model {

    function __construct() {
        parent::__construct();
    }

    function run() {
        $sth = $this->db->prepare("select id, role from users where login =:login and pass=:pass");
        $sth->execute(array(
            ':login' => $_POST['login'],
            ':pass' => $_POST['password']
        ));
        $data = $sth->fetch();


  
        $count = $sth->rowCount();

        if ($count > 0) {
            Session::init();
            Session::set('role', $data['role']);
            Session::set('LogIn', true);
            header('location: ../dashboard');
        } else {
            header('location: ../login');
        }
    }

}
