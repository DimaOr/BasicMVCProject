<?php

class User_Model extends Model {

    function __construct() {

        parent::__construct();
    }

    public function userList() {
        $sth = $this->db->prepare('select id, login, role from users');
        $sth->execute();
        return $sth->fetchAll();
    }

    public function create($data) {

        $this->db->insert('users', $data);
    }

    public function delete($id) {
        $sth = $this->db->prepare('delete from users where id=:id');
        $sth->execute(array(
            ':id' => $id
        ));
    }

    public function userSingleList($id) {
        $sth = $this->db->prepare('SELECT id, login, role FROM users WHERE id = :id');
        $sth->execute(array(':id' => $id));
        return $sth->fetch();
    }

    public function editSave($data) {
        $postData = array(
			'login' => $data['login'],
			'pass' =>  $data['pass'],
			'role' => $data['role']
		);

        $sth = $this->db->update('users', $postData, "`id`={$data['id']}");
    }

}
