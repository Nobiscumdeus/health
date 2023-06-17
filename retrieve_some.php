<?php
if($_SERVER['REMOTE_ADDR'] !== $_SERVER['SERVER_ADDR']){
    header('HTTP/1.0 403 Forbidden');
    echo "Access Forbidden";
    exit;
}

//Lets first check if the details have been submitted
if(isset($_POST['submit'])){

    //Get the submitted password
    $password=htmlspecialchars(stripslashes(trim($_POST['password'])));

    //Load the existing json data from the file
    $checkData=file_get_contents('data.json');
    $records=json_decode($checkData,true);

    //Find the record with the matching password
    $userId=null;
    foreach($records as $record){
        if($record['password']===$password){
            $password=htmlspecialchars(stripslashes(trim($_POST['password'])));
            $userId=$record['id'];
            break;
        }
    }
    
    //If user Id was found, update the details
    if($userId!==null){
        //Get the other updated details 
        $name=htmlspecialchars(stripslashes(trim($_POST['name'])));
        $password=htmlspecialchars(stripslashes(trim($_POST['password'])));
        $birth=htmlspecialchars(stripslashes(trim($_POST['birth'])));
        $state=htmlspecialchars(stripslashes(trim($_POST['state'])));
        $nation=htmlspecialchars(stripslashes(trim($_POST['nation'])));
        $hobbies=htmlspecialchars(stripslashes(trim($_POST['hobbies'])));
        $contact=htmlspecialchars(stripslashes(trim($_POST['contact'])));
        $email=htmlspecialchars(stripslashes(trim($_POST['email'])));
        $gender=htmlspecialchars(stripslashes(trim($_POST['gender'])));
        $nickname=htmlspecialchars(stripslashes(trim($_POST['nickname'])));
        $reason=htmlspecialchars(stripslashes(trim($_POST['reason'])));
        //Find the record with the matching id 
        foreach($records as &$record){
            if($record['id']===$userId){
                //Update the details for the matching record
                $record['name']=$name;
                $record['password']=$password;
                $record['birth']=$birth;
                $record['state']=$state;
                $record['nation']=$nation;
                $record['hobbies']=$hobbies;
                $record['contact']=$contact;
                $record['email']=$email;
                $record['gender']=$gender;
                $record['nickname']=$nickname;
                $record['reason']=$reason;
                break;
                //$record['last_updated']=date('Y-m-d H:i:s');
            }
        }
        //Convert the record array back to json
        $jsonData=json_encode($records);

        //Save the content back to the json file 
        file_put_contents('data.json',$jsonData);

        echo "<script type='text/javascript'> alert('Congrats!!! Your details have been been updated future Doctor') ;
        window.setTimeout(function(){window.location.href='mbbs.php'},1000);
        </script> ";
    }else{
        echo "<script type='text/javascript'> alert('Ooops!!! Your credentials are invalid ') ;
        window.setTimeout(function(){window.location.href='mbbs.php'},1000);
        </script> ";

    }



}
/** 
 * 
//Code to delete data if need be 
$jsonData=file_get_contents('data.json');
//Decode the json file 
$data=json_decode($jsonData);
//Find the index of the data you want to delete 
$indexToDelete=-1;
foreach($data as $index=>$item){
    if($item['id']==eg123){ //But replace e.g123 with the actual id you want to delete 
        $indexToDelete=$index;
        break;
    }
}

//Delete the data if found
if($indexToDelete >=0){
    array_splice($data,$indexToDelete,1);

    //Encode the updated data back to json
    $updatedJsonData=json_encode($data);

    //Save the updated JSOn Data back to the file 
    file_put_content('data.json',$updatedJsonData);
    echo "Data deleted succesfully";
}else{
    echo "Data not found";
}

*/


?>