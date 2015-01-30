<?php

class Database extends PDO {

    function __construct() {
        parent::__construct('mysql:host=localhost;dbname=mvc', 'root', '');
    }
 
    function update($table, $data, $where) {
        ksort($data);
        $keyValue=null;
        foreach ($data as $key=>$value){
            $keyValue.="`$key`=:$key, ";
        }
       
        $keyValue=rtrim($keyValue,', ');
       // print_r($data);
       // echo "UPDATE $table set $keyValue where $where"; die;
      
        $sth = $this->prepare("UPDATE $table set $keyValue where $where");

        foreach ($data as $key => $value) {
        $sth->bindValue(":$key", $value);
           
        }
   
        $sth->execute();
    }

    function insert($table, $data) {
        ksort($data);
        $keyValue = null;
        $valueAr = null;
        $keyValue = '`' . implode('`, `', array_keys($data)) . '`';
        $valueAr = ':' . implode(', :', array_keys($data));
       

        $sth = $this->prepare("Insert into $table ($keyValue)values( $valueAr)");

        foreach ($data as $key => $value) {
            $sth->bindValue(":$key", $value);
        }
        $sth->execute();
//        $sth->execute(array(
//            ':login' => $data['login'],
//            ':pass' => $data['pass'],
//            ':role' => $data['role']
//        ));
//        
    }

}
