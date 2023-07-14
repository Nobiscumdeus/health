<?php
ini_set('session.cookie_lifetime',1800); //1800 seconds is also 30 minutes 
ini_set('session.gc_maxlifetime',1800);

ini_set('session.gc_probability',1); //allows for garbage cleaning 
ini_set('session.gc_divisor',1);
session_start();
error_reporting(0);


if(isset($_POST['submit'])){
    $name=htmlspecialchars(stripslashes(trim($_POST['name'])));
    $password=htmlspecialchars(stripslashes(trim($_POST['password'])));

    $jsonData=file_get_contents('../private/json.json');
    $details=json_decode($jsonData,true);
    

    //Check is the details match

    $accessGranted=false;

    foreach($details as $detail){
        
         if($detail['name']===$name && $detail['password'] ===$password){
           
            $accessGranted=true;
            break;
         
      
           
        }
    }

        
        
      
    
 
  //Redirecting 
  if($accessGranted){
        header("Location:all.php");
        $_SESSION['access']='allowed';
    }else{
        $error="Invalid name or password... Please try again.";
       
        
        
    }

 
   
   
}

?>
<!DOCTYPE hmtl>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=1.0" />
        <style type="text/css">
            *{
                margin:0;
                padding:0;
                box-sizing:border-box;
            }
            body{
                min-height:100vh;
              
                background:#F3FCF9;
                

            }
            
            .access{
                
                position:absolute;
                width:60%;
                background:#182B45;
                min-height:50vh;
                border-radius:10px;
                padding:20px;
                top:50%;
                left:50%;
                transform:translate(-50%,-50%);
                box-shadow:0px 4px 8px 0 rgba(0,0,0,0.2),
                        0px 6px 20px 0 rgba(0,0,0,0.19);
               
              
            }
            .access h2{
                color:#fff;
                text-align:center;
            }
            form{
                display:flex;
                align-items:center;
                flex-direction:column;
                padding:10px;
                margin-top:10px;
            }
            
            input{
                width:50vw;
                padding:10px;
                height:8vh;
                border-radius:5px;
                outline:none;
                margin:10px;
                text-align:center;

            }
            input::placeholder{
                text-align:center;
                color:#000;
                font-weight:600;
                letter-spacing:5px;
            }
            input[type="submit"]{
                background:#048444;
                width:20vw;
                text-transform:uppercase;
                font-size:20px;

            }
            input[type="submit"]:hover{
                cursor:pointer;
                opacity:0.6;
                color:#fff;
            }
            .access p{
                text-align:center;
                color:#fff;
            }
            #error{
                color:#ff004f;
                font-weight:bold;
            }
           
            .access p a{
              
                text-align:center;
                color:#fff;
                text-decoration:none;
                margin:5px;
            }
            .access p a:hover{
                cursor:pointer;
                opacity:0.6;
            }
            .access p a:first-child{
                border-right:2px solid #ff004f;
            }
            @media only screen and (max-width:600px){
                input::placeholder{
               
                letter-spacing:0px;
            }

            }
        </style>
</head>
<body>
        <div class="access">
           <?php if(isset($error)); ?>
           <p id="error"> <?php echo $error ?>
          
        </p>
           
            <h2> Please Login to meet MBBS 2k26 members </h2>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
            <input type="text" name="name" placeholder="Enter your name" />
            <input type="password" name="password" placeholder="Enter your correct Password" />
            <input type="submit" name="submit" value="Submit"  />
            
        </form>
        <p>
        <a href="home.php"> Return Home ? </a>
        <a href="#"> Forgot Password ? </a>
        </p>
        <p> Chasfat Projects &copy; 2023 </p>
        </div>

</body>
    </html>