<?php
    $x=75;
    $y=25;

    function add(){
        //It allows you to access variables from outside the function and other enviroments --
        $GLOBALS['z'] = $GLOBALS['x'] +$GLOBALS['y'];
    }
    add();
    echo $z;
?>