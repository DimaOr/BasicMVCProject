<?php

class View {

    function __construct() {
        
    }

    function render($name) {
        require 'view/header.php';
        require 'view/' . $name . '.php';
        require 'view/footer.php';
    }

}
