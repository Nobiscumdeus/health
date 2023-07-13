<?php

//$data=file_get_contents("../private/json.json");
//echo $data;

$json_data=file_get_contents("json.json");
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