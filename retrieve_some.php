<?php
/** 
 * $data=json_decode(file_get_contents("data.json"),true);

$searchId=$_GET['searchId'];
$searchname=$_GET['searchName'];

$searchResult=array_filter($data,function($item) use($searchId,$searchName){
    return $item['password']===$searchId && $item['name']===$searchName;

});
echo json_encode($searchResult);
*/

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






/**
 *  //Lets load some admin data
    $adminData=file_get_contents('admin.json');
    $admin=json_decode($adminData,true);

    //Check if the names and password are correct
    $name=htmlspecialchars(stripslashes(trim($_POST['name'])));
    $password=htmlspecialchars(stripslashes(trim($_POST['password'])));

    //Check if the entered details matches those of the admin
    if($name===$admin['name'] && $password===$admin['password']){
        $jsonData=file_get_contents('data.json');
        $data=json_decode($jsonData,true);
        //Getting the user's password for indentification 
        $password=$_POST['password'];
        //Update the details for the specific user alone 
        if(isset($data[$password])){
            $data[$password]['name']=htmlspecialchars(stripslashes(trim($_POST['name'])));
            $data[$password]['password']=htmlspecialchars(stripslashes(trim($_POST['password'])));
            $data[$password]['birth']=htmlspecialchars(stripslashes(trim($_POST['birth'])));
            $data[$password]['state']=htmlspecialchars(stripslashes(trim($_POST['state'])));
            $data[$password]['nation']=htmlspecialchars(stripslashes(trim($_POST['nation'])));
            $data[$password]['hobbies']=htmlspecialchars(stripslashes(trim($_POST['hobbies'])));
            $data[$password]['contact']=htmlspecialchars(stripslashes(trim($_POST['contact'])));
            $data[$password]['email']=htmlspecialchars(stripslashes(trim($_POST['email'])));
            $data[$password]['gender']=htmlspecialchars(stripslashes(trim($_POST['gender'])));
            $data[$password]['nickname']=htmlspecialchars(stripslashes(trim($_POST['nickname'])));

          
        }
        //Write the updated data to the JSON file 
        $file=fopen('data.json','w');
        fwrite($file,json_encode($data));
        fclose($file);

        //Redirect to the form page 
        echo "<script type='text/javascript'> alert('Congrats!!! Your details have been been updated future Doctor') ;
        window.setTimeout(function(){window.location.href='mbbs.php'},1000);
        </script> ";

    }else{
        echo "<script type='text/javascript'> alert('Ooops!!! Your credentials are invalid ') ;
        window.setTimeout(function(){window.location.href='mbbs.php'},1000);
        </script> ";

       
    }



 */


   







/** 
 *  if(isset($admin[$password])){  

        $admin[$password]['name']=$_POST['name'];
        $admin[$password]['password']=$_POST['password'];


        //Read existing JSON data from file
       // $jsonData=file_get_contents('data.json');
        //$data=json_decode($jsonData,true);

        //Update the data with form input values
        $file=fopen('data.json','w');
        fwrite($file,json_encode($admin));
        fclose($file);

        echo "<script type='text/javascript'> alert('Congrats!!! Your details have been been updated future Doctor') ;
   window.setTimeout(function(){window.location.href='mbbs.php'},2000);
   </script> ";
    }else{
        echo "Ooops !!! Invalid credentials , Access denied!!!;
        window.setTimeout(function(){window.location.href='mbbs.php'},2000);
        ";
       
    }
*/


    //Lets replace these with some forms of validation
   


}



?>