<?php
/**
if($_SERVER['REMOTE_ADDR'] !== $_SERVER['SERVER_ADDR']){
    header('HTTP/1.0 403 Forbidden');
    echo "Access Forbidden";
    exit;
}
**/


//Preventing submission more than once 
if($_SERVER['REQUEST_METHOD']==='POST'){
    //Get the form data 
    $name=htmlspecialchars(stripslashes(trim($_POST['name'])));
   $birth=htmlspecialchars(stripslashes(trim($_POST['birth'])));
   $state=htmlspecialchars(stripslashes(trim($_POST['state'])));
   $nation=htmlspecialchars(stripslashes(trim($_POST['nation'])));
   $hobbies=htmlspecialchars(stripslashes(trim($_POST['hobbies'])));
   $contact=htmlspecialchars(stripslashes(trim($_POST['contact'])));
   $email=htmlspecialchars(stripslashes(trim($_POST['email'])));
   $reason=htmlspecialchars(stripslashes(trim($_POST['reason'])));
   $gender=htmlspecialchars(stripslashes(trim($_POST['gender'])));
   $nickname=htmlspecialchars(stripslashes(trim($_POST['nickname'])));
   $password=htmlspecialchars(stripslashes(trim($_POST['password'])));

   //Check if the details are already submitted
   if(detailsSubmitted($name,$birth,$state,$nation,$hobbies,$contact,$email,$reason,$gender,$nickname,$password)){
     echo "<script type='text/javascript'>alert('Details have been submitted already');
     window.setTimeout(function(){window.location.href='mbbs.php'},2000); </script>
     ";
     exit;
   }
   echo "<script type='text/javascript'> Details received successfully;
   window.setTimeout(function(){window.location.href='mbbs.php'},2000);</script>";


}
function detailsSubmitted($name,$birth,$state,$nation,$hobbies,$contact,$email,$reason,$gender,$nickname,$password){
    $data=loadSubmittedDetails();

    foreach($data as $detail){
        //Compare the details
        if($detail['name']===$name && $detail['birth'] && $detail['state']===$state && $detail['nation']===$nation  && $detail['contact']===$contact && $detail['email'] ===$email  && $detail['gender']===$gender && $detail['password']===$password){
            return true; //Details are already submitted 
        }
    }
    return false ;//Details are not submitted
}

function loadSubmittedDetails(){
  
  //  $data=file_get_contents('data.json');
   $data=file_get_contents('json.json');
    $data=json_decode($data,true);
    return $data;
}




//Generate a unique id
if(isset($_POST['submitButton'])){
    $id=uniqid();
    //Retrieve data from the Client and add a unique id 
   $name=htmlspecialchars(stripslashes(trim($_POST['name'])));
   $birth=htmlspecialchars(stripslashes(trim($_POST['birth'])));
   $state=htmlspecialchars(stripslashes(trim($_POST['state'])));
   $nation=htmlspecialchars(stripslashes(trim($_POST['nation'])));
   $hobbies=htmlspecialchars(stripslashes(trim($_POST['hobbies'])));
   $contact=htmlspecialchars(stripslashes(trim($_POST['contact'])));
   $email=htmlspecialchars(stripslashes(trim($_POST['email'])));
   $reason=htmlspecialchars(stripslashes(trim($_POST['reason'])));
   $gender=htmlspecialchars(stripslashes(trim($_POST['gender'])));
   $nickname=htmlspecialchars(stripslashes(trim($_POST['nickname'])));
   $password=htmlspecialchars(stripslashes(trim($_POST['password'])));

   //Create an array with the form data
   $formData=array(
    'id'=>$id,
    'name'=>$name,
    'birth'=>$birth,
    'state'=>$state,
    'nation'=>$nation,
    'hobbies'=>$hobbies,
    'contact'=>$contact,
    'email'=>$email,
    'reason'=>$reason,
    'gender'=>$gender,
    'nickname'=>$nickname,
    'password'=>$password
   );
   $adminData=array(
    'id'=>$id,
    'name'=>$name,
    'password'=>$password
   );

   //Load existing data from the json file if there is
  // $existingData=json_decode(file_get_contents("data.json"),true);
    $existingData=json_decode(file_get_contents("json.json"),true);

   $existingAdminData=json_decode(file_get_contents("admin.json"),true);

   //Add the new form data to the existing data
   $existingData[]=$formData;

   $existingAdminData=$adminData;

   //Save updated data to the JSON file
   //file_put_contents("data.json",json_encode($existingData));
   file_put_contents("json.json",json_encode($existingData));
   //Save updated data also to admin.json
   file_put_contents("admin.json",json_encode($existingAdminData));
   echo "<script type='text/javascript'> alert('Success!!! Your details have been uploaded successfully future Doctor') ;
   window.setTimeout(function(){window.location.href='mbbs.php'},2000);
   </script> ";

}



?>