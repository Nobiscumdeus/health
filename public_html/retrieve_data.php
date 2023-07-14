<?php

ini_set('session.cookie_lifetime',1800); //1800 seconds is also 30 minutes 
ini_set('session.gc_maxlifetime',1800);

ini_set('session.gc_probability',1); //allows for garbage cleaning 
ini_set('session.gc_divisor',1);
session_start();
if(!isset($_SESSION['home']) || $_SESSION['home'] !== 'home'){
    header('Location:index.php');
}

$json_data=file_get_contents("../private/json.json");
$people=json_decode($json_data,true);

//$people=array_reverse($people,true);
$currentCount=count($people);

//The response data
$data=[
     'data'=>$people,
     'count'=>$currentCount
    
   
    ];
    
    //Send the Json response
header('Content-Type: application/json');
echo json_encode($data);


?>