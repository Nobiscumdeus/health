<?php
ini_set('session.cookie_lifetime',1800); //1800 seconds is also 30 minutes 
ini_set('session.gc_maxlifetime',1800);

ini_set('session.gc_probability',1); //allows for garbage cleaning 
ini_set('session.gc_divisor',1);
session_start();

if(!isset($_SESSION['quiz_completed']) || $_SESSION['quiz_completed'] !== true){
    header("Location:index.php");
}

$_SESSION['home']='home';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MBBS 2k26 |waiting room </title>
    <style type="text/css">
        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
            font-family:Arial, Helvetica, sans-serif;
        }
        body{
            min-height:100vh;
            display:flex;
            flex-direction:column;
            justify-content: center;
            align-items:center;
            flex-wrap:wrap;
            background:#333;
            

        }
        body h5{
            color:#fff;
            width:40%;
            flex-basis:40%;
            letter-spacing:1px;
            animation:fadein 2s ease-in-out;
            
        }
        @keyframes fadein{
            from{
                opacity:0;
                font-size:small;
            }
            to{
                opacity:1;
                font-size:large;
            }
        }
        #container{
            flex-basis:80%;
            display:flex;
            flex-direction:column;
            justify-content:center;
            flex-wrap:wrap;
            background:#333;
            border-radius:10px;
            color:#fff;
        
        }
        #container div{
            flex-basis:70%;
            display:flex;
            min-height:20vh;
            flex-direction:column;
            justify-content:center;
            padding:10px;
        }
        button{
            flex-basis:80%;
            min-height:10vh;
            display:flex;
            color:#fff;
            justify-content:center;
            align-items:center;
            border-radius:5px;
            background:#000;
            padding:10px;
            outline:none;
            border:none;
            
          
        }
        button a{
            text-decoration: none;
            color:#fff;
          
        }
        button:hover{
            cursor:pointer;
            background:green;
        }
        p{
            color:#fff;
        }
    </style>
</head>
<body>
    <h5>Welcome future Doctor, you can definitely do this with minimal supervision, just follow the guides provided...</h5> 
    <div id="container">
       
        <div>
            <button>
                <a href="mbbs.php" class="btn btn-primary btn-lg"> Enrollment for Future Docs </a>

            </button>
           
        </div>
        <div>
            <button>
                <a href="some.php" class="btn btn-success btn-lg">  Update Enrollment  with password </a>

            </button>
           
        </div>
        <div>
            <button>
                <a href="access.php" class="btn btn-success btn-lg"> Meet Future Physicians  </a>

            </button>
           
        </div>
        
        
       

    </div>
    <p> Chasfat Project$ &copy; 2023 </p>
</body>
</html>