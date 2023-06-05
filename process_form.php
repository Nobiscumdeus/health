<?php
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
    'reason'=>$reason
   );

   //Load existing data from the json file if there is
   $existingData=json_decode(file_get_contents("data.json"),true);

   //Add the new form data to the existing data
   $existingData[]=$formData;

   //Save updated data to the JSON file
   file_put_contents("data.json",json_encode($existingData));
   echo "<script type='text/javascript'> alert('Success!!! Your details have been uploaded successfully future Doctor') ;
   window.setTimeout(function(){window.location.href='mbbs.php'},3000);
   </script> ";

}



?>