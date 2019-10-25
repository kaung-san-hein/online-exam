<?php   
    define("host","localhost");
    define("name","root");
    define("pass","");
    define("dbName","exam");

    $con = mysqli_connect(host,name,pass,dbName) or die(error());