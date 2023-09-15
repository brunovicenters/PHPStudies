<?php
    echo $_SERVER['PHP_SELF']; //-- returns the name of the file itself;
    echo "<hr>"; 
    echo $_SERVER['SERVER_NAME']; //-- returns the name of the host server;
    echo "<hr>";
    echo $_SERVER['HTTP_HOST']; //-- returns information of which domain the user is using to access;
    echo "<hr>";
    echo $_SERVER['HTTP_USER_AGENT']; //-- returns information about the browser and the OS that the user is using to access;
    echo "<hr>";
    echo $_SERVER['SCRIPT_NAME']; //-- returns the path to the current script;
?>