<?php 
//require 'libs/Bootstrap.php';
//require 'libs/Controller.php';
//require 'libs/Model.php';
//require 'libs/View.php';
//require 'libs/Database.php';
//require 'libs/Session.php';
function __autoload($class){
    require "libs/$class.php";
}

require 'config/path.php';
$bootstrap=new Bootstrap();
?>