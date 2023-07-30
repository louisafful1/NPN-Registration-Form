<?php
require_once("./functions.php");

 if($_SERVER['REQUEST_METHOD'] === "POST"){
        $name = test_input($_POST['name']);
        $profession = test_input($_POST['profession']);
        $phone = test_input($_POST['phone']);
        $town = test_input($_POST['town']);
        $gender =$_POST['gender'];
        sendmail($name, $gender, $phone, $town, $profession);
    
    
}else{
    "404 Page not found!";
}

function test_input($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    
    return $data;
}