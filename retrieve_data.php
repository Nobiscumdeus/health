<?php

$data=file_get_contents("data.json");

echo $data;

/** 
 * $jsonData=file_get_contents('data.json');
echo $jsonData;

//Check if the JSON data is not empty
if(!empty($jsonData)){
    //Decode the json Data
    $data=json_decode($jsonData);

    //Check if the decoded data is not empty
    if(!empty($data)){
        //Return the data as JSON
        header('Content-Type:application/json');
        echo json_encode($data);
    }else{
        //Return an error message as JSON response
        header('Content-Type:application/json');
        echo json_encode(array('error'=>'Oops!!! No data available'));
    }
}else{
    //Return an error message as JSOn response;
    header('Content-Type:application/json');
    echo json_encode(array('error'=>'Ooops!!! Empty response'));
}
*/


?>