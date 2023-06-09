<?php
ini_set('session.cookie_lifetime',1800); //1800 seconds is also 30 minutes 
ini_set('session.gc_maxlifetime',1800);

ini_set('session.gc_probability',1); //allows for garbage cleaning 
ini_set('session.gc_divisor',1);
session_start();

if(!isset($_SESSION['home']) || $_SESSION['home'] !== 'home'){
    header('Location:index.php');
}



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MBBS 2k26 | Update</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style type="text/css">
        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
        }
        body{
            min-height:100vh;
            display:flex;
            background:#333;
            color:#fff;
            flex-direction:column;
            justify-content: center;
            align-items:center;
        }
        #full{
            width:100%;
            flex-basis:80%;
            min-height:50vh;
            display:flex;
            flex-direction:column;
            justify-content: center;
            align-items: center;
            background:#000;
            color:#fff;
            border-radius:10px;
        }
        #full h3{
            color:red;
            animation:update 2s ease-in-out;

        }
        @keyframes update{
            0%{
                color:#fff;
                opacity:0;

            }
            50%{
                color:#fff;
                opacity:0.5;
               
            }
            75%{
                color:#fff;
                opacity:0.8;

            }
            100%{
                color:red;
                opacity:1;
                


            }
        }
        #form{
            width:100%;
            display:flex;
            flex-direction:column;
            justify-content: center;
            align-items:center;
            padding:10px;
        }
        
        input,#searchButton{
           
            height:40px;
            border-radius:5px;
            padding:10px;
            color:#000;
            text-align:center;
            margin:5px;
        }
        input{
            width:80%;
        }
        textarea{
            width:80%;
            resize:none;
            color:#000;
            font-size:18px;
            text-align:center;
        }
        textarea::placeholder{
            text-align:center;
        }
        #searchButton{
            width:20%;
        }
        #searchButton:hover{
            background:green;
        }
      
        table{
            border:2px solid green;
            border-collapse:collapse;

        }
        tr:nth-child(1){
            background:#000;

        }
        tr,td{
            border:2px solid green;
        }
        td{
            padding:5px;
        }
       
        table tr:hover{
            cursor:pointer;
            background:grey;
        }
        a{
            text-decoration: none;
        }
        #exit{
            margin:5px;
        }
        #sex{
            width:70%;
            display: flex;
            flex-direction:row;
            
            justify-content:center;
            align-items:center;
        }
        input[type="radio"]{
            width:20px;
            height:20px;
            border-radius:50%;
            padding:10px;
        }
        input[type="radio"]:hover{
            cursor:pointer;
        }
        span{
            font-size:16px;
            margin:10px;
        }
        input[type="password"]::placeholder{
            font-size:14px;
            color:#ff004f;
        
        }

    </style>
</head>
<body>
    <div id="full">
        <h3>Update your Details ?</h3> 
        <form action="retrieve_some.php" method="POST" id="form">
            <input type="text" id="searchName" name="name" placeholder="Enter your Names in order" required/>
            <input type="password" id="searchID" name="password" placeholder="Enter Your Correct password to update details" required/>
            <input type="text" name="birth" id="birth" placeholder="Birthday without Year e.g. JANUARY 21ST" required>
            <input type="text" name="state" id="state" placeholder="Your State of Origin e.g.  ONDO" required>
            <input type="text" name="nation" id="nation" placeholder="Enter Your Nationality e.g. Nigerian" required>
            <input type="text"  name="hobbies" id="hobbies" placeholder="Mention your Hobbies " required>
            <input type="tel"  name="contact" id="contact" placeholder="Enter a hotline you can be reached through: Optional">
            <input type="email" name="email" id="email" placeholder="Enter your email address : Optional">
            <div id="sex">
                <span> <b>Male</b> </span>
                <input type="radio" name="gender" id="gender1" value="Male"  required />
               
        
                
                <span> <b> Female </b> </span>
                <input type="radio" name="gender" id="gender2" value="Female" required/> 
    </div>
                
            <input type="text" name="nickname" id="nickname" placeholder="Your Nickname or P.K.A. ? " />
            <input type="hidden" name="id" id="userId" value="" />
           
            <!--
                 <input type="text" id="reason" placeholder="Why did you Chose Medicine ? " required>
            -->
           
            <textarea name="reason" id="reason" cols="30" rows="7" placeholder="Why did you choose to study Medicine and why in University of Ibadan ?"></textarea>
            

           









            <button type="submit" name="submit" id="searchButton"> Update Details </button>
            <div id="result"></div>

        </form>
        <a id="exit" href="home.php" class="btn btn-danger btn-2x"> Ready to Exit Boss ?</a>

    </div>


    <p> Chasfat Project$ &copy; 2023</p>



    <!--
         <script>
        document.getElementById("form").addEventListener("submit",function(){
            var searchId=document.getElementById("searchID").value;
            var searchname=document.getElementById("searchName").value;

            var xhr=new XMLHttpRequest();
            xhr.open("GET","retrieve_some.php",true);
            xhr.onreadystatechange=function(){
                if(xhr.readyState===4 && xhr.status===200){
                    var responseData=JSON.parse(xhr.responseText);
                    var searchResult=searchData(responseData,searchId,searchName);
                    displayData(searchResult);
                }
            }
            xhr.send();
           
            $('#exit').show();
        });

        function searchData(data,searchId,searchName){
            var searchResult=[];
            for(var i=0; i<data.length;i++){
                if(data[i].id===searchId && data[i].name===searchName){
                    searchResult.push(data[i]);
                }
            }
            return searchResult;
        }

        function displayData(data){
            var resultDiv=document.getElementById("result");
            resultDiv.innerHTML="";

            //Create a table to display the data
            var table=document.createElement("table");
            var heads=table.insertRow();
            heads.insertCell().innerHTML="Unique ID";
            heads.insertCell().innerHTML="Full Names ";
            heads.insertCell().innerHTML="Birth Month/Day";
            heads.insertCell().innerHTML="State of Origin";
            heads.insertCell().innerHTML="Nationality";
            heads.insertCell().innerHTML="Hobbies";
            heads.insertCell().innerHTML="Cellular Contact";
            heads.insertCell().innerHTML="Email Address";
            heads.insertCell().innerHTML="Why Medicine and UI?"
            //Iterate over the results in the data
            for(var i=0;i<data.length;i++){
                var row=table.insertRow();
                var idCell=row.insertCell();
                var nameCell=row.insertCell();
                var birthCell=row.insertCell();
                var stateCell=row.insertCell();
                var nationCell=row.insertCell();
                var hobbiesCell=row.insertCell();
                var contactCell=row.insertCell();
                var emailCell=row.insertCell();
                var reasonCell=row.insertCell();
    
                idCell.innerHTML=data[i].id;
                nameCell.innerHTML=data[i].name;
                birthCell.innerHTML=data[i].birth;
                stateCell.innerHTML=data[i].state;
                nationCell.innerHTML=data[i].nation;
                hobbiesCell.innerHTML=data[i].hobbies;
                contactCell.innerHTML=data[i].contact;
                emailCell.innerHTML=data[i].email;
                reasonCell.innerHTML=data[i].reason;

            }
            resultDiv.appendChild(table);

           
        }
    </script>

    -->
   
</body>
</html>