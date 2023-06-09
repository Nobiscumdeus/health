<?php
session_start();

$_SESSION['index']='index';


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>MBBS 2k26 | Home</title>
    <style type="text/css">
        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
            font-family:'Poppins',sans-serif;
        }
      
        #popup{
            min-height:100vh;
            display:flex;
            width:100%;
            
            flex-direction:column;
            align-items:center;
            justify-content:center;
            background:#3c5077;
       
        

        }
        #popup div{
        position:absolute;
        top:50%;
          left:50%;
          transform:translate(-50%,-50%);
          padding:10px;

        }
        #popup div h3{
            color:#fff;
            
           
        }
        #popup div i{
            color:#fff;
            

        }
        .btn{
            padding:8px 15px;
            background:#fff;
            border:0;
            outline:none;
            cursor:pointer;
            border-radius:25px;
            font-size:16px;
            font-weight:700;
            color:#333;
        }
        .btn:hover{
            color:#000;
            background:#888;
            cursor:pointer;
            
        }
        .pop{
            position:absolute;
            max-width:400px;
            max-height:400px;
            outline:none;
            background:#fff;
            border-radius:6px;
          
            top:50%;
            left:50%;
            transform:translate(-50%,-50%);
            text-align:center;
            padding:0 20px 20px;
            color:#333;
            opacity:0;
            z-index:-2;
            transition:transform 0.4s,top 0.4s;
       /**
            visibility:hidden;
        
             
             **/
        }
        .open-pop{
            z-index:3;
            opacity:1;
            transform:translate(-50%,-50%) scale(1);

            /**
            visibility:visible;
            top:20%;
            transform:translate(-50%,50%) scale(1.0);
            **/
            


        }
        .pop img{
            position:absolute;
            max-width:50px;
            top:-20%;
            left:auto;
            transform:translate(-50%,50%);
            border-radius:50%;
            box-shadow:0 20px 5px rgba(0,0,0,0.2);
        }
        .pop h4{
            font-size:38px;
            font-weight:500;
            margin:40px 0 10px;

        }
        .pop p{
            color:green;
            font-weight:600;
           
           font-family:Georgia, 'Times New Roman', Times, serif;
        }
        .pop button{
            width:45%;
            margin-top:20px;
            padding:10px 0;
            
            color:#fff;
            border:0;
            outline:none;
            font-size:18px;
            border-radius:4px;
            cursor:pointer;
            box-shadow:0 5px 5px rgba(0,0,0,0.2);
        }
        #b1{
            background:#ff004f;
        }
        #b2{
            background:#0B4C1B;
        }
        .pop button:hover{
            opacity:0.8;
        }

        
        @media only screen and (max-width:600px){
            .pop{
                width:300px;
                padding:0 10px 10px;
            }
            .btn{
            padding:5px 10px;
           
        }
        }

    </style>
</head>
<body id="popup">
        <div>
        <i class="fa fa-user-md fa-3x"></i>
            <h3> Welcome to Future Physicians Hub </h3>
            
            <button type="submit" class="btn" onclick="openPop()"> Click to proceed ! </button>

        </div>
       
       
        <div class="pop" id="popping">
       
            <h4>Authentication!!!</h4> 
            <img src="../images/checkkbox.jpg" alt="image" />
            <p> Please you need to take an assessment in the form of a quiz to be sure you belong to the UI MBBS 2k26 class or not. </p>

            <button type="button" id="b1" onclick="closePop()"> I won't </button>
            <button type="button" id="b2" onclick="quiz()">I will</button>
        </div>

 
    <noscript>
        alert("Please javascript is must be enabled to let this page work effectively ")
    </noscript>
    <script>
        let pop=document.getElementById("popping");
        function openPop(){
            pop.classList.add('open-pop')
            
        }
        function closePop(){
            pop.classList.remove('open-pop');
        }
        function quiz(){
            window.location.href="quiz.php";
        }

    </script>
    
</body>
</html>